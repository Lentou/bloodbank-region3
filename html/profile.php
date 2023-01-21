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
            <a class="nav-link active" href="#">
              <span data-feather="users" class="align-text-bottom"></span>
              User Info
            </a>
          </li>
        </ul>

        <?php if ($account->isAdmin()) { ?>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span >Admin Panel</span>
            <span data-feather="menu" class="align-text-bottom"></span>
            <!--
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
            -->
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="inventory.php">
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
        <?php } ?>
        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <h1 class="display-6">User Profile</h1>
      <hr>
      <!-- insert the main contents of each page -->
      <div class="shadow p-3 mb-5 bg-body rounded">
      <form class="row g-3" action="../assets/dist/php/profile.action.php" method="POST">

        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text">Full Name</span>
            <input type="text" id="full_name" aria-label="Full name" class="form-control" placeholder=<?php echo $account->getValue("name"); ?> name="full_name" readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text">Blood Type</span>
            <select class="form-select" id="blood_type" name="bloodtype" disabled>
              <?php $bloodType = $account->getValue("blood_type") !== "none" ? $account->getValue("blood_type") : "A+"; ?>
              <option><?php echo $bloodType; ?></option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
            </select>
          </div>
          
        </div>              
    
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text">Age</span>
            <input type="number" name="age" id="age" min="1" max="200" class="form-control" placeholder=<?php echo $account->getValue("age") ?> readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text">Sex</span>
            <select class="form-select" id="sex" name="sex" disabled>
              <?php $sex = $account->getValue("sex") !== "none" ? $account->getValue("sex") : "Male"; ?>
              <option><?php echo $sex; ?></option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
        </div>
       
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text">Address</span>
            <input type="text" name="address" id="address" class="form-control" placeholder=<?php echo $account->getValue("address"); ?> readonly>
          </div> 
        </div>

        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text">Province</span>
            <!--<input type="text" name="province" id="province" class="form-control" placeholder=<?php echo $account->getValue("province"); ?> readonly>--> 
            <select class="form-select" name="province" id="province" disabled>
              <?php $province = $account->getValue("province") !== "none" ? $account->getValue("province") : "Bataan"; ?>
              <option><?php echo $province; ?></option>
              <option value="Pampanga">Pampanga</option>
              <option value="Zambales">Zambales</option>
              <option value="Bulacan">Bulacan</option>
              <option value="Bataan">Bataan</option>
            </select>
          </div>  
        </div>

        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text">Email Address</span>
            <input type="email" name="email" id="email_address" class="form-control" placeholder=<?php echo $account->getValue("email"); ?> readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text">Contact No.</span>
            <input type="text" name="contact" id="contact" class="form-control" placeholder=<?php echo $account->getValue("contact_number"); ?> readonly>
          </div>
        </div>

        <div class="col-md-3"></div>
        <div class="col-md-6" id="editpass" hidden>
          <div class="input-group">
            <span class="input-group-text">Edit Password</span>
            <input type="password" class="form-control" placeholder="Current Pass" name="current_pass" id="currentpass">
            <input type="password" class="form-control" placeholder="New Pass" name="new_pass" id="newpass">
            <input type="password" class="form-control" placeholder="Confirm Pass" name="confirm_pass" id="confirmpass">
          </div>
        </div>
        <div class="col-md-3"></div>

        <div class="col-md-12">
          <div class="table-responsive" id="blood_table">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Blood Type</th>
                  <th scope="col">Type of Transaction</th>
                  <th scope="col">Transaction Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <!-- todo checking blood -->
              <tbody hidden name="blood_table" id="table">
                <tr>
                  <td>+A</td>
                  <td>Request</td>
                  <td>12/11/2022</td>
                  <td>Pending</td>
                </tr>
                <tr>
                  <td>+A</td>
                  <td>Donate</td>
                  <td>12/10/2022</td>
                  <td>Approved</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="col-md-12">
          <button type="button" name="" id="profile" class="btn text-bg-danger" onclick="profileEvent()">Edit Profile</button>
          <button type="submit" name="save" id="save" class="btn text-bg-danger" hidden>Save</button>
        </div>

      </form>
      </div>
      <script>

        var doc = document;
        var profile = doc.getElementById('profile');
        var save = doc.getElementById('save');
        var check = true;

        function profileEvent() {
          var full_name = doc.getElementById('full_name');
          var blood_type = doc.getElementById('blood_type');
          var age = doc.getElementById('age');
          var sex = doc.getElementById('sex');
          var address = doc.getElementById('address');
          var province = doc.getElementById('province');
          var email_address = doc.getElementById('email_address');
          var contact = doc.getElementById('contact');

          var editpass = doc.getElementById('editpass');

          if (check) {
            full_name.readOnly = false;

            blood_type.disabled = false;
            age.readOnly = false;
            sex.disabled = false;

            address.readOnly = false;
            
            province.disabled = false;
            email_address.readOnly = false;
            contact.readOnly = false;

            editpass.hidden = false;

            profile.innerHTML = "Cancel";
            save.hidden = false;

            check = false;
            
          } else {

            full_name.readOnly = true;

            blood_type.disabled = true;
            age.readOnly = true;
            sex.disabled = true;

            address.readOnly = true;

            province.disabled = true;
            email_address.readOnly = true;
            contact.readOnly = true;

            editpass.hidden = true;

            profile.innerHTML = "Edit Profile";
            save.hidden = true;

            check = true;
          }
        }

      </script>
    </main>
    
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/dashboard.js"></script>
  </body>
</html>
