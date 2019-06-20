<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 14/05/2019
 * Time: 18:12
 */
require 'App/Model/Entity/User.php';


class UserRepository
{
    private $_repository;

    /**
     * FactureRepository constructor.
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function __construct($entityManager)
    {
        $this->_repository = $entityManager->getRepository('User');
    }


    public function getAllUsers()
    {
        return $this->_repository->findAll();
    }

    public function getUserById($id)
    {
        return $this->_repository->find($id);
    }

}