<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 14/05/2019
 * Time: 18:12
 */
require 'App/Model/Entity/Article.php';

class ArticleRepository
{

    private $_repository;

    /**
     * ArticleRepository constructor.
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function __construct($entityManager)
    {
        $this->_repository = $entityManager->getRepository('Article');
    }


    public function getAllArticles(){
        return $this->_repository->findAll();
    }

    public function getArticleById($id){
        return $this->_repository->find($id);
    }

}