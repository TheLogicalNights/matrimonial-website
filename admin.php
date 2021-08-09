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
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/admin-style.css" />
</head>

<body>
    <!--Main Navigation-->
    <header>
        <?php
            include "./adminnavbar.php";
        ?>
    </header>
    <!-- Main Navigation -->
    <!-- offcanvace -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-0 mt-4">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">CORE</div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3 active" onclick="displayDashBoard()"><span class="me-2"><i class="fas fa-chart-line"></i></span><span>Dashboard</span></a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">Actions</div>
                    </li>
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-mdb-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="me-2"><i class="fas fa-tools"></i></span><span>Manage Users</span><span class="right-icon ms-auto"><i class="fas fa-chevron-down"></i></span>
                        </a>
                        <!-- Collapsed content -->
                        <div class="collapse mt-3" id="collapseExample">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="#allusers" class="nav-link px-3 sidebar-link " onclick="displayAllUsers()">
                                        <span class="me-2"><i class="fas fa-users"></i></span>
                                        <span>All Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link nav-link px-3 sidebar-link" onclick="displayActiveUsers()">
                                        <span class="me-2"><i class="fas fa-check"></i></span>
                                        <span>Activated Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link nav-link px-3 sidebar-link" onclick="displayDeactivatedUsers()">
                                        <span class="me-2"><i class="fas fa-ban"></i></span>
                                        <span>Deactivated Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link nav-link px-3 sidebar-link" onclick="displayAddUsers()">
                                        <span class="me-2"><i class="fas fa-user-plus"></i></span>
                                        <span>Add New User</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">Account</div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3" onclick="displayChangePassword()"><span class="me-2"><i class="fas fa-key"></i></span><span>Change Password</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3"><span class="me-2"><i class="fas fa-sign-out-alt"></i></span><span>Signout</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- offcanvace -->
    <!-- main section -->
    <!-- Dashboard -->
    <main class="mt-5 pt-3" id="dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fw-bold fs-3">
                    Dashboard
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-primary h-100">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                            <h5 class="card-title">Primary card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the
                                card's content.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-success h-100">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                            <h5 class="card-title">Primary card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the
                                card's content.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                            <h5 class="card-title">Primary card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the
                                card's content.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Dashboard -->
    <!-- All users -->
    <main class="mt-5 pt-3" id="allusers" style="display: none;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fw-bold fs-3">
                    All Users
                </div>
            </div>
        </div>
    </main>
    <!-- All users -->
    <!-- Acivated Users -->
    <main class="mt-5 pt-3" id="activeusers" style="display: none;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fw-bold fs-3">
                    Active Users
                </div>
            </div>
        </div>
    </main>
    <!-- Acivated Users -->
    <!-- Deactivated Users -->
    <main class="mt-5 pt-3" id="deavtivatedusers" style="display: none;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fw-bold fs-3">
                    Deactivated Users
                </div>
            </div>
        </div>
    </main>
    <!-- Deactivated Users -->
    <!-- Add new User -->
    <main class="mt-5 pt-3" id="addusers" style="display: none;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fw-bold fs-3">
                    Add Users
                </div>
            </div>
        </div>
    </main>
    <!-- Add new User -->
    <!-- change password -->
    <main class="mt-5 pt-3" id="changepassword" style="display: none;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fw-bold fs-3">
                    Change Password
                </div>
            </div>
        </div>
    </main>
    <!-- change password -->
    <!-- main section -->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- bootstrap 5 bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/change-main.js"></script>
</body>

</html>