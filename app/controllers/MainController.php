<?php


namespace app\controllers;


use ishop\Cache;

class MainController extends AppController
{

    public function indexAction() {
        $this->setMeta('Главная страница', 'Описание...', 'Ключевые слова');

        // получение брендов, выводится только 5 брендов
        $brands = \R::find('brand', 'LIMIT 5');
        // получение популярных продуктов, 8 штук
        $hits = \R::find('product', "hit = '1' AND status = '1' LIMIT 8");
        // передача в view
        $this->set(compact('brands', 'hits'));
    }

}