<?php
session_start();
$userid = $_SESSION['userid'];
if (!isset($_SESSION['userid'])) {
    header("Location: joinus.php");
}
include './database.model.php';
include './imgResize.php';
$query = "select * from users where userid = '$userid'";
$result = mysqli_query($conn, $query);
$userdetails = mysqli_fetch_assoc($result);
$query = "select * from personal_info where userid = '$userid'";
$result = mysqli_query($conn, $query);
$personal = mysqli_fetch_assoc($result);
$query = "select * from address_info where userid = '$userid'";
$result = mysqli_query($conn, $query);
$address = mysqli_fetch_assoc($result);
$query = "select * from proffessional_info where userid = '$userid'";
$result = mysqli_query($conn, $query);
$proffessionalinfo = mysqli_fetch_assoc($result);
$query = "select * from pictures where userid = '$userid'";
$result = mysqli_query($conn, $query);
$pictures = mysqli_fetch_assoc($result);
$mysock = getimagesize($pictures['profilepic']);
$mysock1 = getimagesize($pictures['pic1']);
$mysock2 = getimagesize($pictures['pic2']);
$mysock3 = getimagesize($pictures['pic3']);
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
    <link rel="stylesheet" href="css/profile-style.css" />
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Navbar -->
        <?php
        include './navbar.php';
        ?>
        <section id="about" class="text-center text-white mt-5  bg-dark p-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4">
                    <img src="<?php echo $pictures['profilepic'] ?>" alt="perfect-match" <?php echo imageResize($mysock[0], $mysock[1], 350); ?> class="rounded-circle">
                </div>
                <div class="col-md-4 text-center">
                    <h2><?php echo $userdetails['name']; ?></h2>
                    <p><?php echo $personal['phone_no']; ?></p>
                    <div class="social-icons">
                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <main>
        <section class="mt-3 mb-3">
            <div class="row bg-dark text-center text-light">
                <div class="col-md-4">
                    <h4 class="mt-5">Personal Details</h4>
                    <h6 class="mt-3">Name</h6>
                    <h6 class="mb-2"><?php echo $userdetails['name']; ?></h6>
                    <h6 class="mt-3">Date of birth</h6>
                    <h6 class="mb-2"><?php echo $personal['dob']; ?></h6>
                    <h6 class="mt-3">Email Address</h6>
                    <h6 class="mb-2"><?php echo $personal['email']; ?></h6>
                    <h6 class="mt-3">Phone Number</h6>
                    <h6 class="mb-2"><?php echo $personal['phone_no']; ?></h6>
                    <h6 class="mt-3">Gender</h6>
                    <h6 class="mb-2"><?php echo $personal['gender']; ?></h6>
                    <h6 class="mt-3">Blood Group</h6>
                    <h6 class="mb-2"><?php echo $personal['blood_group']; ?></h6>
                    <h6 class="mt-3">Religion</h6>
                    <h6 class="mb-2"><?php echo $personal['religion']; ?></h6>
                    <h6 class="mt-3">Cast</h6>
                    <h6 class="mb-2"><?php echo $personal['cast']; ?></h6>
                    <h6 class="mt-3">Category</h6>
                    <h6 class="mb-2"><?php echo $personal['category']; ?></h6>
                    <h6 class="mt-3">Other Information</h6>
                    <h6 class="mb-2"><?php echo $personal['other_info']; ?></h6>
                </div>
                <div class="col-md-4">
                    <h4 class="mt-5">Address Details</h4>
                    <h6 class="mt-3">Address</h6>
                    <h6 class="mb-2"><?php echo $address['address1'] . " " . $address['address2'] . " " . $address['address3']; ?></h6>
                    <h6 class="mb-2"><?php echo $address['city'] . " - " . $address['zip'] ?></h6>
                    <h6 class="mt-3">Country</h6>
                    <h6 class="mb-2"><?php echo $address['country'] ?></h6>
                    <h6 class="mt-3">State</h6>
                    <h6 class="mb-2"><?php echo $address['state'] ?></h6>

                    <h4 class="mt-5">Proffessional Details</h4>
                    <h6 class="mt-3">Highest Qualification</h6>
                    <h6 class="mb-2"><?php echo $proffessionalinfo['highest_qualification'] ?></h6>
                    <h6 class="mt-3">Occupation</h6>
                    <h6 class="mb-2"><?php echo $proffessionalinfo['type'] ?></h6>
                    <h6 class="mt-3">Company Name</h6>
                    <h6 class="mb-2"><?php echo $proffessionalinfo['company_name'] ?></h6>
                    <h6 class="mt-3">Designation</h6>
                    <h6 class="mb-2"><?php echo $proffessionalinfo['designation'] ?></h6>
                </div>
                <div class="col-md-4">
                    <h4 class="mt-5">Some Pictures</h4>
                    <div class="mt-3 mb-3 container-fluid">
                        <img src="<?php echo $pictures['pic1'] ?>" alt="perfect-match" <?php echo imageResize($mysock1[0], $mysock[1], 200); ?>>
                    </div>
                    <div class="mt-3 mb-3 container-fluid">
                        <img src="<?php echo $pictures['pic2'] ?>" alt="perfect-match" <?php echo imageResize($mysock2[0], $mysock[1], 200); ?>>
                    </div>
                    <div class="mt-3 mb-3 container-fluid">
                        <img src="<?php echo $pictures['pic3'] ?>" alt="perfect-match" <?php echo imageResize($mysock3[0], $mysock[1], 200); ?>>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <?php
        include './footer.php';
        ?>
    </footer>
</body>
<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/script.js"></script>
</body>

</html>