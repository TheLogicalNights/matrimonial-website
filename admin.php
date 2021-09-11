<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
}
include './database.model.php';
$query1 = "SELECT userid FROM profile";
$all_profiles = mysqli_query($conn, $query1);

$query2 = "SELECT userid FROM profile where isactive='1'";
$active_profiles = mysqli_query($conn, $query2);

$query3 = "SELECT userid FROM profile where isactive='0'";
$deactive_profiles = mysqli_query($conn, $query3);
$allusercounter = 0;
$activeusercounter = 0;
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
                                <!-- <li>
                                    <a href="#" class="nav-link nav-link px-3 sidebar-link" onclick="displayAddUsers()">
                                        <span class="me-2"><i class="fas fa-user-plus"></i></span>
                                        <span>Add New User</span>
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">Account</div>
                    </li>
                    <!-- <li>
                        <a href="#" class="nav-link px-3" onclick="displayChangePassword()"><span class="me-2"><i class="fas fa-key"></i></span><span>Change Password</span></a>
                    </li> -->
                    <li>
                        <a href="./code.php?signout=1" class="nav-link px-3"><span class="me-2"><i class="fas fa-sign-out-alt"></i></span><span>Signout</span></a>
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
                        <div class="card-header">
                            <h3>Total Users</h3>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo mysqli_num_rows($all_profiles); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-success h-100">
                        <div class="card-header">
                            <h3>Active Users</h3>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo mysqli_num_rows($active_profiles); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-header">
                            <h3>Deactive Users</h3>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo mysqli_num_rows($deactive_profiles); ?></h5>
                        </div>
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
            <table class='table mt-5' id="myTable2">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th scope='col'>Name</th>
                        <th scope='col'>Phone No.</th>
                    </tr>
                </thead>
                <?php
                while ($allusers = mysqli_fetch_assoc($all_profiles)) {
                    $userid = $allusers['userid'];
                    $allusercounter++;
                    $query4 = "SELECT first_name,last_name,phone_no from personal_info where userid = '$userid'";
                    $personal_info = mysqli_query($conn, $query4);
                    while ($personal = mysqli_fetch_assoc($personal_info)) {
                ?>

                        <tr>
                            <td><?php echo $allusercounter; ?></td>
                            <td><?php echo $personal['first_name'] . " " . $personal['last_name']; ?></td>
                            <td><?php echo $personal['phone_no']; ?></td>
                        </tr>

                <?php
                    }
                }
                ?>
            </table>
        </div>
    </main>
    <!-- All users -->
    <!-- Acivated Users -->
    <main class="mt-5 pt-3" id="activeusers" style="display: none;">
        <div class="container-fluid">
            <table class='table mt-2' id="myTable2">
                <thead>
                    <tr>
                        <th scope='col'>Sr.No</th>
                        <th scope='col'>Name</th>
                        <th scope='col'>  Action</th>
                    </tr>
                    <?php
                    while ($activeusers = mysqli_fetch_assoc($active_profiles)) {
                        $userid = $activeusers['userid'];
                        $query5 = "SELECT first_name,last_name from personal_info where userid = '$userid'";
                        $Active_users_info = mysqli_query($conn, $query5);
                        $activeusercounter++;
                        while ($personal = mysqli_fetch_assoc($Active_users_info)) {
                    ?>

                            <tr>
                                <td><?php echo $activeusercounter; ?></td>
                                <td><?php echo $personal['first_name'] . " " . $personal['last_name']; ?></td>
                                <td>
                                    <form action='#' method='POST'>
                                        <!-- <input type='hidden' name='username' id='visit' value=<?php echo $row['uname']; ?>> -->
                                        <button type='submit' name='deactivate' class='btn btn-sm btn-outline-danger'>Deactivate</button>
                                    </form>
                                </td>
                            </tr>

                    <?php
                        }
                    }
                    ?>
            </table>
            </thead>
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
    <!-- <main class="mt-5 pt-3" id="addusers" style="display: none;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fw-bold fs-3">
                    Add Users
                </div>
            </div>
        </div>
    </main> -->
    <!-- Add new User -->
    <!-- change password -->
    <!-- <main class="mt-5 pt-3" id="changepassword" style="display: none;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fw-bold fs-3">
                    Change Password
                </div>
            </div>
        </div>
    </main> -->
    <!-- change password -->
    <!-- main section -->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- bootstrap 5 bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/change-main.js"></script>

    <script src="cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function() {
            $('#myTable2').DataTable({
                responsive: true
            });
        });
    </script>
</body>


</html>