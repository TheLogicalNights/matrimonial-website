<?php
    include 'C:/xampp/htdocs/matrimonial-website/model/config/database.model.php';
    include 'C:/xampp/htdocs/matrimonial-website/model/user.model.php';
    include 'C:/xampp/htdocs/matrimonial-website/model/config/config.php';

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $db = new Database();
    $conn = $db->getConnection();
    $user = new user($conn);

    $user->email = $email;
    $user->password = $password;

    $result = $user->loginUsers();

    if($result)
    {
        if($result[0]['isset']==0)
        {
            $_SESSION['userid'] = $result[0]['userid'];
            header("Location: ".$BASE_URL."personal.php");
        }
        else
        {
            $_SESSION['userid'] = $result[0]['userid'];
            header("Location: ".$BASE_URL."main.php");
        }
    }
    else
    {
        $_SESSION['loginfailed'] = "Sorry!..Unable to login, Please check email or password and try again...";
        header("Location: ".$BASE_URL."joinus.php");
    }

?>