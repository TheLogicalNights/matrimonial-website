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
            <section class="login">
                <div class="container py-3">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="./img/10.jpg" class="img-fluid" alt="" srcset="">
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-7 mx-auto text-center text-white">
                                    <h1 class="mt-3 mb-4">PERSONAL INFORMATION</h1>
                                    <!-- form -->
                                    <form action="./code.php" method="POST">
                                        <!-- 2 column grid layout with text inputs for the first and last names -->
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="form6Example1" name="firstname" class="form-control" required/>
                                                    <label class="form-label text-white" for="form6Example1">First name</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="form6Example2" name="lastname" class="form-control" required/>
                                                    <label class="form-label text-white" for="form6Example2">Last name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form6Example3" name="fathersname" class="form-control" required/>
                                            <label class="form-label text-white" for="form6Example3">Father's name</label>
                                        </div>

                                        <!-- Text input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form6Example4" name="dob" class="form-control" required/>
                                            <label class="form-label text-white" for="form6Example4">Date of birth</label>
                                        </div>

                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input type="email" id="form6Example5" name="email" class="form-control" required/>
                                            <label class="form-label text-white" for="form6Example5">Email</label>
                                        </div>

                                        <!-- Number input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form6Example6" name="phoneno" class="form-control" limit=10 required/>
                                            <label class="form-label text-white" for="form6Example6">Phone</label>
                                        </div>

                                        <!-- Radio buttons -->
                                        <div class="form-outline mb-4">
                                            <div class="form-check form-check-inline ">
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" required/>
                                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" required/>
                                                <label class="form-check-label" for="inlineRadio2">Female</label>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="form6Example1" name="bloodgroup" class="form-control" required/>
                                                    <label class="form-label text-white" for="form6Example1">Blood group</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="form6Example2" name="religion" class="form-control" required/>
                                                    <label class="form-label text-white" for="form6Example2">Religion</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="form6Example1" name="cast" class="form-control" required/>
                                                    <label class="form-label text-white" for="form6Example1">Cast</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="form6Example2" name="category" class="form-control" required/>
                                                    <label class="form-label text-white" for="form6Example2">Category</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Message input -->
                                        <div class="form-outline mb-4">
                                            <textarea class="form-control" name="otherinfo" id="form6Example7" rows="4"></textarea>
                                            <label class="form-label text-white" for="form6Example7">Additional information</label>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" name="personalinfo" class="btn btn-primary btn-block mb-4">Next</button>
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