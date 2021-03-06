<?php
session_start();
$myid = $_SESSION['userid'];
if (!isset($_SESSION['userid'])) {
    header("Location: joinus.php");
}
include './database.model.php';
include './imgResize.php';

// Flags
$getRequest = false;
$genderSelected = false;
$qualificationSet = false;
$castSet = false;
$citySet = false;
$selectedBoth = false;
$gendereducationSet = false;
$gendercastSet = false;
$gendercitySet = false;
$educationcastSet = false;
$educationcitySet = false;
$castcitySet = false;

// Arrays
$gendereducation = array();
$gendercast = array();
$gendercity = array();
$educationcast = array();
$educationcity = array();
$castcity = array();

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $gender = $_POST['gender'];
    $education = $_POST['qualification'];
    $cast = $_POST['cast'];
    $city = $_POST['city'];

    if($gender=='all' && $education=='all' && $cast=='all' && $city=='all')
    {
        $query = "select * from profile";
        $getRequestResult = mysqli_query($conn, $query);
        $getRequest = true;
    }
    elseif($gender!='all' && $education=='all' && $cast=='all' && $city=='all')
    {
        $query = "SELECT userid from personal_info WHERE gender = '$gender'";
        $genderResult = mysqli_query($conn, $query);
        $genderSelected = true;
    }
    elseif($gender=='all' && $education!='all' && $cast=='all' && $city=='all')
    {
        $query = "SELECT userid from proffessional_info WHERE highest_qualification = '$education'";
        $educationResult = mysqli_query($conn, $query);
        $qualificationSet = false;
    }
    elseif($gender=='all' && $education=='all' && $cast!='all' && $city=='all')
    {
        $query = "SELECT userid from personal_info WHERE cast = '$cast'";
        $castResult = mysqli_query($conn, $query);
        $castSet = true;
    }
    elseif($gender=='all' && $education=='all' && $cast=='all' && $city!='all')
    {
        $query = "SELECT userid from address_info WHERE city = '$city'";
        $cityResult = mysqli_query($conn, $query);
        $citySet = true;
    }
    elseif(($gender!='all' && $education!='all') && ($cast=='all' && $city=='all'))
    {
        $query = "SELECT userid from personal_info WHERE gender = '$gender'";
        $genderResult = mysqli_query($conn, $query);
        while($genderRow = mysqli_fetch_assoc($genderResult))
        {
            $query = "SELECT userid from proffessional_info WHERE highest_qualification = '$education'";
            $educationResult = mysqli_query($conn, $query);
            while($educationRow = mysqli_fetch_assoc($educationResult))
            {
                if(($genderRow['userid']) == ($educationRow['userid']))
                {
                    array_push($gendereducation,$educationRow['userid']);
                }
            }
        }
        $gendereducationSet = true;
    }
    elseif(($gender!='all' && $cast!='all') &&  ($education=='all' && $city=='all'))
    {
        $query = "SELECT userid from personal_info WHERE gender = '$gender'";
        $genderResult = mysqli_query($conn, $query);
        while($genderRow = mysqli_fetch_assoc($genderResult))
        {
            $query = "SELECT userid from personal_info WHERE cast = '$cast'";
            $castResult = mysqli_query($conn, $query);
            while($castRow = mysqli_fetch_assoc($castResult))
            {
                if(($genderRow['userid']) == ($castRow['userid']))
                {
                    array_push($gendercast,$castRow['userid']);
                }
            }
        }
        $gendercastSet = true;
    }
    elseif(($gender!='all' && $city!='all') && ($cast=='all' && $education=='all'))
    {
        $query = "SELECT userid from personal_info WHERE gender = '$gender'";
        $genderResult = mysqli_query($conn, $query);
        while($genderRow = mysqli_fetch_assoc($genderResult))
        {
            $query = "SELECT userid from address_info WHERE city = '$city'";
            $cityResult = mysqli_query($conn, $query);
            while($cityRow = mysqli_fetch_assoc($cityResult))
            {
                if(($genderRow['userid']) == ($cityRow['userid']))
                {
                    array_push($gendercity,$cityRow['userid']);
                }
            }
        }
        $gendercitySet = true;
    }
    elseif(($education!='all' && $cast!='all') && $city=='all')
    {
        $query = "SELECT userid from proffessional_info WHERE highest_qualification = '$education'";
        $educationResult = mysqli_query($conn, $query);
        while($educationRow = mysqli_fetch_assoc($educationResult))
        {
            $query = "SELECT userid from personal_info WHERE cast = '$cast'";
            $castResult = mysqli_query($conn, $query);
            while($castRow = mysqli_fetch_assoc($castResult))
            {
                if(($educationRow['userid']) == ($castRow['userid']))
                {
                    array_push($educationcast,$castRow['userid']);
                }
            }
        }
        $educationcastSet = true;
    }
    elseif(($education!='all' && $city!='all') && $cast=='all')
    {
        echo "education and city selected";
        $query = "SELECT userid from proffessional_info WHERE highest_qualification = '$education'";
        $educationResult = mysqli_query($conn, $query);
        while($educationRow = mysqli_fetch_assoc($educationResult))
        {
            $query = "SELECT userid from address_info WHERE city = '$city'";
            $cityResult = mysqli_query($conn, $query);
            while($cityRow = mysqli_fetch_assoc($cityResult))
            {
                if(($educationRow['userid']) == ($cityRow['userid']))
                {
                    array_push($gendercity,$cityRow['userid']);
                }
            }
            $educationcitySet = true;
        }
    }
    elseif($city!='all' && $cast!='all')
    {
        $query = "SELECT userid from personal_info WHERE cast = '$cast'";
        $castResult = mysqli_query($conn, $query);
        while($castRow = mysqli_fetch_assoc($castResult))
        {
            $query = "SELECT userid from address_info WHERE city = '$city'";
            $cityResult = mysqli_query($conn, $query);
            while($cityRow = mysqli_fetch_assoc($cityResult))
            {
                if(($castRow['userid']) == ($cityRow['userid']))
                {
                    array_push($castcity,$cityRow['userid']);
                }
            }
        }
        $castcitySet = true;
    }
}
else 
{
    $query = "select * from profile";
    $getRequestResult = mysqli_query($conn, $query);
    $getRequest = true;
}    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Maitri Janmojanmichi | Join Us</title>
    <link rel="icon" href="./img/3.png" sizes="32X32" type="image/png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <link rel="stylesheet" href="css/main-style.css" />
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Navbar -->
        <?php
        include './navbar.php';
        ?>
    </header>
    <main class="body">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upgrade to pro</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">You don't have subscription to any plan to use more features please subscribe to any one plan.For More details please contact to customer care.</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <section class="container">
            <div class="row my-5">
                
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <!-- card 1 -->
                    <!-- <div class="col-lg-3 col-md-4 col-sm-3">
                        <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                            <div class="person-img">
                                <img src="./img/1.jpg" class="img-fluid" alt="profile-picture">
                            </div>
                            <div class="person-name my-2">
                                <h3 class="text-white">Swapnil Adhav</h3>
                            </div>
                            <div class="info">
                                <h6 class="text-white">Web Developer</h6>
                            </div>
                            <div class="social-icons">
                                <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                            </div>
                            <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="#" role="button" rel="nofollow">Click To Join Us</a>
                        </div>
                    </div> -->
                    <?php
                    if($getRequest)
                    {
                        while ($getRequestRow = mysqli_fetch_assoc($getRequestResult)) {
                            $userid = $getRequestRow['userid'];
                            $query1 = "select * from users where userid = '$userid'";
                            $result1 = mysqli_query($conn, $query1);
                            $details = mysqli_fetch_assoc($result1);
                            $query2 = "select * from pictures where userid = '$userid'";
                            $result2 = mysqli_query($conn, $query2);
                            $pictures = mysqli_fetch_assoc($result2);
                            $mysock = getimagesize($pictures['profilepic']);
                            $query3 = "select * from profile where userid = '$myid'";
                            $result3 = mysqli_query($conn, $query3);
                            $personal = mysqli_fetch_assoc($result3);
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-3">
                            <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                                <div class="person-img">
                                    <img src="<?php echo $pictures['profilepic']; ?>" <?php echo imageResize($mysock[0], $mysock[1], 250); ?> alt="profile-picture">
                                </div>
                                <div class="person-name my-2 text-center">
                                    <h3 class="text-white"><?php echo $details['name']; ?></h3>
                                </div>
                                <!-- <div class="info">
                                        <h6 class="text-white">Web Developer</h6>
                                    </div> -->
                                <!-- <div class="social-icons">
                                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                                    </div> -->
                                <?php
                                if ($personal['isactive'] == 0) {

                                ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark btn-lg btn-block mt-2 my-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                        View Profile
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="./visitprofile.php?userid=<?php echo $userid ?>" role="button" rel="nofollow">View Profile</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    if($genderSelected)
                    {
                        while ($genderRow = mysqli_fetch_assoc($genderResult)) {
                            $userid = $genderRow['userid'];
                            $query1 = "select * from users where userid = '$userid'";
                            $result1 = mysqli_query($conn, $query1);
                            $details = mysqli_fetch_assoc($result1);
                            $query2 = "select * from pictures where userid = '$userid'";
                            $result2 = mysqli_query($conn, $query2);
                            $pictures = mysqli_fetch_assoc($result2);
                            $mysock = getimagesize($pictures['profilepic']);
                            $query3 = "select * from profile where userid = '$myid'";
                            $result3 = mysqli_query($conn, $query3);
                            $personal = mysqli_fetch_assoc($result3);
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-3">
                            <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                                <div class="person-img">
                                    <img src="<?php echo $pictures['profilepic']; ?>" <?php echo imageResize($mysock[0], $mysock[1], 250); ?> alt="profile-picture">
                                </div>
                                <div class="person-name my-2 text-center">
                                    <h3 class="text-white"><?php echo $details['name']; ?></h3>
                                </div>
                                <!-- <div class="info">
                                        <h6 class="text-white">Web Developer</h6>
                                    </div> -->
                                <!-- <div class="social-icons">
                                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                                    </div> -->
                                <?php
                                if ($personal['isactive'] == 0) {

                                ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark btn-lg btn-block mt-2 my-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                        View Profile
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="./visitprofile.php?userid=<?php echo $userid ?>" role="button" rel="nofollow">View Profile</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    elseif($qualificationSet)
                    {
                        while($qualification_row = mysqli_fetch_assoc($educationResult))
                        {
                            $userid = $qualification_row['userid'];
                            $query = "select * from users where userid = '$userid'";
                            $result = mysqli_query($conn, $query);
                            $details = mysqli_fetch_assoc($result);
                            $query = "select * from pictures where userid = '$userid'";
                            $result1 = mysqli_query($conn, $query);
                            $pictures = mysqli_fetch_assoc($result1);
                            $mysock = getimagesize($pictures['profilepic']);
                            $query = "select * from profile where userid = '$myid'";
                            $result = mysqli_query($conn, $query);
                            $personal = mysqli_fetch_assoc($result);
                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-3">
                            <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                                <div class="person-img">
                                    <img src="<?php echo $pictures['profilepic']; ?>" <?php echo imageResize($mysock[0], $mysock[1], 250); ?> alt="profile-picture">
                                </div>
                                <div class="person-name my-2 text-center">
                                    <h3 class="text-white"><?php echo $details['name']; ?></h3>
                                </div>
                                <!-- <div class="info">
                                        <h6 class="text-white">Web Developer</h6>
                                    </div> -->
                                <!-- <div class="social-icons">
                                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                                    </div> -->
                                <?php
                                if ($personal['isactive'] == 0) {

                                ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark btn-lg btn-block mt-2 my-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                        View Profile
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="./visitprofile.php?userid=<?php echo $userid ?>" role="button" rel="nofollow">View Profile</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>      
                    <?php
                        }
                    }
                    elseif($castSet)
                    {
                        while($cast_row = mysqli_fetch_assoc($castResult))
                        {
                            $userid = $cast_row['userid'];
                            $query = "select * from users where userid = '$userid'";
                            $result = mysqli_query($conn, $query);
                            $details = mysqli_fetch_assoc($result);
                            $query = "select * from pictures where userid = '$userid'";
                            $result1 = mysqli_query($conn, $query);
                            $pictures = mysqli_fetch_assoc($result1);
                            $mysock = getimagesize($pictures['profilepic']);
                            $query = "select * from profile where userid = '$myid'";
                            $result = mysqli_query($conn, $query);
                            $personal = mysqli_fetch_assoc($result);
                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-3">
                            <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                                <div class="person-img">
                                    <img src="<?php echo $pictures['profilepic']; ?>" <?php echo imageResize($mysock[0], $mysock[1], 250); ?> alt="profile-picture">
                                </div>
                                <div class="person-name my-2 text-center">
                                    <h3 class="text-white"><?php echo $details['name']; ?></h3>
                                </div>
                                <!-- <div class="info">
                                        <h6 class="text-white">Web Developer</h6>
                                    </div> -->
                                <!-- <div class="social-icons">
                                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                                    </div> -->
                                <?php
                                if ($personal['isactive'] == 0) {

                                ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark btn-lg btn-block mt-2 my-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                        View Profile
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="./visitprofile.php?userid=<?php echo $userid ?>" role="button" rel="nofollow">View Profile</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>      
                    <?php
                        }
                    }
                    elseif($citySet)
                    {
                        while($cityRow = mysqli_fetch_assoc($cityResult))
                        {
                            $userid = $cityRow['userid'];
                            $query = "select * from users where userid = '$userid'";
                            $result = mysqli_query($conn, $query);
                            $details = mysqli_fetch_assoc($result);
                            $query = "select * from pictures where userid = '$userid'";
                            $result1 = mysqli_query($conn, $query);
                            $pictures = mysqli_fetch_assoc($result1);
                            $mysock = getimagesize($pictures['profilepic']);
                            $query = "select * from profile where userid = '$myid'";
                            $result = mysqli_query($conn, $query);
                            $personal = mysqli_fetch_assoc($result);
                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-3">
                            <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                                <div class="person-img">
                                    <img src="<?php echo $pictures['profilepic']; ?>" <?php echo imageResize($mysock[0], $mysock[1], 250); ?> alt="profile-picture">
                                </div>
                                <div class="person-name my-2 text-center">
                                    <h3 class="text-white"><?php echo $details['name']; ?></h3>
                                </div>
                                <!-- <div class="info">
                                        <h6 class="text-white">Web Developer</h6>
                                    </div> -->
                                <!-- <div class="social-icons">
                                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                                    </div> -->
                                <?php
                                if ($personal['isactive'] == 0) {

                                ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark btn-lg btn-block mt-2 my-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                        View Profile
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="./visitprofile.php?userid=<?php echo $userid ?>" role="button" rel="nofollow">View Profile</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>      
                    <?php
                        }
                    }
                    elseif($gendereducationSet)
                    {
                        foreach($gendereducation as $userid)
                        {
                            $query = "select * from users where userid = '$userid'";
                            $result = mysqli_query($conn, $query);
                            $details = mysqli_fetch_assoc($result);
                            $query = "select * from pictures where userid = '$userid'";
                            $result1 = mysqli_query($conn, $query);
                            $pictures = mysqli_fetch_assoc($result1);
                            $mysock = getimagesize($pictures['profilepic']);
                            $query = "select * from profile where userid = '$myid'";
                            $result = mysqli_query($conn, $query);
                            $personal = mysqli_fetch_assoc($result);
                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-3">
                            <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                                <div class="person-img">
                                    <img src="<?php echo $pictures['profilepic']; ?>" <?php echo imageResize($mysock[0], $mysock[1], 250); ?> alt="profile-picture">
                                </div>
                                <div class="person-name my-2 text-center">
                                    <h3 class="text-white"><?php echo $details['name']; ?></h3>
                                </div>
                                <!-- <div class="info">
                                        <h6 class="text-white">Web Developer</h6>
                                    </div> -->
                                <!-- <div class="social-icons">
                                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                                    </div> -->
                                <?php
                                if ($personal['isactive'] == 0) {

                                ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark btn-lg btn-block mt-2 my-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                        View Profile
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="./visitprofile.php?userid=<?php echo $userid ?>" role="button" rel="nofollow">View Profile</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>      
                    <?php
                        }
                    }
                    elseif($gendercastSet)
                    {
                        foreach($gendercast as $userid)
                        {
                            $query = "select * from users where userid = '$userid'";
                            $result = mysqli_query($conn, $query);
                            $details = mysqli_fetch_assoc($result);
                            $query = "select * from pictures where userid = '$userid'";
                            $result1 = mysqli_query($conn, $query);
                            $pictures = mysqli_fetch_assoc($result1);
                            $mysock = getimagesize($pictures['profilepic']);
                            $query = "select * from profile where userid = '$myid'";
                            $result = mysqli_query($conn, $query);
                            $personal = mysqli_fetch_assoc($result);
                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-3">
                            <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                                <div class="person-img">
                                    <img src="<?php echo $pictures['profilepic']; ?>" <?php echo imageResize($mysock[0], $mysock[1], 250); ?> alt="profile-picture">
                                </div>
                                <div class="person-name my-2 text-center">
                                    <h3 class="text-white"><?php echo $details['name']; ?></h3>
                                </div>
                                <!-- <div class="info">
                                        <h6 class="text-white">Web Developer</h6>
                                    </div> -->
                                <!-- <div class="social-icons">
                                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                                    </div> -->
                                <?php
                                if ($personal['isactive'] == 0) {

                                ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark btn-lg btn-block mt-2 my-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                        View Profile
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="./visitprofile.php?userid=<?php echo $userid ?>" role="button" rel="nofollow">View Profile</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>      
                    <?php
                        }
                    }
                    elseif($gendercitySet)
                    {
                        foreach($gendercity as $userid)
                        {
                            $query = "select * from users where userid = '$userid'";
                            $result = mysqli_query($conn, $query);
                            $details = mysqli_fetch_assoc($result);
                            $query = "select * from pictures where userid = '$userid'";
                            $result1 = mysqli_query($conn, $query);
                            $pictures = mysqli_fetch_assoc($result1);
                            $mysock = getimagesize($pictures['profilepic']);
                            $query = "select * from profile where userid = '$myid'";
                            $result = mysqli_query($conn, $query);
                            $personal = mysqli_fetch_assoc($result);
                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-3">
                            <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                                <div class="person-img">
                                    <img src="<?php echo $pictures['profilepic']; ?>" <?php echo imageResize($mysock[0], $mysock[1], 250); ?> alt="profile-picture">
                                </div>
                                <div class="person-name my-2 text-center">
                                    <h3 class="text-white"><?php echo $details['name']; ?></h3>
                                </div>
                                <!-- <div class="info">
                                        <h6 class="text-white">Web Developer</h6>
                                    </div> -->
                                <!-- <div class="social-icons">
                                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                                    </div> -->
                                <?php
                                if ($personal['isactive'] == 0) {

                                ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark btn-lg btn-block mt-2 my-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                        View Profile
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="./visitprofile.php?userid=<?php echo $userid ?>" role="button" rel="nofollow">View Profile</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>      
                    <?php
                        }
                    }
                    elseif($educationcastSet)
                    {
                        foreach($educationcast as $userid)
                        {
                            $query = "select * from users where userid = '$userid'";
                            $result = mysqli_query($conn, $query);
                            $details = mysqli_fetch_assoc($result);
                            $query = "select * from pictures where userid = '$userid'";
                            $result1 = mysqli_query($conn, $query);
                            $pictures = mysqli_fetch_assoc($result1);
                            $mysock = getimagesize($pictures['profilepic']);
                            $query = "select * from profile where userid = '$myid'";
                            $result = mysqli_query($conn, $query);
                            $personal = mysqli_fetch_assoc($result);
                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-3">
                            <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                                <div class="person-img">
                                    <img src="<?php echo $pictures['profilepic']; ?>" <?php echo imageResize($mysock[0], $mysock[1], 250); ?> alt="profile-picture">
                                </div>
                                <div class="person-name my-2 text-center">
                                    <h3 class="text-white"><?php echo $details['name']; ?></h3>
                                </div>
                                <!-- <div class="info">
                                        <h6 class="text-white">Web Developer</h6>
                                    </div> -->
                                <!-- <div class="social-icons">
                                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                                    </div> -->
                                <?php
                                if ($personal['isactive'] == 0) {

                                ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark btn-lg btn-block mt-2 my-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                        View Profile
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="./visitprofile.php?userid=<?php echo $userid ?>" role="button" rel="nofollow">View Profile</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>      
                    <?php
                        }
                    }
                    elseif($educationcitySet)
                    {
                        foreach($educationcity as $userid)
                        {
                            $query = "select * from users where userid = '$userid'";
                            $result = mysqli_query($conn, $query);
                            $details = mysqli_fetch_assoc($result);
                            $query = "select * from pictures where userid = '$userid'";
                            $result1 = mysqli_query($conn, $query);
                            $pictures = mysqli_fetch_assoc($result1);
                            $mysock = getimagesize($pictures['profilepic']);
                            $query = "select * from profile where userid = '$myid'";
                            $result = mysqli_query($conn, $query);
                            $personal = mysqli_fetch_assoc($result);
                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-3">
                            <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                                <div class="person-img">
                                    <img src="<?php echo $pictures['profilepic']; ?>" <?php echo imageResize($mysock[0], $mysock[1], 250); ?> alt="profile-picture">
                                </div>
                                <div class="person-name my-2 text-center">
                                    <h3 class="text-white"><?php echo $details['name']; ?></h3>
                                </div>
                                <!-- <div class="info">
                                        <h6 class="text-white">Web Developer</h6>
                                    </div> -->
                                <!-- <div class="social-icons">
                                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                                    </div> -->
                                <?php
                                if ($personal['isactive'] == 0) {

                                ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark btn-lg btn-block mt-2 my-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                        View Profile
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="./visitprofile.php?userid=<?php echo $userid ?>" role="button" rel="nofollow">View Profile</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>      
                    <?php
                        }
                    }
                    elseif($castcitySet)
                    {
                        foreach($castcity as $userid)
                        {
                            $query = "select * from users where userid = '$userid'";
                            $result = mysqli_query($conn, $query);
                            $details = mysqli_fetch_assoc($result);
                            $query = "select * from pictures where userid = '$userid'";
                            $result1 = mysqli_query($conn, $query);
                            $pictures = mysqli_fetch_assoc($result1);
                            $mysock = getimagesize($pictures['profilepic']);
                            $query = "select * from profile where userid = '$myid'";
                            $result = mysqli_query($conn, $query);
                            $personal = mysqli_fetch_assoc($result);
                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-3">
                            <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                                <div class="person-img">
                                    <img src="<?php echo $pictures['profilepic']; ?>" <?php echo imageResize($mysock[0], $mysock[1], 250); ?> alt="profile-picture">
                                </div>
                                <div class="person-name my-2 text-center">
                                    <h3 class="text-white"><?php echo $details['name']; ?></h3>
                                </div>
                                <!-- <div class="info">
                                        <h6 class="text-white">Web Developer</h6>
                                    </div> -->
                                <!-- <div class="social-icons">
                                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                                    </div> -->
                                <?php
                                if ($personal['isactive'] == 0) {

                                ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark btn-lg btn-block mt-2 my-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                        View Profile
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="./visitprofile.php?userid=<?php echo $userid ?>" role="button" rel="nofollow">View Profile</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>      
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <!-- Main Navigation -->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>