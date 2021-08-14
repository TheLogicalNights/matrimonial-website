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
        ////////////////////////////////////////////////////////////////////
        //
        // Personal Info
        //
        ///////////////////////////////////////////////////////////////////
        if(isset($_POST['personalinfo']))
        {
            $userid = $_SESSION['userid'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $fathersname = $_POST['fathersname'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $phoneno = $_POST['phoneno'];
            $gender = $_POST['gender'];
            $bloodgroup = $_POST['bloodgroup'];
            $religion = $_POST['religion'];
            $cast = $_POST['cast'];
            $category = $_POST['category'];
            $otherinfo = $_POST['otherinfo'];

            $query = "select * from personal_info where userid = '$userid'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)==1)
            {
                $_SESSION['alreadyentereddetails'] = "Sorry!.., You have already entered personal details. You cannot enter it again...";
                header("Location: ./address.php");
            }
            else
            {
                $query = "INSERT into personal_info(userid,first_name,last_name,fathers_name,dob,email,phone_no,gender,blood_group,religion,cast,category,other_info) 
                values('$userid','$firstname','$lastname','$fathersname','$dob','$email','$phoneno','$gender','$bloodgroup','$religion','$cast','$category','$otherinfo')";

                if(mysqli_query($conn,$query))
                {
                    header("Location: ./address.php");   
                }
                else
                {
                    header("Location: ./personal.php");
                }
            }
        }
        ////////////////////////////////////////////////////////////////////
        //
        // Address Info
        //
        ///////////////////////////////////////////////////////////////////
        if(isset($_POST['addressinfo']))
        {
            $userid = $_SESSION['userid'];
            $cAddress1 = $_POST['caddress1'];
            $cAddress2 = $_POST['caddress2'];
            $cAddress3 = $_POST['caddress3'];
            $cCountry = $_POST['ccountry'];
            $cCity = $_POST['ccity'];
            $cState = $_POST['cstate'];
            $cZip = $_POST['czip'];
            
            $query = "select * from address_info where userid = '$userid'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)==1)
            {
                $_SESSION['alreadyentereddetails'] = "Sorry!.., You have already entered personal details. You cannot enter it again...";
                header("Location: ./professionalinfo.php");
            }
            else
            {
                $query = "insert into address_info(userid,address1,address2,address3,country,state,city,zip) values('$userid','$cAddress1','$cAddress2','$cAddress3','$cCountry','$cState','$cCity','$cZip')";
                if(mysqli_query($conn,$query))
                {
                    header("Location: ./professionalinfo.php");   
                }
                else
                {
                    header("Location: ./address.php");
                }
            }

        }
        ////////////////////////////////////////////////////////////////////
        //
        // Proffessional Info
        //
        ///////////////////////////////////////////////////////////////////
        if(isset($_POST['proffressionalinfo']))
        {
            $userid = $_SESSION['userid'];
            $type = $_POST['type'];
            $qualification = $_POST['qualification'];
            $companyname = $_POST['companyname'];
            $designation = "";
            if($type=="buisness")
            {
                $designation = "owner";
            }
            else
            {
                $designation = $_POST['designtion'];
            }
            $query = "select * from proffessional_info where userid = '$userid'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)==1)
            {
                $_SESSION['alreadyentereddetails'] = "Sorry!.., You have already entered personal details. You cannot enter it again...";
                header("Location: ./main.php");
            }
            else
            {
                $query = "insert into proffessional_info(userid,type,highest_qualification,company_name,designation) values('$userid','$type','$qualification','$companyname','$designation')";
                if(mysqli_query($conn,$query))
                {
                    echo "success...";
                    header("Location: ./main.php");   
                }
                else
                {
                    echo "failed";
                    header("Location: ./professionalinfo.php");
                }
            }            
        }
    }
?>
