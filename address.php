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
                                <div class="col-lg-7 mx-auto text-white">
                                    <h1 class="mt-3 mb-4 text-center">ADDRESS DETAILS</h1>
                                    <!-- form -->
                                    <form>
                                        <label class="form-label text-white mb-4 text-left">Current Address</label>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="cAddress1" class="form-control" required />
                                            <label class="form-label text-white" for="cAddress1">Address line 1</label>
                                        </div>

                                        <!-- Text input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="cAddress2" class="form-control" required />
                                            <label class="form-label text-white" for="cAddress2">Address line 2</label>
                                        </div>

                                        <!-- Text input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="cAddress3" class="form-control" required />
                                            <label class="form-label text-white" for="cAddress3">Address line 3</label>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="cCountry" class="form-control" required />
                                                    <label class="form-label text-white" for="cCountry">Country</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="cState" class="form-control" required />
                                                    <label class="form-label text-white" for="cState">State</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="cCity" class="form-control" required />
                                                    <label class="form-label text-white" for="cCity">City</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="cZip" class="form-control" required />
                                                    <label class="form-label text-white" for="cZip">Zip <Code></Code></label>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="form-label text-white mb-4 text-left">Permanant Address</label>
                                        <div class="form-outline mb-4">
                                            <input class="form-check-input ms-1" type="checkbox" value="" id="flexCheckDefault" onclick="checkAddress()" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Same as current address
                                            </label>
                                        </div>
                                        <div id="permanantaddress">
                                            <div class="form-outline mb-4">
                                                <input type="text" id="pAddress1" class="form-control" required />
                                                <label class="form-label text-white" for="pAddress1">Address line 1</label>
                                            </div>

                                            <!-- Text input -->
                                            <div class="form-outline mb-4">
                                                <input type="text" id="pAddress2" class="form-control" required />
                                                <label class="form-label text-white" for="pAddress2">Address line 2</label>
                                            </div>

                                            <!-- Text input -->
                                            <div class="form-outline mb-4">
                                                <input type="text" id="pAddress3" class="form-control" required />
                                                <label class="form-label text-white" for="pAddress3">Address line 3</label>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="pCountry" class="form-control" required />
                                                        <label class="form-label text-white" for="pCountry">Country</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="pState" class="form-control" required />
                                                        <label class="form-label text-white" for="pState">State</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="pCity" class="form-control" required />
                                                        <label class="form-label text-white" for="pCity">City</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="pZip" class="form-control" required />
                                                        <label class="form-label text-white" for="pZip">Zip <Code></Code></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block mb-4">Next</button>
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
    <script type="text/javascript" src="js/hideaddressform.js"></script>
</body>

</html>