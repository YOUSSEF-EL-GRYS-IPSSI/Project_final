<?php
require "App/Service/ArticleService.php";
use Model\Entity\Article;

class HomeController extends AbstractController {

    public function indexAction()
    {
        $this->render('index');
    }

    public function testAction(){
        echo "testcoucou";
    }

    public static function toto2(){

    }

}