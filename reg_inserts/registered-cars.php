<?php 
session_start();
include 'connection.php';

$idset = $_SESSION['userID'];

$sql = "SELECT * FROM car_description WHERE driverID = '3004'";
$id = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InFuse | Patron Masterlist</title>
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
  <link rel="stylesheet" href="assets/css/table.css">

</head>

<body>

  <!-- ======= Sidebar and Header ======= -->

  <?php include 'headerbar-passenger.php';?>
  <?php include 'sidebar-passenger.php';?>

  <!-- End Sidebar and Header-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registered Cars</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Registered Cars</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <!-- table starts here -->
      
                <div class="card"> 
                  <div class="card-body">
                  <form action="process.php" method="post" enctype="multipart/form-data">

                  <button type="submit" name="submit" class="btn btn-primary mt-3" style="float: right;">
                    <i class="bi bi-file-earmark-spreadsheet"></i>
                    Export
                    </button>
                    <h2 class="card-title ">Sorted using the books that is available</h2>


                    <div class="overflow-auto mt-4">

                    <!-- Table with stripped rows -->
                    <table class="table table-hover datatable table-bordered text-nowrap text-center" style="max-height: 600px; overflow: auto; display: inline-block;">
                      <thead class="table-secondary" style="position:sticky; top: 0 ;">
                        <tr>
                    
                          <th scope="col">Color</th>
                          <th scope="col">Manufacturer</th></th>
                          <th scope="col">Type</th>
                          <th scope="col">Seat Capacity</th>
                          <th scope="col">Registration Date</th>
                          <th scope="col">Plate Number</th>
                          
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                        while($tbl_bookinfo = mysqli_fetch_assoc($id)):   
                      ?>
                        <tr>
                      
                         
                          <th><?= $tbl_bookinfo['carColor'];?></th>
                          <td><?= $tbl_bookinfo['manufacturer'];?></td>
                          <td><?= $tbl_bookinfo['carType'];?></td>
                          <td><?= $tbl_bookinfo['carSeatCapacity'];?></td>
                          <td><?= $tbl_bookinfo['carRegister'];?></td>
                          <td><?= $tbl_bookinfo['plateNumber'];?></td>
                       
                        
                        </tr>

                        <?php
                endwhile;
                ?>
                      
                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

              </form>
              </div>
            </div>
          </div>

         

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
  </footer><!-- End Footer -->

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