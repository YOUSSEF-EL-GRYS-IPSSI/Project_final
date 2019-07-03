<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 01/07/2019
 * Time: 13:35
 */
require "App/Service/FactureService.php";
require_once "App/Model/Entity/User.php";

class AdminFactureController extends AbstractController
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
        $service = new FactureService($this->_entityManager);
        $factures = $service->getAllFactures();
        $this->set(['factures' => $factures]);
        $this->render('Facture_list');
    }

    public function addeditAction(){
        if(!empty($_GET['facture_id'])){
            $service = new FactureService($this->_entityManager);
            $facture = $service->getFactureById($_GET['facture_id']);
            $this->set(['facture' => $facture]);
            $this->render('facture_edit');
            return;
        }
        $this->render('facture_add');
        return;
    }

    public function createAction(){
        $article = new Facture($_POST['title'],new \DateTime($_POST['date']),$_POST['amount'],$_POST['file']);
        $service = new FactureService($this->_entityManager);
        $service->createFacture($article);
        $factures = $service->getAllFactures();
        $this->set(['factures' => $factures]);
        $this->render('Facture_list');
    }

    public function updateAction(){
        $service = new FactureService($this->_entityManager);
        $facture = $service->getFactureById($_POST['id']);
        $facture -> title = $_POST['title'];
        $facture -> date =  new \DateTime($_POST['date']);
        $facture -> amount =$_POST['amount'];
        $facture -> file = $_POST['file'];
        $service->uptadeFacture($facture);
        $factures = $service->getAllFactures();
        $this->set(['factures' => $factures]);
        $this->render('Facture_list');
    }

    public function deleteAction(){
        $service = new FactureService($this->_entityManager);
        $service->deleteFacture($_GET['facture_id']);
        $factures = $service->getAllFactures();
        $this->set(['factures' => $factures]);
        $this->render('Facture_list');
    }

}