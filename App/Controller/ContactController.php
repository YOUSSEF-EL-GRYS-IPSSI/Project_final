<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 25/06/2019
 * Time: 17:59
 */
require "App/Service/ArticleService.php";
1
class ContactController extends AbstractController
{
    public function indexAction(){
        $this->render('index');
    }

    public function sendmailAction(){
        $html = $this->createHtmlMail(json_decode($_POST['data']));
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;

// But you can comment from here
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->CharSet = "UTF-8";
// To here. 'cause default secure is TLS.

        $mail->setFrom(json_decode($_POST['data'])->email, json_decode($_POST['data'])->name);
        $mail->Username = "elgrysyoussef78@gmail.com";
        $mail->Password = "momo78955";

        $mail->Subject = "Тест";
        $mail->isHTML(true);
        $mail->msgHTML($html);
        $mail->addAddress("ceccaldi.jeanbaptiste@gmail.com", "Ceccaldi");

        if (!$mail->send()) {
            $mail->ErrorInfo;
        } else {
            echo 123;
            echo "coucou";
//        echo $test;
        }
    }

    private function createHtmlMail($params){
        $message = $params->message;
        $signal = $params->signal;
        $orient = $params->orient;
        $email = $params->email;
        $name = $params->name;
        $html = '<div> De : '. $name . "<br/>";
        $html .= '<div> Email : '. $email . "<br/>";
        $html .= '<div> Signalement : '. $signal . "<br/>";
        $html .= '<div> Orientation : '. $orient . "<br/>";
        $html .= '<div> Message : '. $message . "<br/>";
        return $html;
    }
}