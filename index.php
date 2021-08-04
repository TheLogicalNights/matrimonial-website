<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="./css/style.css">
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body class="body">
    <header>
        <!-- NavBar -->
        <?php
    include "./navbar.php"
    ?>
            <!-- End NavBar -->
            <!-- background image -->
            <div id="intro-example" class="p-5 text-center bg-image">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white">
                            <h1 class="mb-3">Meet Mr. & Meet Mrs.</h1>
                            <h4 class="mb-4">Love Stories Begins From Here.</h4>
                            <a class="btn btn-outline-light btn-lg m-2" href="https://www.youtube.com/watch?v=c9B4TPnak1A" role="button" rel="nofollow" target="_blank">Click To Login</a>
                            <a class="btn btn-outline-light btn-lg m-2" href="https://mdbootstrap.com/docs/standard/" target="_blank" role="button">Click To Register</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end backgrund image -->
    </header>
    <main>
        <div class="container-fluid px-0">
            <section class="divider py-5 text-center" style="background-color: #eee">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-4 text-right pr-5">
                        <h2>Why to join us</h2>
                    </div>
                    <div class="col-md-4">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti qui officiis quis ratione nesciunt, vitae et. Suscipit numquam distinctio velit!</p>
                    </div>
                </div>
            </section>
            <section id="about" class="text-center text-white">
                <h2 class="my-5">Our Promise:</h2>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-4 text-end">
                        <h2> 100% match</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore vero quod ducimus repellat totam eaque voluptates provident similique debitis dolorum.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="./img/2.jpg" alt="perfect-match" class="img-fluid">
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>