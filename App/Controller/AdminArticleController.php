<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 30/06/2019
 * Time: 19:10
 */
require "App/Service/ArticleService.php";
require_once "App/Model/Entity/User.php";

class AdminArticleController extends AbstractController
{

    public function init(){
        if(session_id() == '' || !isset($_SESSION))
            session_start();
        $this->set(['isAdmin' => $_SESSION['user'][0]->is_admin]);
        if(empty($_SESSION['user']))
            header('Location: /Home/index');
        if(!$_SESSION['user'][0]->is_admin){
            header("Location: /Userfacture/list");
        }
    }

    public function listAction(){
        $service = new ArticleService($this->_entityManager);
        $articles = $service->getAllArticles(false);
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


    public function createAction(){
        $_POST['image'] = $this->getDataImage();
        $article = new Article($_POST['title'],$_POST['created_at'],$_POST['content'],$_POST['summary'],$_POST['is_published'],$_POST['image']);
        $service = new ArticleService($this->_entityManager);
        $service->createArticle($article);
        $articles = $service->getAllArticles(false);
        $this->set(['articles' => $articles]);
        $this->render('article_list');
    }

    public function updateAction(){
        $service = new ArticleService($this->_entityManager);
        $article = $service->getArticleById($_POST['id']);
        $article -> title = $_POST['title'];
        $article -> summary = $_POST['summary'];
        $article -> content = $_POST['content'];
        $article -> created_at = $_POST['created_at'];
        $article -> is_published = $_POST['is_published'];
        $article -> image = $_POST['image'];
        $service->updateArticle($article);
        $articles = $service->getAllArticles(false);
        $this->set(['articles' => $articles]);
        $this->render('article_list');
    }

    public function deleteAction(){
        $service = new ArticleService($this->_entityManager);
        $service->deleteArticle($_GET['article_id']);
        $articles = $service->getAllArticles(false);
        $this->set(['articles' => $articles]);
        $this->render('article_list');
    }

    private function getDataImage()
    {
        move_uploaded_file($_FILES['image']['tmp_name'], "data/image/" . $_FILES['image']['name']);
        return "/data/image/" . $_FILES['image']['name'];
    }
}