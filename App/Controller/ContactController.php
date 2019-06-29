<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 25/06/2019
 * Time: 17:59
 */

class ContactController extends AbstractController
{
    public function indexAction(){
        $this->render('index');
    }

    public function sendmailAction(){
       // $data = json_decode($_POST['data']);




        $test = mail('elgrysyoussef78@gmail.com', 'contact', "coucou");
        echo $test;
    }
}