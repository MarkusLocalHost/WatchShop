<?php


namespace app\controllers\admin;


class ProfileController extends AppController
{

    public function indexAction()
    {
        $user = \R::findOne('user', 'id = ?', [$_SESSION['user']['id']]);

        $admin = \R::findOne('admin', 'user_id = ?', [$_SESSION['user']['id']]);

        $this->setMeta('Личный кабинет');
        $this->set(compact('user', 'admin'));
    }

}