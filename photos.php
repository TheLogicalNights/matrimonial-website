<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: joinus.php");
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
    <link rel="stylesheet" href="css/style.css" />
    <!-- sweet alert  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="body">
    <!--Main Navigation-->
    <header>
        <!-- Navbar -->
        <?php
        include './navbar.php';
        ?>
        <!-- Navbar -->
        <main>
        <?php
            if(isset($_SESSION['imgformatfailure']))
            {
                echo '
                <script>
                    swal("Oops..!", "'.$_SESSION['imgformatfailure'].'", "error");
                </script>
                ';
                unset($_SESSION['imgformatfailure']);
            }
            if(isset($_SESSION['profilepictureuploadfailure']))
            {
                echo '
                <script>
                    swal("Oops..!", "'.$_SESSION['profilepictureuploadfailure'].'", "error");
                </script>
                ';
                unset($_SESSION['profilepictureuploadfailure']);
            }
            if(isset($_SESSION['profilepictureuploadfailure']))
            {
                echo '
                <script>
                    swal("Oops..!", "'.$_SESSION['profilepictureuploadfailure'].'", "error");
                </script>
                ';
                unset($_SESSION['profilepictureuploadfailure']);
            }
        ?>
            <section class="login">
                <div class="container py-3">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="./img/10.jpg" class="img-fluid" alt="" srcset="">
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-7 mx-auto text-white">
                                    <h1 class="mt-3 mb-4 text-center">INSERT PICTURES</h1>
                                    <!-- form -->
                                    <form action="./code.php" method="POST" enctype="multipart/form-data">
                                        <label class="form-label text-white" for="form6Example3">Upload Profile picture</label>
                                        <div class="form-outline mb-4">
                                            <input type="file" id="form6Example3" name="profilepic" class="form-control" required />
                                        </div>
                                        <label class="form-label text-white" for="form6Example3">Upload Picture 1</label>
                                        <div class="form-outline mb-4">
                                            <input type="file" id="form6Example3" name="pic1" class="form-control" required />
                                        </div>
                                        <label class="form-label text-white" for="form6Example3">Upload Picture 2</label>
                                        <div class="form-outline mb-4">
                                            <input type="file" id="form6Example3" name="pic2" class="form-control" required />
                                        </div>
                                        <label class="form-label text-white" for="form6Example3">Upload Picture 3</label>
                                        <div class="form-outline mb-4">
                                            <input type="file" id="form6Example3" name="pic3" class="form-control" required />
                                        </div>
                                        <!-- Submit button -->
                                        <button type="submit" name="uploadpics" class="btn btn-primary btn-block mb-4">Finish</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Background image -->
    </header>
    <footer>
        <?php
        include './footer.php';
        ?>
    </footer>
    <!--Main Navigation-->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>