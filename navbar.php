<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2 img-fulid" href="./index.php">
      <img src="./img/3.png" alt="logo" height="50" alt="" loading="lazy" style="margin-top: -1px;" />
      <h6 class="mt-2">MAITRI JANMOJANMICHI</h6>
    </a>
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
          if(isset($_SESSION['userid']))
          {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="./main.php">Find Match</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./profile.php">Profile</a>
          </li>
        <?php
          }
        ?>
      </ul>
      <!-- Left links -->
      <?php
      if (isset($_SESSION['userid'])) {
      ?>
        <div class="d-flex align-items-center">
          <form action="./code.php" method="POST">
            <button type="submit" name="logout" class="btn btn-outline-danger btn-sm m-2">Logout</button>
          </form>
        </div>
      <?php
      } else {
      ?>
        <div class="d-flex align-items-center">
          <a class="btn btn-outline-light btn-sm m-2" href="./joinus.php" role="button" rel="nofollow">Join Us</a>
        </div>
      <?php
      }
      ?>

    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->