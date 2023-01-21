<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="lentou">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Blood Bank</title>

    <link rel="icon" type="image/x-icon" href="../assets/brand/icon.ico">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../assets/dist/css/dashboard.css">

  </head>
  <body>
    

<header class="navbar navbar-dark sticky-top bg-danger flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Blood Bank</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="w-100"></div>
  
  <div class="navbar-nav text-nowrap">
      <a class="nav-link px-3 active" href="#">Log-In</a>
  </div>

</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../index.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="lock" class="align-text-bottom"></span>
              Blood Reserve
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="lock" class="align-text-bottom"></span>
              Blood Donate
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../html/about.php">
              <span data-feather="globe" class="align-text-bottom"></span>
              About Us
            </a>
          </li>
          <li class="nav-item fixed-bottom">
            <a class="nav-link" href="#">
              <span data-feather="lock" class="align-text-bottom"></span>
              User Info
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <div class="container col-xl-10 col-xxl-8 px-4 py-5">

        <div class="row align-items-center g-lg-5 py-5">

          <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Blood Bank Form</h1>
            <p class="col-lg-10 fs-4">
              Be a saviour just by donating your blood.
              Saving a life won’t cost you anything. Go ahead and donate blood.
              Donate blood and be the reason for someone’s existence.
            </p>
          </div>
          <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" action="../assets/dist/php/login.action.php" method="POST">

              <input type="email" class="form-control" id="floatingInput" placeholder="Email Address" name="email" required>          
              <br>

              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass" required>
              <br>

              <input type="password" class="form-control" id="confirmPass" placeholder="Confirm Password" value="1" name="confirm" required hidden>
              <br>

              <select class="form-select" id="auth" name="selection" required>
                <option value="">Select Type</option>
                <option value="login">Login</option>
                <option value="register">Register</option>
              </select>
              <br>

              <select class="form-select" id="role" name="role" required>
                <option value="">Select Role</option>
                <option value="patient">Patient</option>
                <option value="donor">Donor</option>
                <option value="admin">Admin</option>
              </select>
              <br>
              
              <button class="w-100 btn btn-lg btn-primary" name="submit" id="emailTrue">Submit</button>
              <hr class="my-4">
              <small class="text-muted">By clicking Submit, you agree to the terms of use.</small>

            </form>

            <script>
              var doc = document;
              var auth = doc.getElementById('auth');
              var confirmPass = doc.getElementById('confirmPass');

              auth.onclick = function () {
                return auth.options.selectedIndex == 2 ? confirmPass.hidden = false : confirmPass.hidden = true;
              }
            </script>
            
          </div>
        </div>
      </div>

    </main>
    
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/dashboard.js"></script>
  </body>
</html>