<?php
include '../config/connection.php';

date_default_timezone_set('Asia/Manila');
$date = date("Y-m-d");

$sql = "SELECT * FROM car_description INNER JOIN user ON car_description.userID = user.userID WHERE acceptStatus = 'pending' AND verifyCarStatus = ''";
$notif = $conn->query($sql);


$countNotif = mysqli_query($conn, "SELECT COUNT(*) AS notifCount FROM car_description WHERE acceptStatus = 'pending' AND verifyCarStatus = ''");
$row_countNotif = mysqli_fetch_assoc($countNotif);
$row_countNotification = $row_countNotif["notifCount"];


session_start();
if(!isset($_SESSION['passenger_email']) && $_SESSION['Patron_Type'] != 'Driver'){
  header("Location:../logins/index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>  
 

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="../dashboards/dashboard.php" class="logo d-flex align-items-center">
    <img src="../assets/img/Logo Only.png" alt="">
    <span class="d-none d-lg-block">Rideshare Carpool</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto" >
  <ul class="d-flex align-items-center">



    <li class="nav-item dropdown" >

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" >
        <i class="bi bi-bell"></i>
        
          <?php
          if($row_countNotification == 0){
            
          }
          else{
            echo '<span class="badge bg-primary badge-number">';
            echo $row_countNotification;
            echo '</span>';
          }
          ?>
        
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications overflow-auto" style="max-height: 300px;" >
        <li class="dropdown-header"  style="overflow:hidden;">
          

          <?php
          if($row_countNotification == 0){
            echo "Nothing to accept here.";
           
          }
          else{
            echo 'You have <span style="color:#026ab2; font-weight:bold">';
            echo $row_countNotification;
            echo '</span> new notifications';
          }
          ?>
         
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <?php
            while($rows = mysqli_fetch_assoc($notif)):   
        ?>

        <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Registration Request</h4>
            <p><?=$rows['firstName']; ?> with an id <?= $rows['carID'];?> has a pending request</p>
           <button class="btn btn-warning text-dark col-md-12" style="color:aliceblue"><a style="text-decoration:none; color:aliceblue;" href="../create_membership/membership.php">Accept Now</a></button> 
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <?php
        endwhile;
        ?>
          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->


  

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="../assets/img/Logo_Login.png" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $_SESSION['firstName']. " " . $_SESSION['lastName']; ?></span>
      </a><!-- End Profile Iamge Icon -->



      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
        <h4><?php echo $_SESSION['userID']; ?></h4>
          <span><?php echo $_SESSION['email']; ?><br><?php echo $_SESSION['Patron_Type']; ?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="../config/logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span> Sign Out </a></span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

 <!-- Vendor JS Files -->
 <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>