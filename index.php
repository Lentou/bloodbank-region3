<?php
include "assets/dist/php/user.session.php";

?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="lentou">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Blood Bank</title>

    <link rel="icon" type="image/x-icon" href="assets/brand/icon.ico">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="assets/dist/css/dashboard.css">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-danger flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Blood Bank</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  -->
  <div class="w-100"></div>
  
  <div class="navbar-nav text-nowrap">
      <?php if (isset($_SESSION['user'])) { ?>
        <a class="nav-link px-3" href="assets/dist/php/logout.action.php">Log Out</a>
      <?php } else { ?>
        <a class="nav-link px-3" href="html/login.php">Log-In</a>
      <?php } ?>
  </div>

</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home" class="align-text-bottom"></span>
              Home
            </a>
          </li>
          <li class="nav-item">
            <?php if (isset($_SESSION['user'])) { ?>
            <a class="nav-link" href="html/reserve.php">
              <span data-feather="feather" class="align-text-bottom"></span>
              Blood Reserve
            </a>
            <?php } else { ?>
            <a class="nav-link" href="#">
              <span data-feather="lock" class="align-text-bottom"></span>
              Blood Reserve
            </a>
            <?php } ?>
          </li>
          <li class="nav-item">
            <?php if (isset($_SESSION['user'])) { ?>
            <a class="nav-link" href="html/donate.php">
              <span data-feather="droplet" class="align-text-bottom"></span>
              Blood Donate
            </a>
            <?php } else { ?>
            <a class="nav-link" href="#">
              <span data-feather="lock" class="align-text-bottom"></span>
              Blood Donate
            </a>
            <?php } ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="html/about.php">
              <span data-feather="globe" class="align-text-bottom"></span>
              About Us
            </a>
          </li>
          <li class="nav-item fixed-bottom">
            <?php if (isset($_SESSION['user'])) { ?>
            <a class="nav-link" href="html/profile.php">
              <span data-feather="users" class="align-text-bottom"></span>
              User Info
            </a>
            <?php } else { ?>
            <a class="nav-link" href="#">
              <span data-feather="lock" class="align-text-bottom"></span>
              User Info
            </a>
            <?php } ?>
          </li>
        </ul>

        <?php
          if (isset($_SESSION['user'])) {
            if ($account->isAdmin()) { 
          ?>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span >Admin Panel</span>
          <span data-feather="menu" class="align-text-bottom"></span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="html/inventory.php">
              <span data-feather="database" class="align-text-bottom"></span>
              Blood Inventory
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="html/manage.php">
              <span data-feather="users" class="align-text-bottom"></span>
              Manage Transaction
            </a>
          </li>
        </ul>
        <?php } } ?>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="display-6">Welcome to Blood Bank</h1>
      </div>

      <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="assets/brand/slide1.jpg" class="w-100 d-block" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Blood Bank</h3>
                    <p>A single drop of blood can make a huge difference.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/brand/slide2.jpg" class="w-100 d-block" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="assets/brand/slide3.jpg" class="w-100 d-block" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Blood Bank</h3>
                    <p>Be the reason for someone's heartbeat.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <hr>
    </div>

    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="assets/dist/js/dashboard.js"></script>
  </body>
</html>
