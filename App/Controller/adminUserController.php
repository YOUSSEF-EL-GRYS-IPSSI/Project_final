<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 01/07/2019
 * Time: 13:25
 */
require "App/Service/UserService.php";
require_once "App/Model/Entity/User.php";

class AdminUserController extends AbstractController
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

        $service = new UserService($this->_entityManager);
        $users = $service->getAllUsers();
        $this->set(['users' => $users]);
        $this->render('user_list');
    }

    public function addeditAction(){
        if(!empty($_GET['user_id'])){
            $service = new UserRepository($this->_entityManager);
            $user = $service->getUserById($_GET['user_id']);
            $this->set(['user' => $user]);
            $this->render('user_edit');
            return;
        }
        $this->set(['isAdmin' => $_SESSION['user'][0]->is_admin]);
        $this->render('user_add');
        return;
    }

    public function createAction(){
        $article = new User($_POST['firstname'],$_POST['lastname'],$_POST['email'],md5($_POST['password']), $_POST['is_admin']);
        $service = new UserService($this->_entityManager);
        $service->createUser($article);
        $users = $service->getAllUsers();
        $this->set(['users' => $users]);
        $this->render('user_list');
    }

    public function updateAction(){
        $service = new UserService($this->_entityManager);
        $user = $service->getUserById($_POST['user_id']);
        $user -> firstname = $_POST['firstname'];
        $user -> lastname = $_POST['lastname'];
        $user -> email = $_POST['email'];
        $user -> password = md5($_POST['password']);
        $user -> is_admin = $_POST['is_admin'];
        $service->uptadeUser($user);
        $users = $service->getAllUsers();
        $this->set(['users' => $users]);
        $this->render('user_list');
    }

    public function deleteAction(){
        $service = new UserService($this->_entityManager);
        $service->deleteUser($_GET['user_id']);
        $users = $service->getAllUsers();
        $this->set(['users' => $users]);
        $this->render('user_list');
    }
}