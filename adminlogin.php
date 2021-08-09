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
    <link rel="stylesheet" href="css/admin-style.css" />
</head>

<body class="body">
    <!--Main Navigation-->
    <header>
        <!-- Navbar -->
        <?php
        include './adminnavbar.php';
        ?>
        <!-- Navbar -->
        <main>
            <section class="login mt-5">
                <div class="container py-3">
                    <div class="row">
                        <div class="col-md-4 mt-5">
                            <img src="./img/10.jpg" class="img-fluid" alt="" srcset="">
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-7 mx-auto text-center mt-5">
                                    <h1 class="mt-5 mb-3 text-dark">SIGN UP</h1>
                                    <form class="mt-5">
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form1Example1" class="form-control" />
                                            <label class="form-label" for="form1Example1">Username</label>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="form1Example2" class="form-control" />
                                            <label class="form-label" for="form1Example2">Password</label>
                                        </div>

                                        <!-- 2 column grid layout for inline styling -->
                                        <div class="row mb-4">
                                            <div class="col d-flex justify-content-start">
                                                <!-- Checkbox -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
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