<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 16/06/2019
 * Time: 19:10
 */
require "App/Service/ArticleService.php";

class ArticleController extends AbstractController
{

    public function findAction(){ // Méthode POST récupérant un seul article avec son id
        $articleService = new ArticleService($this->_entityManager);
        $articles=$articleService->getArticleById($_POST['id']); // Appel du modele*
        $this->set(array('unSeulArticle' => $articles)); // Passage des arguments à la vue
        $this->render('displayOneArticle'); // Appel de la vue
    }

    public function findAllAction(){ // Return vers la vue View/article/list.php
        $articleService = new ArticleService($this->_entityManager);
        $articles=$articleService->getAllArticles(); // Appel du modele*
        $this->set(array('tousLesArticles' => $articles)); // Passage des arguments à la vue
        $this->render('displayAll'); // Appel de la vue
    }

    public function createAction(){ // Méthode AJAX
       $article = new Article(
           $_POST['title'],
           new DateTime($_POST['created_at']),
           $_POST['content'],
           $_POST['summary'],
           $_POST['is_published'],
           $_POST['video'],
           $_POST['collection']
       );
        $articleService = new ArticleService($this->_entityManager);
        $articleService->createArticle($article);
    //    var_dump($articleService->getAllArticles());
     //   die;
    }

    public function updateAction(){ // Méthode AJAX
        $articleService = new ArticleService($this->_entityManager);
        $article = $articleService->getArticleById($_POST['id']);
        isset($_POST['title']) ? $article->setTitle($_POST['title']) : false;
        isset($_POST['created_at']) ? $article->setCreatedAt(new DateTime($_POST['created_at'])) : false;
        isset($_POST['content']) ? $article->setContent($_POST['collection']) : false;
        isset($_POST['summary']) ? $article->setSummary($_POST['summary']) : false;
        isset($_POST['is_published']) ? $article->setIsPublished($_POST['is_published']) : false;
        isset($_POST['video']) ? $article->setVideo($_POST['video']) : false;
        isset($_POST['collection']) ? $article->setVideo($_POST['collection']) : false;
        $articleService->updateArticle($article);
     //   var_dump($articleService->getAllArticles());
    }

    public function deleteAction(){
        $articleService = new ArticleService($this->_entityManager);
        $articleService->deleteArticle($_POST['id']);
        //var_dump($articleService->getAllArticles());
    }

    public function indexAction(){
        $this->render('index');
    }

    public function getArticlesByDateAction(){
        $articleService = new ArticleService($this->_entityManager);
        $this->set(array('article' => json_encode($articleService->getArticlesByDate($_POST['date']))));
        $this->render('index');
    }

    public function getArticlesByDatePostAction(){
        $articleService = new ArticleService($this->_entityManager);
        $date = json_decode($_POST['data'])->startPeriod;
        $data = $articleService->getArticlesByDate($date);
        $data = array_map(function($e){
            return utf8_encode($e);
        }, get_object_vars($data[0]));
        echo json_encode(($data));
        exit;
    }
}