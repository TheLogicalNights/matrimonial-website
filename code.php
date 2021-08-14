<?php
    session_start();
    include './database.model.php';
    
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        ////////////////////////////////////////////////////////////////////
        //
        // User Registration
        //
        ///////////////////////////////////////////////////////////////////
        if(isset($_POST['signup']))
        {
            $userid = uniqid();
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $isset = 0;

            $query = "select * from users where email = '$email'";
            $result = mysqli_query($conn,$query);
            if (mysqli_num_rows($result) > 0)
            {
                $_SESSION['emailAlreadyUsed'] = "Sorry!..This Email Address is already used, Please try another one...";
                header("Location: ".$BASE_URL."joinus.php");
            }
            else
            {
                $query = "insert into users(userid,name,username,email,password,isset) values ('$userid','$name','$username','$email','$password','$isset')";
                if($conn->query($query))
                {
                    $_SESSION['registeredSuccessfully'] = "Congratulations!..You Have Registered Successfully...";
                    header("Location: ./joinus.php");
                }
                else
                {
                    $_SESSION['registerationFailed'] = "Error!..Unable to Register, Please try again...";
                    header("Location: ".$BASE_URL."joinus.php");
                }
            }
        }
        ////////////////////////////////////////////////////////////////////
        //
        // User Login
        //
        ///////////////////////////////////////////////////////////////////
        if(isset($_POST['signin']))
        {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $query = "SELECT * from users where email = '$email' and password = '$password'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result)==1)
            {
                if($row['isset']==0)
                {
                    $_SESSION['userid'] = $row['userid'];
                    header("Location: ./personal.php");
                }
                else
                {
                    $_SESSION['userid'] = $row['userid'];
                    header("Location: ./main.php");
                }
            }
            else
            {
                $_SESSION['loginfailed'] = "Sorry!..Unable to login, Please check email or password and try again...";
                header("Location: ./joinus.php");
            }
        }
    }
?>
