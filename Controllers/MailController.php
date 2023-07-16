<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'Libraries/PHPMailer-master/src/PHPMailer.php';
require_once 'Libraries/PHPMailer-master/src/SMTP.php';
require_once 'DBController.php';


Class MailController{
    public $body = '';
public function sendEmail($email){
           $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'testt12877@gmail.com';
            $mail->Password = 'thbgbnfqcptsxsms';
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->isHTML(true);
            $mail->setFrom($mail->Username, "Store");
            $mail->addAddress($email);
            $mail->Subject = ("Password Reset");
            $mail->Body = ($this->body);
            $mail->send();
}
}


?>