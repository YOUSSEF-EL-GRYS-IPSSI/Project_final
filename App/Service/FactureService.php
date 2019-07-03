<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 10/06/2019
 * Time: 17:48
 */
require "App/Model/Repository/FactureRepository.php";


class FactureService
{
    /**
     * @var \Doctrine\ORM\EntityManager $_entityManager
     */
    private $_entityManager;

    /**
     * @var FactureRepository $_articleRepository
     */
    private $_factureRepository;

    /**
     * FactureService constructor.
     * @param $entityManager
     */
    public function __construct($entityManager)
    {
        $this->_entityManager = $entityManager;
        $this->_factureRepository = new FactureRepository($entityManager);
    }


    public function getFactureById($id){
        return $this->_factureRepository->getFactureById($id);

    }

    public function getAllFactures(){
        return $this->_factureRepository->getAllFactures();
    }

    public function createFacture(Facture $facture){
        $this->_entityManager->persist($facture);
        $this->_entityManager->flush();
    }

    public function uptadeFacture(Facture $facture){
        $this->_entityManager->flush($facture);

    }

    public function deleteFacture($id){
        $facture = $this->getFactureById($id);
        $this->_entityManager->remove($facture);
        $this->_entityManager->flush();
    }
}
