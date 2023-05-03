<?php 

session_start();
include '../config/connection.php';

$usersID =  $_SESSION['userID'];
$stat = "SELECT car_driver.verifyStatus AS driverStat FROM `car_driver` INNER JOIN user ON user.userID = car_driver.userID WHERE car_driver.userID = $usersID";
$checkStat = $conn->query($stat);


// $countStudents = mysqli_query($conn, "SELECT car_driver.licenseNumber AS LicenseNumber FROM car_driver INNER JOIN user ON user.userID = car_driver.userID WHERE car_driver.userID = $usersID");
// $row_countStud = mysqli_fetch_assoc($countStudents);
// $countStud = $row_countStud["LicenseNumber"];



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InFuse | Upgrade to Driver</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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
  <link rel="stylesheet" href="assets/css/table.css">

</head>

<body>
  <!-- ======= Sidebar and Header ======= -->
  <?php 
   include '../headerbars/headerbar-passenger.php';   
  ?>
  <?php include '../sidebars/sidebar-passenger.php';?>

  <!-- End Sidebar and Header-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Register you car here</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard-passenger.php">Home</a></li>
          <li class="breadcrumb-item active">Car Registration</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">  
            <div class="card-body">
              <h5 class="card-title">Driver Details</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="register-car.php" method="post">

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">User ID</label>
                  <input type="number" class="form-control" id="inputEmail5" name="usersID"
                    value="<?= $_SESSION['userID'];?>" >
                </div>
                

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">License Number</label>
                  <input type="text" class="form-control" id="inputPassword5" name="licenseNumber"
                    value="" required>
                </div>
                <hr>

                <h5 class="card-title" style="margin-top: -10px;">Car Details</h5>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Car Color</label>
                  <input type="text" class="form-control" id="inputPassword5" name="carColor"
                    value="" required>
                </div>


                <div class="col-md-6">
                    <label class="col-sm-7 form-label">Car Type</label>
                    <div class="col-sm-12">
                        <select class="form-select" aria-label="Default select example"
                            name="carType" id="department" required>
                            <option value="SUV">SUV</option>
                            <option value="Coupe">Coupe</option>
                            <option value="Crossover">Crossover</option>
                            <option value="Compact">Compact</option>
                            <option value="Pickup Truck">Pickup Truck</option>
                            <option value="Grand Tourer">Grand Tourer</option>
                            <option value="Hatchback">Hatchback</option>
                            <option value="Station Wagon">Station Wagon</option>
                            <option value="Minivan">Minivan</option>
                            <option value="Van">Van</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Manufacturer</label>
                  <input type="text" class="form-control" id="inputPassword5" name="manufacturer"
                    value="" required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Seat Capacity</label>
                  <input type="number" class="form-control" id="inputPassword5" min="1" max="16" name="seatCapacity"
                    value="" required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Plate Number</label>
                  <input type="text" class="form-control" id="inputPassword5" name="plateNumber"
                    value="" required>
                </div>
                
              
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">+ Register</button>
                  <button type="reset" class="btn btn-warning">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>


      </div>
    </section>

  </main><!-- End #main -->



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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
  <script src="assets/js/toaster.js"></script>
  <script>
    function success_toast() {
      toastr.success("Fields Reset!")
    }
  </script>

</body>

</html>