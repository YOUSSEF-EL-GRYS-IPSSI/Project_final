<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 01/07/2019
 * Time: 13:25
 */
require "App/Service/ArticleService.php";

class AdminUserController extends AbstractController
{

    public function listUser(){
        $service = new UserService($this->_entityManager);
        $users = $service->getAllUsers();
        $this->set(['User' => $users]);
        $this->render('user_list');
    }

    public function addeditAction(){
        if(!empty($_GET['User_id'])){
            $service = new UserRepository($this->_entityManager);
            $user = $service->getUserById($_GET['user_id']);
            $this->set(['user' => $user]);
            $this->render('user_edit');
            return;
        }
        $this->render('article_add');
        return;
    }
}