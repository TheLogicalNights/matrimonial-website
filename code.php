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
            $isactive = 0;
            $plan = "";
            $purchasedOn = date("Y-m-d");
            $expiry_date = date("Y-m-d");
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
                header("Location: ./photos.php");
            }
            else
            {
                $query = "insert into proffessional_info(userid,type,highest_qualification,company_name,designation) values('$userid','$type','$qualification','$companyname','$designation')";
                if(mysqli_query($conn,$query))
                {
                    $query = "update users set isset = '1' where userid = '$userid'";
                    if(mysqli_query($conn,$query))
                    {
                        echo "update success......";
                        $query = "insert into profile(userid, isactive, plan, purchased_on, expiry_date) values('$userid','$isactive','$plan','$purchasedOn','$expiry_date')"; 
                        if(mysqli_query($conn,$query))
                        {
                            header("Location: ./photos.php");  
                        }
                        else
                        {
                            echo mysqli_error($conn);
                        }
                    } 
                }
                else
                {
                    header("Location: ./professionalinfo.php");
                }
            }            
        }
        ////////////////////////////////////////////////////////////////////
        //
        // Upload images
        //
        ///////////////////////////////////////////////////////////////////
        if(isset($_POST['uploadpics']))
        {
            $foldername = $_SESSION['userid'];
            $profile_dir = "./profilepictures/$foldername/";
            $picture_dir = "./pictures/$foldername/";

            $target_file = $profile_dir . basename($_FILES["profilepic"]["name"]);
            $pic1 = $picture_dir . basename($_FILES["pic1"]["name"]);
            $pic2 = $picture_dir . basename($_FILES["pic2"]["name"]);
            $pic3 = $picture_dir . basename($_FILES["pic3"]["name"]);

            $profileFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $pic1FileType = strtolower(pathinfo($pic1,PATHINFO_EXTENSION));
            $pic2FileType = strtolower(pathinfo($pic2,PATHINFO_EXTENSION));
            $pic3FileType = strtolower(pathinfo($pic3,PATHINFO_EXTENSION));
            
            if (!file_exists($profile_dir)) 
            { 
                mkdir($profile_dir, 0777, true);
            }
            if(!file_exists($picture_dir))
            {
                mkdir($picture_dir,0777,true);
            }
            echo $profileFileType."<br>";
            if($profileFileType != "jpg" && $profileFileType != "png" && $profileFileType != "jpeg" && 
                $pic1FileType != "jpg" && $pic1FileType != "png" && $pic1FileType != "jpeg" && 
                $pic2FileType != "jpg" && $pic2FileType != "png" && $pic2FileType != "jpeg" && 
                $pic3FileType != "jpg" && $pic3FileType != "png" && $pic3FileType != "jpeg") 
            {
                $_SESSION['imgformatfailure'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                header("Location: ./photos.php");
            }
            else
            {
                $query = "select * from pictures where userid = '$foldername'";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result)==1)
                {
                    $_SESSION['alreadyentereddetails'] = "Sorry!.., You have already entered personal details. You cannot enter it again...";
                    header("Location: ./mail.php");
                }
                else
                {
                    if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file))
                    {
                        if (move_uploaded_file($_FILES["pic1"]["tmp_name"], $pic1))
                        {
                            if (move_uploaded_file($_FILES["pic2"]["tmp_name"], $pic2))
                            {
                                if (move_uploaded_file($_FILES["pic3"]["tmp_name"], $pic3))
                                {
                                    $query = "insert into pictures(userid, profilepic, pic1, pic2, pic3) values('$foldername','$target_file','$pic1','$pic2','$pic3')";
                                    if(mysqli_query($conn,$query))
                                    {
                                        header("Location: ./main.php");  
                                    }
                                    else
                                    {   
                                        echo mysqli_error($conn);
                                    }
                                }
                                else
                                {
                                    $_SESSION['profilepictureuploadfailure'] = "We have error while uploading your picture 3";
                                    header("Location: ./photos.php");
                                }
                            }
                            else
                            {
                                $_SESSION['profilepictureuploadfailure'] = "We have error while uploading your picture 2";
                                header("Location: ./photos.php");
                            }
                        }
                        else
                        {
                            $_SESSION['profilepictureuploadfailure'] = "We have error while uploading your picture 1";
                            header("Location: ./photos.php");
                        }    
                    }
                    else
                    {
                        $_SESSION['profilepictureuploadfailure'] = "We have error while uploading your profile picture";
                        header("Location: ./photos.php");
                    }
                }
            }
        }
        ////////////////////////////////////////////////////////////////////
        //
        // View Profile
        //
        ///////////////////////////////////////////////////////////////////
        if(isset($_POST['viewprofile']))
        {
            $id = $_POST['id'];

            $query = "select * from profile where userid = '$id'";
            $result = mysqli_query($conn,$query);
            $iNo = mysqli_num_rows($result);
        }
        ////////////////////////////////////////////////////////////////////
        //
        // Logout
        //
        ///////////////////////////////////////////////////////////////////
        if(isset($_POST['logout']))
        {
            session_unset();
            header("Location: ./joinus.php");
        }
    }
?>
