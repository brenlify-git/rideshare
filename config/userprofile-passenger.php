<?php
$message;

session_start();
include '../config/connection.php';

$userID  = $_SESSION['userID'];

$sql = "SELECT * FROM user WHERE userID = '$userID'";

$id = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / User Account</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Sidebar and Header ======= -->

  <?php include_once '../headerbars/headerbar-passenger.php';?>
  <?php include '../sidebars/sidebar-passenger.php'; 
  
  ?>

  <!-- End Sidebar and Header-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">User Account</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
       

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">


                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-identification">Identification</button>
                </li>

              </ul>
              <div class="tab-content pt-2">


                <div class="tab-pane show active fade profile-change-password" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="changepassword.php" method="post">

                  <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Account ID</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="accID" type="text" value="<?php echo $_SESSION['userID']; ?>" class="form-control" readonly id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newPass" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase &#013; and lowercase letter, and at least 8 or more characters" required id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="confirmPass" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase &#013; and lowercase letter, and at least 8 or more characters" require_once id="newPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
                    </div>

                    
                  </form><!-- End Change Password Form -->

                 
                </div>

                <div class="tab-pane fade profile-identification" id="profile-identification">
                  <!-- Change Password Form -->
                  <form action="changeidentification.php" method="post">

                  <?php
                  while($userSelect = mysqli_fetch_assoc($id)):   

                    
                ?>

                  <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">ID Type</label>
                      <div class="col-md-8 col-lg-9">
                      <select class="form-select" aria-label="Default select example" onchange="enableIdNumber()"
                      name="idType" required id="idType">
                      
                      <option value="<?= $userSelect['idType'];?>" selected><?= $userSelect['idType'];?></option>
                      <option value="UMID">UMID</option>
                      <option value="Drivers License">Driver's License</option>
                      <option value="Professional Regulation Commission (PRC) ID">Professional Regulation Commission
                        (PRC) ID</option>
                      <option value="Passport">Passport</option>
                      <option value="Social Security System">Social Security System</option>
                      <option value="National ID">National ID</option>
                      <option value="Pag-ibig ID">Pag-ibig ID</option>
                      <option value="Postal ID">Postal ID</option>
                      <option value="Phil-health ID">Phil-health ID</option>
                      <option value="Government Issued ID">Government Issued ID</option>
                    </select>                      
                  </div>
                    </div>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">ID Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="idNumber" type="password" value="<?= $userSelect['idNumber'];?>" class="form-control" required id="idNumber">
                      </div>
                    </div>


                    <?php endwhile; ?>

                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-primary">Change Identification</button>
                    </div>

                    
                  </form><!-- End Change Password Form -->

                 
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>