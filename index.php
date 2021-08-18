<?php
session_start();
include './imgResize.php';
$mysock1 = getimagesize("./img/pic1.jpg");
$mysock2 = getimagesize("./img/pic2.jpg");
$mysock3 = getimagesize("./img/pic3.jpg");
$mysock4 = getimagesize("./img/pic4.jpg");
$mysock5 = getimagesize("./img/pic5.jpg");
$mysock6 = getimagesize("./img/pic6.jpg");
$mysock7 = getimagesize("./img/pic7.jpg");
$mysock8 = getimagesize("./img/pic8.jpg");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Maitri Janmojanmichi | Home</title>
  <link rel="icon" href="./img/3.png" sizes="32X32" type="image/png">
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
            <a class="btn btn-outline-light btn-lg m-2" href="./joinus.php" role="button" rel="nofollow">Click To Join Us</a>
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
            <p>We believe choosing a life partner is a big and important decision, and hence work towards giving a simple and secure matchmaking experience for you and your family. Each profile registered with us goes through a manual screening process before going live on site; we provide superior privacy controls for Free; and also verify contact information of members.</p>
          </div>
        </div>
      </section>
      <section id="about" class="text-center text-white">
        <h2 class="my-5">Our Promise:</h2>
        <div class="row justify-content-center align-items-center">
          <div class="col-md-4 text-center">
            <h2> 100% match</h2>
            <p>You will find perfect match for your self for sure</p>
          </div>
          <div class="col-md-4 mb-3">
            <img src="./img/2.jpg" alt="perfect-match" class="img-fluid">
          </div>
        </div>
      </section>
      <section>
        <div class="p-5 text-center bg-image" style="background-image: url('./img/5.jpg');height: 300px;">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white">
                <a class="btn btn-outline-light btn-lg m-2" href="#pricing" role="button">View Plans</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- success stories section -->
      <section id="success container" class="text-center">
        <div class="row my-5 justify-content-center">
          <div class="col-md-12 mt-5">
            <h2 class="text-white text-center">Search For Match Here........</h2>
          </div>
          <div class="row row-cols-1 row-cols-md-4 g-4">
            <!-- card 1 -->
            <div class="col-lg-3 col-md-4 col-sm-3">
              <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                <div class="person-img">
                  <img src="./img/pic1.jpg" <?php echo imageResize($mysock1[0],$mysock1[1], 250); ?> alt="profile-picture">
                </div>
                <div class="person-name my-2">
                  <h3 class="text-white">Prakash & Swati</h3>
                </div>
                <div class="info">
                  <h6 class="text-white">16-06-2018</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3">
              <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                <div class="person-img">
                  <img src="./img/pic2.jpg" <?php echo imageResize($mysock2[0],$mysock2[1], 250); ?> alt="profile-picture">
                </div>
                <div class="person-name my-2">
                  <h3 class="text-white">Govind & Mitali</h3>
                </div>
                <div class="info">
                  <h6 class="text-white">18-05-2018</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3">
              <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                <div class="person-img">
                  <img src="./img/pic3.jpg" <?php echo imageResize($mysock3[0],$mysock3[1], 250); ?> alt="profile-picture">
                </div>
                <div class="person-name my-2">
                  <h3 class="text-white">Anand & Gauri</h3>
                </div>
                <div class="info">
                  <h6 class="text-white">18-03-2019</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3">
              <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                <div class="person-img">
                  <img src="./img/pic4.jpg" <?php echo imageResize($mysock4[0],$mysock4[1], 250); ?> alt="profile-picture">
                </div>
                <div class="person-name my-2">
                  <h3 class="text-white">Ranjeet & Mansi</h3>
                </div>
                <div class="info">
                  <h6 class="text-white">21-04-2020</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3">
              <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                <div class="person-img">
                  <img src="./img/pic5.jpg" <?php echo imageResize($mysock5[0],$mysock5[1], 250); ?> alt="profile-picture">
                </div>
                <div class="person-name my-2">
                  <h3 class="text-white">Bhushan & Manisha</h3>
                </div>
                <div class="info">
                  <h6 class="text-white">25-07-2020</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3">
              <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                <div class="person-img">
                  <img src="./img/pic6.jpg" <?php echo imageResize($mysock6[0],$mysock6[1], 250); ?> alt="profile-picture">
                </div>
                <div class="person-name my-2">
                  <h3 class="text-white">Manoj & Kirti</h3>
                </div>
                <div class="info">
                  <h6 class="text-white">14-04-2021</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3">
              <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                <div class="person-img">
                  <img src="./img/pic7.jpg" <?php echo imageResize($mysock7[0],$mysock7[1], 250); ?> alt="profile-picture">
                </div>
                <div class="person-name my-2">
                  <h3 class="text-white">Divesh & Mrunal</h3>
                </div>
                <div class="info">
                  <h6 class="text-white">23-05-2021</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3">
              <div class="shadow d-flex justify-content-center align-items-center p-3 bg-dark rounded-lg flex-column">
                <div class="person-img">
                  <img src="./img/pic8.jpg" <?php echo imageResize($mysock8[0],$mysock8[1], 250); ?> alt="profile-picture">
                </div>
                <div class="person-name my-2">
                  <h3 class="text-white">Naresh & Khushbu</h3>
                </div>
                <div class="info">
                  <h6 class="text-white">17-02-2021</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end our success  -->
      <section id="pricing" class="text-center">
        <h2 class="text-white my-5">Our Plans</h2>
        <div class="row justify-content-center p-3">
          <div class="col-md-2 m-2">
            <div class="card">
              <div class="card-header bg-white py-3">
                <p class="text-uppercase small mb-2"><strong>Beginers</strong></p>
                <h5 class="mb-0">Rs.4000/month</h5>
              </div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">8 months validity</li>
                  <li class="list-group-item">Unlimited profile search</li>
                  <li class="list-group-item">Unlimited profile visits</li>
                </ul>
              </div>
              <div class="card-footer bg-white py-3">
                <button type="button" class="btn btn-success btn-sm">Get it</button>
              </div>
            </div>
          </div>
          <div class="col-md-2 m-2">
            <div class="card border border-primary">
              <div class="card-header bg-white py-3">
                <p class="text-uppercase small mb-2"><strong>Essential</strong></p>
                <h5 class="mb-0">Rs.5000/month</h5>
              </div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">8 months validity</li>
                  <li class="list-group-item">Unlimited profile search</li>
                  <li class="list-group-item">Unlimited profile visits</li>
                  <li class="list-group-item">Unlimited matches</li>
                </ul>
              </div>
              <div class="card-footer bg-white py-3">
                <button type="button" class="btn btn-primary btn-sm">Buy now</button>
              </div>
            </div>
          </div>
          <div class="col-md-2 m-2">
            <div class="card">
              <div class="card-header bg-white py-3">
                <p class="text-uppercase small mb-2"><strong>Advanced</strong></p>
                <h5 class="mb-0">Rs.6000/month</h5>
              </div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">12 months validity</li>
                  <li class="list-group-item">Unlimited profile search</li>
                  <li class="list-group-item">Unlimited profile visits</li>
                  <li class="list-group-item">Unlimited matches</li>
                  <li class="list-group-item">Access of verified phone numbers</li>
                </ul>
              </div>
              <div class="card-footer bg-white py-3">
                <button type="button" class="btn btn-info btn-sm">Buy now</button>
              </div>
            </div>
          </div>
          <div class="col-md-2 m-2">
            <div class="card">
              <div class="card-header bg-white py-3">
                <p class="text-uppercase small mb-2"><strong>Enterprise</strong></p>
                <h5 class="mb-0">Rs.10000/month</h5>
              </div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">12 months validity</li>
                  <li class="list-group-item">Unlimited profile search</li>
                  <li class="list-group-item">Unlimited profile visits</li>
                  <li class="list-group-item">Unlimited matches</li>
                  <li class="list-group-item">Access of verified phone numbers</li>
                  <li class="list-group-item">New feature comming soon</li>
                </ul>
              </div>
              <div class="card-footer bg-white py-3">
                <button type="button" class="btn btn-info btn-sm">Buy now</button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end of pricing  -->
    </div>
  </main>
  <footer>
    <?php
    include './footer.php';
    ?>
  </footer>
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>