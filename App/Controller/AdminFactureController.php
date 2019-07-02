<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 01/07/2019
 * Time: 13:35
 */
require "App/Service/ArticleService.php";

class AdminFactureController extends AbstractController
{
    public function listAction(){
        $service = new FactureService($this->_entityManager);
        $factures = $service->getAllFactures();
        $this->set(['factures' => $factures]);
        $this->render('Facture_list');
    }

    public function addeditAction(){
        if(!empty($_GET['Facture_id'])){
            $service = new FactureService($this->_entityManager);
            $facture = $service->getFactureById($_GET['facture_id']);
            $this->set(['article' => $facture]);
            $this->render('facture_edit');
            return;
        }
        $this->render('facture_add');
        return;
    }

}