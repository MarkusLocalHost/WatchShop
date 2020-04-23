<?php


namespace ishop;


class App
{

    public static $app;

    public function __construct()
    {
        // получение строки запроса
        $query = trim($_SERVER['QUERY_STRING'], '/');

        // запуск сессии
        session_start();

        // создание контейнера свойств
        self::$app = Registry::instance();
        $this->getParams();

        // создание обработчика ошибок
        new ErrorHandler();

        // передаем маршрутизатору ссылку
        Router::dispatch($query);
    }

    protected function getParams() {
        $params = require_once CONF . '/params.php';
        if(!empty($params)) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }

}