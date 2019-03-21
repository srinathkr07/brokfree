<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "classes/PHPMailer.php";
    require 'classes/SMTP.php';
    require 'classes/Exception.php';
    $mail = new PHPMailer();
    $mail->isSMTP();
    //$mail->SMTPDebug = 2;
    $mail->SMTPAuth= true;
    $mail->SMTPSecure= 'tls';
    $mail->Host ='smtp.gmail.com';
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->Username ='';  //senders mail
    $mail->Password =''; //mail password
    $mail->setFrom('','BrokFree.com');  //alternate name
    $mail->Subject ='BrokFree Account Confirmation';
    ob_start();
    include "../brokfree/templates/confirmemail.html.php";
    $html=ob_get_clean();
    $mail->Body = $html;
    $mail->addAddress($email);  //recievers mail
    if(!$mail->send()){
        echo 'mailer error '.$mail->ErrorInfo;
    }
?>