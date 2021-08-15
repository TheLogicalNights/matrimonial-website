<?php
    session_start();
    if(!isset($_SESSION['userid']))
    {
        header("Location: joinus.php" );
    }
    include './database.model.php';
    function imageResize($width, $height, $target) 
    {

        //takes the larger size of the width and height and applies the
        //formula accordingly...this is so this script will work
        //dynamically with any size image
        
        if ($width > $height) {
        $percentage = ($target / $width);
        } else {
        $percentage = ($target / $height);
        }
        
        //gets the new value and applies the percentage, then rounds the value
        $width = round($width * $percentage);
        $height = round($height * $percentage);
        
        //returns the new sizes in html image tag format...this is so you
        // can plug this function inside an image tag and just get the
        
        return "width=".$width." height=".$height."";
        
    }
    $query = "select * from profile";
    $result = mysqli_query($conn, $query);
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
    <main  class="body">
        <section class="container">
            <div class="row my-5">
                <div class="col-md-12 mt-5">
                    <h2 class="text-white text-center">Search For Match Here........</h2>
                </div>
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
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $userid = $row['userid'];
                            $query = "select * from users where userid = '$userid'";
                            $result = mysqli_query($conn, $query);
                            $details = mysqli_fetch_assoc($result);
                            $query = "select * from pictures where userid = '$userid'";
                            $result1 = mysqli_query($conn, $query);
                            $pictures = mysqli_fetch_assoc($result1);
                            $mysock = getimagesize($pictures['profilepic']);
                            $mysock1 = getimagesize($pictures['pic1']);
                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-3">
                                <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                                    <div class="person-img">
                                        <img src="<?php echo $pictures['profilepic']; ?>" 
                                        <?php echo imageResize($mysock[0],$mysock[1], 250); ?> alt="profile-picture">
                                    </div>
                                    <div class="person-name my-2 text-center">
                                        <h3 class="text-white"><?php echo $details['name']; ?></h3>
                                    </div>
                                    <!-- <div class="info">
                                        <h6 class="text-white">Web Developer</h6>
                                    </div> -->
                                    <div class="social-icons">
                                        <a href="#" class="text-white"><i class="fab fa-facebook p-2 fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram p-2 fa-lg"></i></a>
                                    </div>
                                    <a class="btn btn-dark btn-lg btn-block mt-2 my-2" href="#" role="button" rel="nofollow">View Profile</a>
                                </div>
                            </div>
                    <?php
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