<?php


namespace app\controllers\admin;


class ContactsController extends AppController
{

    public function indexAction()
    {
        $users = \R::getAll("SELECT `user`.`id`, `user`.`name`, `admin`.`position`, `admin`.`location`, `admin`.`img`, `admin`.`skills`
                                FROM `user`
                                JOIN `admin` ON `user`.`id` = `admin`.`user_id`;");
        $this->setMeta('Контакты');
        $this->set(compact('users'));
    }

}