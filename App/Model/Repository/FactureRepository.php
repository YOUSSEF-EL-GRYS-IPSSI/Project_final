<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 14/05/2019
 * Time: 18:12
 */
require 'App/Model/Entity/Facture.php';


class FactureRepository
{
    private $_repository;

    /**
     * FactureRepository constructor.
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function __construct($entityManager)
    {
        $this->_repository = $entityManager->getRepository('Facture');
    }


    public function getAllFactures(){
        return $this->_repository->findAll();
    }

    public function getFactureById($id){
        return $this->_repository->find($id);
    }

    public function getFactureByUser(User $user){
        return $this->_repository->createQueryBuilder('u')
            ->where("u.user_id = ". $user->getId())
            ->getQuery()->execute();
    }

}