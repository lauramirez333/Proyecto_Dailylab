<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Controller\UsuarioController;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//require 'src/vendor/autoload.php';//con esto se depuro autom...

//$usuario = new UsuarioController;

//$mail= $citas-> $_POST['Correo_Electronico'];

        //mandar correo
        $mail = new PHPMailer(true);
 //       $usuario->recuPass();

try {
    //Server settings
 //   $mail->SMTPDebug = 0;  //aqui hay un error                    //Enable verbose debug output
    $mail=new PHPMailer;
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'laura2003ramirez@gmail.com';                     //SMTP username
    $mail->Password   = 'shekinah.10';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('laura2003ramirez@gmail.com', 'Mailer');
    $mail->addAddress('azul.mila0621@gmail.com', 'Mailer');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contacto';
    $mail->Body    = 'hola<br>camila';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

