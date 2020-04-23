<?php


namespace app\controllers\admin;


use app\models\admin\Modification;
use app\models\admin\Product;
use app\models\AppModel;
use ishop\App;
use ishop\libs\Pagination;

class ProductController extends AppController
{

    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('product');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $products = \R::getAll("SELECT product.*, category.title AS cat FROM product JOIN category ON category.id = product.category_id ORDER BY product.title LIMIT $start, $perpage");

        $this->setMeta('Список товаров');
        $this->set(compact('products', 'pagination', 'count'));
    }

    public function addImageAction()
    {
        if(isset($_GET['upload'])) {
            if($_POST['name'] == 'single') {
                $wmax = App::$app->getProperty('img_width');
                $hmax = App::$app->getProperty('img_height');
            }else{
                $wmax = App::$app->getProperty('gallery_width');
                $hmax = App::$app->getProperty('gallery_height');
            }
            $name = $_POST['name'];
            $product = new Product();
            $product->uploadImg($name, $wmax, $hmax);
        }
    }

    public function editAction()
    {
        if(!empty($_POST)) {
            $id = $this->getRequestID(false);
            $product = new Product();
            $data = $_POST;
            $product->load($data);

            $product->getImg();

            if(!$product->validate($data)) {
                $product->getErrors();
                redirect();
            }

            if($product->attributes['status'] == "on") {
                $product->attributes['status'] = 2;
            }else{
                $product->attributes['status'] = 1;
            }
            if($product->attributes['hit'] == "on") {
                $product->attributes['hit'] = 2;
            }else{
                $product->attributes['hit'] = 1;
            }

            if($product->update('product', $id)) {
                $product->editFilter($id, $data);
                $product->editRelatedProduct($id, $data);
                $product->saveGallery($id);
                $alias = AppModel::createAlias('product', 'alias', $data['title'], $id);
                $product = \R::load('product', $id);
                $product->alias = $alias;
                $product->status += 1;
                $product->hit += 1;

                \R::store($product);
                $_SESSION['success'] = 'Товар успешно изменен';
                redirect();
            }
        }

        $id = $this->getRequestID();
        $product = \R::load('product', $id);
        App::$app->setProperty('parent_id', $product->category_id);
        $filter = \R::getCol('SELECT attr_id FROM attribute_product WHERE product_id = ?', [$id]);
        $related_product = \R::getAll("SELECT related_product.related_id, product.title FROM related_product JOIN product ON product.id = related_product.related_id 
                                            WHERE related_product.product_id = ?", [$id]);
        $gallery = \R::getCol('SELECT img FROM gallery WHERE product_id = ?', [$id]);

        $this->setMeta("Редактирование товара {$product->title}");
        $this->set(compact('product', 'filter', 'related_product', 'gallery'));
    }

    public function editModificationAction()
    {
        if(!empty($_POST)) {
            $modification = new Modification();
            $data = $_POST;
            $modification->load($data);

            if(!$modification->validate($data)) {
                $modification->getErrors();
                redirect();
            }

            if($id = $modification->save('modification')) {
                $_SESSION['success'] = 'Модификация добавлена';
            }
            redirect();
        }
        //загружаем id товара
        $id = $this->getRequestID();
        //загружаем модификации
        $modifications = \R::find('modification', 'product_id = ?', [$id]);

        $this->setMeta('Модификации товара');
        $this->set(compact('modifications', 'id'));
    }

    public function editModificationSingleAction()
    {
        if(!empty($_POST)) {
            $modification = new Modification();
            $data = $_POST;
            $modification->load($data);

            if(!$modification->validate($data)) {
                $modification->getErrors();
                redirect();
            }

            if($modification->update('modification', $modification->attributes['id'])) {
                $_SESSION['success'] = 'Модификация успешно изменена';
                redirect();
            }
        }
    }

    public function deleteModificationAction()
    {
        $id = $this->getRequestID();
        $modification_for_delete = \R::load('modification', $id);
        \R::trash($modification_for_delete);
        $_SESSION['success'] = 'Модификация удалена';
        redirect();
    }

    public function editDetailAction()
    {
        $id = $this->getRequestID();
        $this->setMeta('Подробное описание');
    }

    public function addAction()
    {
        if(!empty($_POST)) {
            $product = new Product();
            $data = $_POST;
            $product->load($data);

            $product->getImg();

            if(!$product->validate($data)) {
                $product->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if($id = $product->save('product')) {
                $product->saveGallery($id);

                $alias = AppModel::createAlias('product', 'alias', $data['title'], $id);
                $p = \R::load('product', $id);
                $p->alias = $alias;
                if($product->attributes['status'] == "on") {
                    $p->status = '2';
                }else{
                    $p->status = '1';
                }
                if($product->attributes['hit'] == "on") {
                    $p->hit = '2';
                }else{
                    $p->hit = '1';
                }
                \R::store($p);

                $product->editFilter($id, $data);

                $product->editRelatedProduct($id, $data);

                $_SESSION['success'] = 'Товар успешно добавлен';
            }
            redirect();
        }

        $this->setMeta('Новый товар');
    }

    public function relatedProductAction()
    {
        $q = isset($_GET['q']) ? $_GET['q'] : '';
        $data['items'] = [];
        $products = \R::getAssoc('SELECT id, title FROM product WHERE title LIKE ? LIMIT 10', ["%{$q}%"]);
        if($products) {
            $i = 0;
            foreach ($products as $id => $title) {
                $data['items'][$i]['id'] = $id;
                $data['items'][$i]['text'] = $title;
                $i++;
            }
        }
        echo json_encode($data);
        die;
    }

    public function deleteGalleryAction()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        if(!$id || !$src) {
            return;
        }
        if(\R::exec("DELETE FROM gallery WHERE product_id = ? AND img = ?", [$id, $src])) {
            @unlink(WWW . "/images/$src");
            exit('1');
        }
        return;
    }

    public function deleteAction()
    {
        $id = $this->getRequestID();
        $product = \R::load('product', $id);
        \R::trash($product);

        $_SESSION['success'] = 'Товар удален';

        //проверить на связь с товарами в корзине
        $count = \R::count('order_product', 'product_id = ?', [$id]);
        if($count > 0) {
            $_SESSION['error'] = "Есть связь с товаром в заказе. В $count заказе(ах)";
        }
        redirect();
    }

}