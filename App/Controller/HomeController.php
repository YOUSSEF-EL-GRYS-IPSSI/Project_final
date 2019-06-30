<?php
require "App/Service/ArticleService.php";
use Model\Entity\Article;

require "App/Service/UserService.php";


class HomeController extends AbstractController {

    public function indexAction()
    {
        $this->render('index');
    }

    public function connectAction(){
        $service = new UserService($this->_entityManager);
        $user = $service->getUserByLoginAndPwd($_POST['email'], $_POST['pwd']);
        if(!empty($user)){
            session_start();
            $_SESSION['user'] = $user;
            header('Location:/Adminarticle/list');
            die;
        }
        $this->render('index');
    }

}