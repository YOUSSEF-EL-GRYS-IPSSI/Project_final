<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 10/06/2019
 * Time: 17:48
 */
require "App/Model/Repository/ArticleRepository.php";


class ArticleService
{
    /**
     * @var \Doctrine\ORM\EntityManager $_entityManager
     */
    private $_entityManager;

    /**
     * @var ArticleRepository $_articleRepository
     */
    private $_articleRepository;

    /**
     * ArticleService constructor.
     * @param $entityManager
     */
    public function __construct($entityManager)
    {
        $this->_entityManager = $entityManager;
        $this->_articleRepository = new ArticleRepository($entityManager);
    }


    public function getArticleById($id){
        return $this->_articleRepository->getArticleById($id);

    }

    public function getAllArticles($published = true){
        return $this->_articleRepository->getAllArticles($published);
    }

    public function createArticle(Article $article){
        $this->_entityManager->persist($article);
        $this->_entityManager->flush();
    }

    public function updateArticle(Article $article){
        $this->_entityManager->flush($article);

    }

    public function deleteArticle($id){
        $article = $this->getArticleById($id);
        $this->_entityManager->remove($article);
        $this->_entityManager->flush();
    }

    public function getArticlesByDate($date){
        return $this->_articleRepository->getArticlesByDate($date);
    }
}




