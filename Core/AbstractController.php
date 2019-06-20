<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 21/05/2019
 * Time: 17:56
 */

abstract class AbstractController
{
    /**
     * @var array
     * Les variables qui seront envoyées à la view
     */
    private $_vars = array();

    /**
     * @var \Doctrine\ORM\EntityManager $_entityManager
     * L'entityManager de mon application
     */
    protected $_entityManager;

    public function __construct($entityManager)
    {
        $this->_entityManager = $entityManager;
    }



    /**
     * @param $d array
     * Ajout d'une d'un tableau à vars
     */
    protected final function set(array $d)
    {
        $this->_vars = array_merge($this->_vars, $d);
    }

    /**
     * @param $filename
     * Extraction des variables
     * Affichage de la vue
     */
    protected final function render($filename){
        extract($this->_vars);
        require(ROOT. "App/View/" . lcfirst(str_replace('Controller','',get_class($this))).'/'.$filename.'.phtml');
    }

}