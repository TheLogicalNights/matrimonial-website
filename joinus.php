<?php
    include './model/config/config.php';
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
            if(isset($_SESSION['registeredSuccessfully']))
            {
                echo '
                <script>
                    swal("Success..!", "'.$_SESSION['registeredSuccessfully'].'", "success");
                </script>
                ';
                unset($_SESSION['registeredSuccessfully']);
            }
            if(isset($_SESSION['registerationFailed']))
            {
                echo '
                <script>
                    swal("Oops..!", "'.$_SESSION['registerationFailed'].'", "error");
                </script>
                ';
                unset($_SESSION['registerationFailed']);
            }
            if(isset($_SESSION['emailAlreadyUsed']))
            {
                echo '
                <script>
                    swal("Oops..!", "'.$_SESSION['emailAlreadyUsed'].'", "error");
                </script>
                ';
                unset($_SESSION['emailAlreadyUsed']);
            }
        ?>
            <section class="login">
                <div class="container py-3">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="./img/7.jpg" class="img-fluid" alt="" srcset="">
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-7 mx-auto text-center text-white">
                                    <h1 class="mt-5 mb-3">JOIN US.</h1>
                                    <!-- Pills navs -->
                                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                                        </li>
                                    </ul>
                                    <!-- Pills navs -->

                                    <!-- Pills content -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                                            <form action="./controller/users/login.controller.php" method="POST" class="mt-5">
                                                <!-- Email input -->
                                                <div class="form-outline mb-4">
                                                    <input type="email" id="loginName" name="email" class="form-control" />
                                                    <label class="form-label text-white" for="loginName">Email or username</label>
                                                </div>

                                                <!-- Password input -->
                                                <div class="form-outline mb-4">
                                                    <input type="password" id="loginPassword" name="password" class="form-control" />
                                                    <label class="form-label text-white" for="loginPassword">Password</label>
                                                </div>

                                                <!-- 2 column grid layout -->
                                                <div class="row mb-4">
                                                    <div class="col-md-6 d-flex justify-content-center">
                                                        <!-- Checkbox -->
                                                        <div class="form-check mb-3 mb-md-0">
                                                            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                                            <label class="form-check-label" for="loginCheck"> Remember me </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 d-flex justify-content-center">
                                                        <!-- Simple link -->
                                                        <a href="#!">Forgot password?</a>
                                                    </div>
                                                </div>

                                                <!-- Submit button -->
                                                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                                            <form action="./controller/users/createUser.controller.php" method="POST" class="mt-5">
                                                <!-- Name input -->
                                                <div class="form-outline mb-4">
                                                    <input type="text" id="registerName" name="name" class="form-control" />
                                                    <label class="form-label text-white" for="registerName">Name</label>
                                                </div>

                                                <!-- Username input -->
                                                <div class="form-outline mb-4">
                                                    <input type="text" id="registerUsername" name="username" class="form-control" />
                                                    <label class="form-label text-white" for="registerUsername">Username</label>
                                                </div>

                                                <!-- Email input -->
                                                <div class="form-outline mb-4">
                                                    <input type="email" id="registerEmail" name="email" class="form-control" />
                                                    <label class="form-label text-white" for="registerEmail">Email</label>
                                                </div>

                                                <!-- Password input -->
                                                <div class="form-outline mb-4">
                                                    <input type="password" id="registerPassword" class="form-control" />
                                                    <label class="form-label text-white" for="registerPassword">Password</label>
                                                </div>

                                                <!-- Repeat Password input -->
                                                <div class="form-outline mb-4">
                                                    <input type="password" id="registerRepeatPassword" name="password" class="form-control" />
                                                    <label class="form-label text-white" for="registerRepeatPassword">Repeat password</label>
                                                </div>

                                                <!-- Checkbox -->
                                                <div class="form-check d-flex justify-content-center mb-4">
                                                    <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked aria-describedby="registerCheckHelpText" />
                                                    <label class="form-check-label text-white" for="registerCheck">
                                                        I have read and agree to the terms
                                                    </label>
                                                </div>

                                                <!-- Submit button -->
                                                <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Pills content -->
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