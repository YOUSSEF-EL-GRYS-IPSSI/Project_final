<?php

require_once "App/Model/Entity/User.php";

class UserFactureController extends AbstractController
{
    public function listAction(){
        if(session_id() == '' || !isset($_SESSION))
            session_start();
        $this->set(['isAdmin' => $_SESSION['user'][0]->is_admin]);
        $this->render("index");
    }

    public function getPDFAction(){
        $html2pdf = new \Spipu\Html2Pdf\Html2Pdf();
        $html2pdf->writeHTML("<p>coucou</p>");
        $html2pdf->output();
    }
}