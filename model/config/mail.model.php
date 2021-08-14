<?php
    require 'C:/xampp/htdocs/matrimonial-website/PHPMailer/PHPMailerAutoload.php';
    require 'C:/xampp/htdocs/matrimonial-website/PHPMailer/class.phpmailer.php';
    require 'C:/xampp/htdocs/matrimonial-website/PHPMailer/class.smtp.php';
    include 'C:/xampp/htdocs/matrimonial-website/model/user.model.php';
    include 'C:/xampp/htdocs/matrimonial-website/model/config/database.model.php';
    
    $from = "noreply@maitrijanmojanmachi.com";

    function smtpMailer($to,$from,$subject,$body)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPDebug = 1;
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = 'Maitri@411011@';
        $mail->setFrom($from, 'Maitri Janmojanmachi');
        $mail->addReplyTo($from, 'Maitri Janmojanmachi');
        $mail->addAddress($to, 'Swapnil Ramesh Adhav');
        $mail->Subject = $subject;
        $mail->Body = $body;
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'The email message was sent.';
            echo $_SESSION['otpsuccess'];
        }
    }
?>