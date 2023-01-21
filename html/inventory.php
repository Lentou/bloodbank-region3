<?php
include "../assets/dist/php/user.session.php";

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
      <a class="nav-link px-3" href="../assets/dist/php/logout.action.php">Log-In</a>
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
            <a class="nav-link" href="reserve.php">
              <span data-feather="feather" class="align-text-bottom"></span>
              Blood Reserve
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="donate.php">
              <span data-feather="droplet" class="align-text-bottom"></span>
              Blood Donate
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">
              <span data-feather="globe" class="align-text-bottom"></span>
              About Us
            </a>
          </li>
          <li class="nav-item fixed-bottom">
            <a class="nav-link" href="profile.php">
              <span data-feather="users" class="align-text-bottom"></span>
              User Info
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Admin Panel</span>
          <span data-feather="menu" class="align-text-bottom"></span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="database" class="align-text-bottom"></span>
              Blood Inventory
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage.php">
              <span data-feather="users" class="align-text-bottom"></span>
              Manage Transaction
            </a>
          </li>
        </ul>
        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <!-- Contents -->
        <div class="container">
            <br>
            <h1 class="display-6">Blood Inventory</h1>
            <hr>
            <div class="row">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <div class="container">
                    <?php
                      $queryDb = $account->connect();

                      $aPlus = $queryDb->query("SELECT SUM(quantity) FROM blood_bank WHERE blood_type = 'A+'");
                      $aMinus = $queryDb->query("SELECT SUM(quantity) FROM blood_bank WHERE blood_type = 'A-'");
                      $bPlus = $queryDb->query("SELECT SUM(quantity) FROM blood_bank WHERE blood_type = 'B+'");
                      $bMinus = $queryDb->query("SELECT SUM(quantity) FROM blood_bank WHERE blood_type = 'B-'");
                      $oPlus = $queryDb->query("SELECT SUM(quantity) FROM blood_bank WHERE blood_type = 'O+'");
                      $oMinus = $queryDb->query("SELECT SUM(quantity) FROM blood_bank WHERE blood_type = 'O-'");
                      $abPlus = $queryDb->query("SELECT SUM(quantity) FROM blood_bank WHERE blood_type = 'AB+'");
                      $abMinus = $queryDb->query("SELECT SUM(quantity) FROM blood_bank WHERE blood_type = 'AB-'");

                      $bloodCount = [
                        "A+" => $aPlus->fetch_row()[0] ?? 0,
                        "A-" => $aMinus->fetch_row()[0] ?? 0,
                        "B+" => $bPlus->fetch_row()[0] ?? 0,
                        "B-" => $bMinus->fetch_row()[0] ?? 0,
                        "O+" => $oPlus->fetch_row()[0] ?? 0,
                        "O-" => $oMinus->fetch_row()[0] ?? 0,
                        "AB+" => $abPlus->fetch_row()[0] ?? 0,
                        "AB-" => $abMinus->fetch_row()[0] ?? 0
                      ];

                      // todo count of donors/total_requests/approved_requests when scheduling is working
                      $listCount = [
                        "donors" => 0,
                        "total_requests" => 0,
                        "approved_requests" => 0
                      ];

                    ?>

                        <div class="row text-center">
                            <div class="col shadow p-1 mb-1 bg-body rounded">
                                <i data-feather="droplet"></i> A+ <p class="a+"> <?php echo $bloodCount["A+"]; ?></p>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col shadow p-1 mb-1 bg-body rounded">
                                <i data-feather="droplet"></i> A- <p class="a-"> <?php echo $bloodCount["A-"]; ?> </p>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col shadow p-1 mb-1 bg-body rounded">
                                <i data-feather="droplet"></i> B+ <p class="b+"> <?php echo $bloodCount["B+"]; ?> </p>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col shadow p-1 mb-1 bg-body rounded">
                                <i data-feather="droplet"></i> B- <p class="b-"> <?php echo $bloodCount["B-"]; ?> </p>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col shadow p-1 mb-1 bg-body rounded">
                                <i data-feather="droplet"></i> O+ <p class="o+"> <?php echo $bloodCount["O+"]; ?> </p>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col shadow p-1 mb-1 bg-body rounded">
                                <i data-feather="droplet"></i> O- <p class="o-"> <?php echo $bloodCount["O-"]; ?> </p>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col shadow p-1 mb-1 bg-body rounded">
                                <i data-feather="droplet"></i> AB+ <p class="ab+"><?php echo $bloodCount["AB+"]; ?> </p>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col shadow p-1 mb-1 bg-body rounded">
                                <i data-feather="droplet"></i> AB- <p class="ab-"><?php echo $bloodCount["AB-"]; ?> </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center">
                            <div class="col shadow p-1 mb-1 bg-body rounded">
                                <i data-feather="droplet"></i> Total Users <p class="donors"> <?php echo $listCount["donors"]; ?></p>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col shadow p-1 mb-1 bg-body rounded">
                                <i data-feather="droplet"></i> Total Requests <p class="requests"> <?php echo $listCount["total_requests"]; ?></p>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <!--
                            <div class="col shadow p-1 mb-1 bg-body rounded">
                                <i data-feather="droplet"></i> Approved Requests <p class="approved"> <?php echo $listCount["approved_requests"]; ?></p>
                            </div>
                            -->
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4"></div>
                            <div class="col-4 align-text-bottom">
                                <div class="input-group">
                                    <span class="input-group-text">Blood Type</span>
                                    <select class="form-select" id="blood_type" name="search_blood_type" required>
                                        <option value="All">All</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                    <button type="button" name="search" id="search_button" class="btn btn-danger">Search</button>
                                </div>
                                
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="table-responsive" id="blood_table">
                              <?php 
                                $bloodDb = $account->connect();
                                $queryBank = $bloodDb->query("SELECT * FROM blood_bank");
                              ?>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Blood Type</th>
                                            <th scope="col">Date Received</th>
                                            <th scope="col">Expiration Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table">
                                    <?php
                                      if ($queryBank) {
                                        foreach ($queryBank as $bankRow) {
                                    ?>
                                        <tr id="<?php echo $bankRow['STOCK_ID']; ?>">
                                            <td> <?php echo $bankRow["blood_type"]; ?> </td>
                                            <td> <?php echo $bankRow["acquisition_date"]; ?> </td>
                                            <td> <?php echo $bankRow["expiration_date"]; ?> </td>
                                        </tr>
                                    <?php 
                                        }
                                      }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>

                    </div>
                </div>       
            </div>
        </div>
      <!-- -->
    </main>
    
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/dashboard.js"></script>
  </body>
</html>
