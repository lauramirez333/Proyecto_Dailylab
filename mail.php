<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {

    $mail->SMTPDebug =2; 
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true; 
    $mail->Username   = 'laura2003ramirez@gmail.com';                     //SMTP username
    $mail->Password   = 'shekinah.10';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('laura2003ramirez@gmail.com', 'Mailer');
        $mail->addAddress('azul.mila0621@gmail.com', 'Mailer');     //Add a recipient
        $mail->isHTML(true);
        $mail->Subject = 'Contacto';
        $mail->Body    = 'hola<br>camila';
    
        $mail->send();
    echo 'Message has been sent';

}catch(Exception $exception){
    echo 'algo salio mal', $exception->getMessage();

}