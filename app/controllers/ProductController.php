<?php


namespace app\controllers;


use app\models\BreadCrumbs;
use app\models\Product;

class ProductController extends AppController
{

    public function viewAction()
    {
        $alias = $this->route['alias'];
        $product = \R::findOne('product', "alias = ? AND status = '1'", [$alias]);
        if(!$product) {
            throw new \Exception('Страница не найдена', 404);
        }

        //хлебные крошки
        $breadcrumbs = BreadCrumbs::getBreadCrumbs($product->category_id, $product->title);

        //сязанные товары
        $related = \R::getAll("SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$product->id]);

        //запись в куки запрошенного товара
        $p_model = new Product();
        $p_model->setRecentlyViewed($product->id);

        //галерея
        $gallery = \R::findAll('gallery', 'product_id = ?', [$product->id]);

        //просмотренные товары
        $r_viewed = $p_model->getRecentlyViewed();
        $recentlyViewed = null;
        if($r_viewed) {
            $recentlyViewed = \R::find('product', 'id IN (' . \R::genSlots($r_viewed) .') LIMIT 4', $r_viewed);
        }

        //модификации
        $mods = \R::findAll('modification', 'product_id = ?', [$product->id]);


        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product', 'related', 'gallery', 'recentlyViewed', 'breadcrumbs', 'mods'));
    }

}