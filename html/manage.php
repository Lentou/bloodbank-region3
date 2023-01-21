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
      <a class="nav-link px-3" href="../assets/dist/php/logout.action.php">Log Out</a>
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
            <a class="nav-link" href="inventory.php">
              <span data-feather="database" class="align-text-bottom"></span>
              Blood Inventory
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">
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
            <h1 class="display-6">Manage Transaction</h1>
            <hr>
            <div class="row">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-grid gap-2">
                                    <button type="button" name="" id="" class="btn btn-danger">Request</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-grid gap-2">
                                    <button type="button" name="" id="" class="btn btn-danger">Donate</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <!-- todo can edit account -->
                            
                            <div class="table-responsive" id="blood_table">
                                <?php 
                                  $db = $account->connect();
                                  $result = $db->query("SELECT * FROM USER");
                                ?>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Blood Type</th>
                                            <th scope="col">Transaction Type</th>
                                            <th scope="col">Transaction Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table">
                                    <?php 
                                      if ($result) {
                                        foreach ($result as $row) {
                                    ?>
                                        <tr>
                                          <td> <?php echo $row["name"]; ?> </td>
                                          <td> <?php echo $row["blood_type"]; ?> </td>
                                          <td> Donate </td>
                                          <td> 01/15/2023 </td>
                                          <td> Pending </td>
                                           <!--  data-bs-target="#editmodal" -->
                                          <td> <a href="#manage_<?php echo $row["USER_ID"] ?>" name="userid" class="text-danger editbtn" data-bs-toggle="modal">Edit</a></td>

                                          <!-- View Modal -->
                                          <div class="modal fade" id="manage_<?php echo $row["USER_ID"]?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalTitleId">Manage Account</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- ../assets/dist/php/modal.edit.action.php -->
                                                <form action="" method='POST'>
                                                  <div class="modal-body">
                                                    <div class="input-group">
                                                      <?php $getUserId = $row['USER_ID']; ?>
                                                      <input type="text" id="check_<?php echo $getUserId; ?>" hidden readonly>
                                                      <span class="input-group-text">Name</span>
                                                      <input type="text" name="full_name" id="manage_name_<?php echo $row['USER_ID']; ?>" class="form-control" value='<?php echo $row["name"] ?>' readonly>
                                                    </div>
                                                    <br>
                                                  <div class="input-group">
                                                    <span class="input-group-text">Blood Type</span>
                                                    <select class="form-select" id="manage_bloodtype_<?php echo $row['USER_ID'] ?>" name="bloodtype" disabled>
                                                      <option id="edit_blood_type"><?php echo $row["blood_type"]; ?></option>
                                                      <option value="A+">A+</option>
                                                      <option value="A-">A-</option>
                                                      <option value="B+">B+</option>
                                                      <option value="B-">B-</option>
                                                      <option value="O+">O+</option>
                                                      <option value="O-">O-</option>
                                                      <option value="AB+">AB+</option>
                                                      <option value="AB-">AB-</option>
                                                    </select>
                                                    <span class="input-group-text">Age</span>
                                                    <input type="number" id='manage_age_<?php echo $row['USER_ID'] ?>' name="age" class="form-control" value='<?php echo $row["age"]; ?>' readonly>
                                                    <span class="input-group-text">Sex</span>
                                                    <select class="form-select" id="manage_sex_<?php echo $row['USER_ID'] ?>" name="sex" disabled>
                                                      <option><?php echo $row["sex"]; ?></option>
                                                      <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                                    </select>
                                                  </div>
                                                  <br>
                                                  <div class="input-group">
                                                    <span class="input-group-text">Address</span>
                                                    <input type="text" id="manage_address_<?php echo $row['USER_ID'] ?>" name="address" class="form-control" value='<?php echo $row["address"]; ?>' readonly>
                                                    <span class="input-group-text">Province</span>
                                                    <select class="form-select" name="province" id="manage_province_<?php echo $row['USER_ID'] ?>" disabled>
                                                      <option id="edit_province"><?php echo $row["province"]; ?></option>
                                                      <option value="Pampanga">Pampanga</option>
                                                      <option value="Zambales">Zambales</option>
                                                      <option value="Bulacan">Bulacan</option>
                                                      <option value="Bataan">Bataan</option>
                                                    </select>
                                                  </div>
                                                  <br>
                                                  <div class="input-group">
                                                    <span class="input-group-text">Email Address</span>
                                                    <input type="email" name="email" id="manage_email_<?php echo $row['USER_ID'] ?>" class="form-control" value='<?php echo $row["email"]; ?>' readonly>
                                                    <span class="input-group-text">Contact No.</span>
                                                    <input type="text" name="contact" id="manage_contact_<?php echo $row['USER_ID'] ?>" class="form-control" value='<?php echo $row["contact_number"]; ?>' readonly>
                                                  </div>
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                  <div class="input-group">
                                                    <span class="input-group-text">Status</span>
                                                    <select class="form-select">
                                                      <option value="Pending">Pending</option>
                                                      <option value="Approved">Approved</option>
                                                      <option value="Denied">Denied</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-secondary">Submit</button>
                                                  </div>
                                                  <!-- date to check if its accurate -->
                                                  <div class="input-group">
                                                    <span class="input-group-text">Schedule Date</span>
                                                    <input type="date" id="sched" aria-label="schedule_date" class="form-control" name="sched_date" required>
                                                  </div>
                                                </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>

                                        </tr>
                                    <?php
                                        }
                                      } else {
                                        echo "No Record Found!";
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
    </main>
    
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/dashboard.js"></script>
  </body>
</html>


