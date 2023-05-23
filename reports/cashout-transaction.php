<?php 

include '../config/connection.php';

date_default_timezone_set('Asia/Manila');
$currentDate = date('Y-m-d');


$sql = "SELECT * FROM cashin_cashout
INNER JOIN user ON cashin_cashout.userID = user.userID
WHERE transType = 'Cash Out'
  AND cashin_cashout.confirmStatus = 'accepted'
  AND DATE(transTime) = '$currentDate'";

$id = $conn->query($sql);

$countAmount = mysqli_query($conn, "SELECT SUM(amount) AS totalAmount FROM cashin_cashout
        INNER JOIN user ON cashin_cashout.userID = user.userID
        WHERE transType = 'Cash Out'
          AND cashin_cashout.confirmStatus = 'accepted'
          AND DATE(transTime) = '$currentDate'");
$row_countAmount = mysqli_fetch_assoc($countAmount);
$totalAmountCount = $row_countAmount["totalAmount"];

$countConFee= mysqli_query($conn, "SELECT SUM(proFee) AS totalConFee  FROM cashin_cashout
INNER JOIN user ON cashin_cashout.userID = user.userID
WHERE transType = 'Cash Out'
  AND cashin_cashout.confirmStatus = 'accepted'
  AND DATE(transTime) = '$currentDate'");
$row_countConFee = mysqli_fetch_assoc($countConFee);
$totalConFee = $row_countConFee["totalConFee"];

$formatted_money = number_format($totalAmountCount, 2, '.', ',');
$amountTot = '₱' . $formatted_money;


$formatted_money = number_format($totalConFee, 2, '.', ',');
$conFeeTot = '₱' . $formatted_money;



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

    <?php include '../headerbars/headerbar.php';?>
    <?php include '../sidebars/sidebar.php';?>

    <!-- End Sidebar and Header-->


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Cash Out Report Generation</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboards/dashboard.php">Home</a></li>
                    <li class="breadcrumb-item">Report Generation</li>
                    <li class="breadcrumb-item active">Cash Out Report Generation</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
    <div class="row">
        <div class="col-lg-12">

            <!-- table starts here -->

            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <button type="submit" name="submit" class="btn btn-primary mt-3" style="float: right;">
                            <i class="bi bi-file-earmark-spreadsheet"></i>
                            Export
                        </button>
                        <h2 class="card-title">This table displays the records of cashout transactions</h2>


                        <div class="overflow-auto mt-4">

                            <!-- Table with stripped rows -->
                            <table class="table table-hover datatable table-bordered text-nowrap text-center"
                                style="height:200px; overflow:scroll;">
                                <thead class="table-secondary" style="position:sticky; top: 1 ;">
                                    <tr>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Processing Fee</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                        while($tbl_bookinfo = mysqli_fetch_assoc($id)):   
                      ?>
                                        <tr>
                                            <td><?= $tbl_bookinfo['transID']; ?></td>
                                            <th><?= $tbl_bookinfo['firstName'] . " " . $tbl_bookinfo['lastName']; ?></th>
                                            <td><?= $tbl_bookinfo['amount']; ?></td>
                                            <td><?= $tbl_bookinfo['proFee']; ?></td>
                                        </tr>
                                    <?php
                                    endwhile;
                                    ?>

                                    <!-- Display the totals in a separate row -->
                                    <tr class="">
                                        <td colspan="2" style="text-align: right; padding-right:20px" > <b>Total</b> </td>

                                        <th><?= $amountTot; ?></th>
                                        <th><?= $conFeeTot; ?></th>
                                    </tr>

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>

                    </form>


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

</body>

</html>