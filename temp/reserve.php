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
    <link rel="stylesheet" href="../assets/dist/css/switches.css">
    
    <style>
      
    </style>
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
      <a class="nav-link px-3 active" href="#">Sign In</a>
  </div>

</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../index.html">
              <span data-feather="home" class="align-text-bottom"></span>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="feather" class="align-text-bottom"></span>
              Blood Reserve
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="droplet" class="align-text-bottom"></span>
              Blood Donate
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">
              <span data-feather="globe" class="align-text-bottom"></span>
              About Us
            </a>
          </li>
          <li class="nav-item fixed-bottom">
            <a class="nav-link" href="#">
              <span data-feather="users" class="align-text-bottom"></span>
              User Info
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span hidden>Admin Panel</span>
          <span hidden data-feather="menu" class="align-text-bottom"></span>
          <!--
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
          -->
        </h6>
        <ul hidden class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="database" class="align-text-bottom"></span>
              Inventory
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users" class="align-text-bottom"></span>
              Manage Accounts
            </a>
          </li>
        </ul>
        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <!-- insert the main contents of each page -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8" id="transaction">
            <br>
          <div class="shadow p-3 mb-5 bg-body rounded">
            <form class="row g-3 needs-validation">
              
              <div class="col-md-12"></div>

              <!-- REVISED RESERVED (request date - required_blood - quantity) -->
              <h1 class="display-6">Blood Reserve</h1>
              <hr>
              <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-text">Full Name</span>
                    <input type="text" id="last_name" aria-label="Last name" class="form-control" placeholder="Last Name" name="last_name" required>
                    <input type="text" id="first_name" aria-label="First name" class="form-control" placeholder="First Name" name="first_name" required>
                    <input type="text" id="middle_initial" aria-label="M.i" class="form-control" placeholder="Middle Initial" name="middle_name" required>
                </div>
              </div>

              <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">Sex</span>
                    <select class="form-select" id="sex" name="selection" required>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
              </div>              
          
              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-text">Age</span>
                  <input type="number" id="age" min="1" max="200" class="form-control" required>
                </div>
              </div>

              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-text">CP No.</span>
                  <input type="text" id="contact" class="form-control" required>
                </div>
              </div>

              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-text">Address</span>
                  <input type="text" id="address" class="form-control" required>
                </div> 
              </div>

              <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-text">Email</span>
                  <input type="email" id="email_address" class="form-control">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-text">Blood Type</span>
                  <select class="form-select" id="blood_type" name="selection" required>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>O+</option>
                    <option>O-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                  </select>
                </div>
              </div>

              <div class="col-md-12 text-end">
                <div class="form-check form-switch form-check-inline">
                  <input class="form-check-input" type="checkbox" id="autofill" value="option1">
                  <label class="form-check-label" for="autofill">Auto Fill Values?</label>
                </div>
                <button class="btn text-bg-danger" type="submit">Submit</button>
                <button class="btn text-bg-danger" type="submit">Cancel</button>
              </div>
              
              <div class="col-md-12"></div>
              
            </form>
            </div>

          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
      <!---->

    </main>
    
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/dashboard.js"></script>
  </body>
</html>
