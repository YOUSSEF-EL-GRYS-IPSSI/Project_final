<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 10/06/2019
 * Time: 17:48
 */
require "App/Model/Repository/UserRepository.php";


class UserService
{
    /**
     * @var \Doctrine\ORM\EntityManager $_entityManager
     */
    private $_entityManager;

    /**
     * @var UserRepository $_UserRepository
     */
    private $_userRepository;

    /**
     * ArticleService constructor.
     * @param $entityManager
     */
    public function __construct($entityManager)
    {
        $this->_entityManager = $entityManager;
        $this->_userRepository = new FactureRepository($entityManager);
    }

    /**
     * @param $id
     * @return User
     *
     */
    public function getUserById($id){
        return $this->_userRepository->getUserById($id);

    }

    public function getAllUsers(){
        return $this->_userRepository->getAllUsers();
    }

    public function createUser(User $user){
        $this->_entityManager->persist($user);
        $this->_entityManager->flush();
    }

    public function uptadeUser(User $user){
        $this->_entityManager->flush($user);

    }

    public function deleteUser($id){
        $user = $this->getFactureById($id);
        $this->_entityManager->remove($user);
        $this->_entityManager->flush();
    }
}