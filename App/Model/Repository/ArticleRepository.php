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
        $this->_repository = $entityManager->getRepository('article');
    }

    /**
     * @param $published
     * @return mixed
     */
    public function getAllArticles($published){
        // c'est l'objet de construction d'une requete SQL
        $builder = $this->_repository->createQueryBuilder('a');
        if($published)
            $builder->where('a.is_published = 1');
        return $builder->getQuery()->execute();
    }

    public function getArticleById($id){
        //tu me recherche larticle qui a pour cléf primaire $id
        return $this->_repository->find($id);
    }

    public function getArticlesByDate($date){
        return $this->_repository->createQueryBuilder('a')
            ->where("a.created_at = '". $date . "'")
            ->andWhere('a.is_published = 1')
            ->getQuery()->execute();
    }

    public function getArticlesBetweenTwoDates($startDate, $endDate){
        return $this->_repository->createQueryBuilder('a')
            ->where("a.created_at >= '". $startDate . "'")
            ->andWhere("a.created_at <= '". $endDate . "'")
            ->andWhere('a.is_published = 1')
            ->getQuery()->execute();
    }

}