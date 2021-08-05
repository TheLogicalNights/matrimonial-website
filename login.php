<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="body">
    <!--Main Navigation-->
    <header>
        <style>
            #intro {
                background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
                height: 100vh;
            }

            /* Height for devices larger than 576px */

            @media (min-width: 992px) {
                #intro {
                    margin-top: -58.59px;
                }
            }

            .navbar .nav-link {
                color: #fff !important;
            }
        </style>

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
                            <img src="./img/6.jpg" class="img-fluid" alt="" srcset="">
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-7 mx-auto text-center text-white">
                                    <h1>MEMBER LOGIN</h1>
                                    <form class="mt-5 p-5">
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example1" class="form-control" />
                                            <label class="form-label text-white" for="form2Example1">Email address</label>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example2" class="form-control" />
                                            <label class="form-label text-white" for="form2Example2">Password</label>
                                        </div>

                                        <!-- 2 column grid layout for inline styling -->
                                        <div class="row mb-4">
                                            <div class="col d-flex justify-content-center">
                                                <!-- Checkbox -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="form2Example3" checked />
                                                    <label class="form-check-label" for="form2Example3"> Remember me </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <!-- Simple link -->
                                                <a href="#!">Forgot password?</a>
                                            </div>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                                        <!-- Register buttons -->
                                        <div class="text-center">
                                            <p>Not a member? <a href="#!">Register</a></p>
                                            <p>or sign up with:</p>
                                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                                <i class="fab fa-facebook-f"></i>
                                            </button>

                                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                                <i class="fab fa-google"></i>
                                            </button>

                                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                                <i class="fab fa-twitter"></i>
                                            </button>

                                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                                <i class="fab fa-github"></i>
                                            </button>
                                        </div>
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
    <!--Main Navigation-->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>