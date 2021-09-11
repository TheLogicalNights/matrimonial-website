<?php
    session_start();
    if(!isset($_SESSION['userid']))
    {
        header("Location: joinus.php" );
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
            if(isset($_SESSION['alreadyentereddetails']))
            {
                echo '
                <script>
                    swal("Oops..!", "'.$_SESSION['alreadyentereddetails'].'", "error");
                </script>
                ';
                unset($_SESSION['alreadyentereddetails']);
            }

        ?>
            <section class="login">
                <div class="container py-3">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="./img/10.jpg" class="img-fluid mt-1" alt="" srcset="">
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-7 mx-auto text-white">
                                    <h1 class="mt-3 mb-4 text-center">ABOUT PEROFESSION</h1>
                                    <!-- form -->
                                    <label class="form-label text-white mb-4 text-left">What Do You Do ?</label>
                                    <!-- Radio buttons -->
                                    <div class="form-outline mb-4">
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="job" value="option1" onClick="check()" required />
                                            <label class="form-check-label" for="inlineRadio1">Job</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="buisness" onClick="check()" value="option2" required />
                                            <label class="form-check-label" for="inlineRadio2">Buisness</label>
                                        </div>
                                    </div>
                                    <form  action="./code.php" style="display: none;" method="POST" id="businessForm">
                                        <input type="hidden" name="type" value="buisness">
                                            <!-- Text input -->
                                            <div class="form-outline mb-4">
                                                <input type="text" id="form6Example3" name="qualification" class="form-control" required />
                                                <label class="form-label text-white" for="form6Example3">Highest Qualification(Education)</label>
                                            </div>
                                            <!-- Text input -->
                                            <div class="form-outline mb-4">
                                                <input type="text" id="form6Example4" name="companyname" class="form-control" required />
                                                <label class="form-label text-white" for="form6Example4">Name of company</label>
                                            </div>

                                            <!-- Submit button -->
                                            <button type="submit" name="proffressionalinfo" class="btn btn-primary btn-block mb-4">Submit</button>
                                    </form>
                                    <form action="./code.php" style="display: none;" id="jobForm" method="POST">
                                        <input type="hidden" name="type" value="job">
                                        <!-- Text input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form6Example3" name="qualification" class="form-control" required />
                                            <label class="form-label text-white" for="form6Example3">Highest Qualification(Education)</label>
                                        </div>
                                        <!-- Text input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form6Example4" name="companyname" class="form-control" required />
                                            <label class="form-label text-white" for="form6Example4">Name of company</label>
                                        </div>

                                        <!-- Text input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form6Example4" name="designtion" class="form-control" required />
                                            <label class="form-label text-white" for="form6Example4">Designation</label>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" name="proffressionalinfo" class="btn btn-primary btn-block mb-4">Submit</button>
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
    <!-- <script type="text/javascript" src="js/script.js"></script> -->
    <script>
        function check() {
            if (document.getElementById('job').checked) {
                document.getElementById('jobForm').style.display = "block";
                document.getElementById('businessForm').style.display = "none";
            } else if (document.getElementById('buisness').checked) {
                document.getElementById('jobForm').style.display = "none";
                document.getElementById('businessForm').style.display = "block";
            }
        }
    </script>
</body>

</html>