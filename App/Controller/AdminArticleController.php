<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 30/06/2019
 * Time: 19:10
 */
require "App/Service/ArticleService.php";

class AdminArticleController extends AbstractController
{

    public function listAction(){
        $service = new ArticleService($this->_entityManager);
        $articles = $service->getAllArticles();
        $this->set(['articles' => $articles]);
        $this->render('article_list');
    }
    // set = c'est pour rajouter un dans le $vars
    //render = met en forme le $vars " extact et envoie la view associer au parametre"

    public function addeditAction(){
        if(!empty($_GET['article_id'])){
            $service = new ArticleService($this->_entityManager);
            $article = $service->getArticleById($_GET['article_id']);
            $this->set(['article' => $article]);
            $this->render('article_edit');
            return;
        }
        $this->render('article_add');
        return;
    }
}