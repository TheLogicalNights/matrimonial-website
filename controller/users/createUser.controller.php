<?php
    include 'C:/xampp/htdocs/matrimonial-website/model/config/database.model.php';
    include 'C:/xampp/htdocs/matrimonial-website/model/user.model.php';
    include 'C:/xampp/htdocs/matrimonial-website/model/config/config.php';

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $db = new Database();
    $conn = $db->getConnection();
    $user = new user($conn);

    $user->id = uniqid();
    $user->name = $name;
    $user->email = $email;
    $user->password = $password;

    if($user->createUser())
    {
        $_SESSION['registeredSuccessfully'] = "Congratulations!..You Have Registered Successfully...";
        header("Location: ".$BASE_URL."joinus.php");
    }
    else
    {
        $_SESSION['registerationFailed'] = "Error!..Unable to Register, Please try again...";
        header("Location: ".$BASE_URL."joinus.php");
    }
?>