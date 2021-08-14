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
            echo $_SESSION['otp'];
        }
    }
    if(isset($_POST['generateotp']))
    {
        $email = $_POST['email'];
        $db = new Database();
        $conn = $db->getConnection();
        $user = new user($conn);
        $user->email = $email;
        $iNo = $user->chkMail();
        if($iNo>0)
        {
            $_SESSION['RegisterFailure'] = "This email address is already used please try another one.";
            header('Location: register.php');
        }
        else
        {
            $otptosend = rand(99999,999999);
            $to = $_POST['email'];
            $_SESSION['email'] = $_POST['email'];
            $subject = "Email Verification";
            $message = "Hello sir/mam your OTP for email verifivation is ".$otptosend;
        
            if(smtpMailer($to,$from,$subject,$message))
            {

                $_SESSION['otp'] = $otptosend;
                $_SESSION['email'] = $to;
                $_SESSION['otpsuccess'] = "success";
                // header('Location: register.php');
            }
            else
            {
                $_SESSION['RegisterFailure'] = "OTP not send..! Please try again.";
                // header('Location: register.php');
            }
        }
    }
?>