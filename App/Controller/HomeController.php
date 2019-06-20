<?php
require "App/Service/ArticleService.php";
use Model\Entity\Article;

class HomeController extends AbstractController {

    public function indexAction()
    {
      //  $articleRepository = $this->_entityManager->getRepository('Article');

        $articleService = new ArticleService($this->_entityManager);
        $article = $articleService->getAllArticles();
        var_dump($article);
        $this->set(['test' => ['name' => "name", 'civility' => "Man"]]);
      $this->render('index');
    }

    public function testAction(){
        echo "testcoucou";
    }

    public static function toto2(){

    }

}