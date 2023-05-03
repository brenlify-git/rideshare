<?php 

include 'connection.php';

$sql = "SELECT * FROM user";

$id = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InFuse | Patron Membership</title>
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

  <style>

        button {
            --width: 200px;
            --timing: 2s;
            border: 0;
            width: var(--width);
            padding-block: 1em;
            color: #fff;
            font-weight: bold;
            font-size: 1em;
            background: rgb(0, 116, 189);
            transition: all 0.2s;
            border-radius: 3px;
            margin: 20px;
        }
        .decline{
          background: rgb(244, 77, 115);
        }
        .buttons{
          margin: 10px;
         border-radius: 10px;
        }

        button:hover {
            background-image: linear-gradient(to right, rgb(250, 82, 82), rgb(250, 82, 82) 16.65%, rgb(190, 75, 219) 16.65%, rgb(190, 75, 219) 33.3%, rgb(76, 110, 245) 33.3%, rgb(76, 110, 245) 49.95%, rgb(64, 192, 87) 49.95%, rgb(64, 192, 87) 66.6%, rgb(250, 176, 5) 66.6%, rgb(250, 176, 5) 83.25%, rgb(253, 126, 20) 83.25%, rgb(253, 126, 20) 100%, rgb(250, 82, 82) 100%);
            animation: var(--timing) linear dance6123 infinite;
            transform: scale(1.1) translateY(-1px);
        }

        @keyframes dance6123 {
            to {
                background-position: var(--width);
            }
        }
    </style>

</head>

<body>

  <!-- ======= Sidebar and Header ======= -->

  <?php include 'headerbar.php';?>
  <?php include 'sidebar.php';?>

  <!-- End Sidebar and Header-->

  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Membership</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Patron's Membership</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Insert Patron's Details</h5>


              <!-- Multi Columns Form -->
              <form class="row g-3" action="validate-patrons.php" method="post">
                
              <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Registration ID</label>
                  <input type="number" class="form-control"  maxlength="11" id="regID" name="regID" required>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Student ID</label>
                  <input type="text" class="form-control" pattern="[0-9]{4}-[0-9]{6}" maxlength="11" title="Format should be like this: 2021-160099" id="studID" name="studID" required>
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="firstName" name="firstName" required>
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="middleName" name="middleName" required>
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastName" name="lastName" required>
                </div>
                <div class="col-md-6">
                  <label class="col-sm-7 form-label">Patron Type</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" id="patronType" name="patronType" required>
                    <option value="PATRON">Patron</option>
                   
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Contact Number</label>
                  <input type="text" class="form-control" id="contactNumber" pattern="[0-9]{11}" maxlength="11" name="contactNumber" required>
                </div>
                <div class="col-md-6">
                  <label class="col-sm-7 form-label">Department</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" id="department" name="department" required>
                    <option disabled value="College of Accountancy, Business and Management">College of Accountancy, Business and Management</option>
                      <option value="BS Accountancy">BS Accountancy</option>
                      <option value="BS Accounting Information System">BS Accounting Information System</option>
                      <option value="BS Business Administration in Financial Management">BS Business Administration in Financial Management</option>
                      <option value="BS Business Administration in Marketing Management">BS Business Administration in Marketing Management</option>
                      <option value="BS Hospitality Management">BS Hospitality Management</option>
                      <option value="BS Tourism Management">BS Tourism Management</option>
                      <option disabled value="College of Arts and Sciences">College of Arts and Sciences</option>
                      <option value="BS Psychology">BS Psychology</option>
                      <option value="Bachelor in Physical Education">Bachelor in Physical Education</option>
                      <option value="Certificate of Professional Education">Certificate of Professional Education</option>
                      <option disabled value="College of Engineering and Technology">College of Engineering and Technology</option>
                      <option value="BS Architecture">BS Architecture</option>
                      <option value="BS Civil Engineering">BS Civil Engineering</option>
                      <option value="BS Computer Engineering">BS Computer Engineering</option>
                      <option value="BS Information Technology">BS Information Technology</option>
                      <option disabled value="Graduate Studies">Graduate Studies</option>
                      <option value="Doctors of Education Major in Educational Management">Doctors of Education Major in Educational Management</option>
                      <option value="Master of Education Major in Educational Management">Master of Education Major in Educational Management</option>
                      <option value="Master of Education Major in Special Education">Master of Education Major in Special Education</option>
                      <option value="Master in Management">Master in Management</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Section</label>
                  <input type="text" class="form-control" id="section" name="section" required>
                </div>
                <div class="col-md-6">
                  <label for="inputAddress5" class="form-label">Street</label>
                  <input type="text" class="form-control" id="street" placeholder="William Shakespeare" name="street" required>
                </div>
                <div class="col-md-6">
                  <label for="inputAddress5" class="form-label">Barangay</label>
                  <input type="text" class="form-control" id="barangay" placeholder="William Shakespeare" name="barangay" required>
                </div>
                <div class="col-md-6">
                  <label for="inputAddress5" class="form-label">Municipality</label> 
                  <input type="text" class="form-control" id="municipality" placeholder="Book Shelf Inc." name="municipality" required>
                </div>
                <div class="col-md-6">
                  <label for="inputAddress5" class="form-label">Province</label>
                  <input type="text" class="form-control" id="province" placeholder="Book Shelf Inc." name="province" required>
                </div>
              
               
                <div class="text-center buttonsResponse">
                  <button type="submit" class="buttons" name="accept">+ Accept Registration</button>
                  <button type="submit" class="buttons decline" name="decline">- Decline Registration</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <!-- table starts here -->

          <div class="card"> 
                  <div class="card-body">
                
                    <h2 class="card-title ">Patron's Membership Request | <span>Subject to approval</span></h2>


                    <form name="excel.php" method="post">

                    <div class="overflow-auto mt-4">
                  
                    <!-- Table with stripped rows -->
                    <table class="table table-hover table-bordered text-nowrap text-center" style="max-height: 695px; overflow: auto; display: inline-block;" id="table">
                <thead class="table-dark" style="position:sticky; top: 0 ;">
                    <tr>
                     
                      <th scope="col">Student ID</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Middle Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">User Type</th>
                      <th scope="col">Contact Number</th>
                      <th scope="col">Department</th>
                      <th scope="col">Section</th>
                      <th scope="col">Street</th>
                      <th scope="col">Barangay</th>
                      <th scope="col">Municipality</th>
                      <th scope="col">Province</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                  while($tbl_patrons = mysqli_fetch_assoc($id)):   

                    
                ?>
                    <tr>
                      
                      <td><?= $tbl_patrons['userID'];?></td>
                      <td><?= $tbl_patrons['firstName'];?></td>
                      <td><?= $tbl_patrons['middleName'];?></td>
                      <td><?= $tbl_patrons['lastName'];?></td>
                      <td><?= $tbl_patrons['Patron_Type'];?></td>
                      <td><?= $tbl_patrons['Contact_Number'];?></td>
                      <td><?= $tbl_patrons['Department'];?></td>
                      <td><?= $tbl_patrons['Section'];?></td>
                      <td><?= $tbl_patrons['Street'];?>
                      <td><?= $tbl_patrons['Barangay'];?></td>
                      <td><?= $tbl_patrons['Municipality'];?></td>
                      <td><?= $tbl_patrons['Province'];?> </td></td>
                 
                    </tr>



                    <?php
          endwhile;
          ?>

                  </tbody>
                </table>
                    

              </form>
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

  <script>
    var table = document.getElementById('table');

    for (var i = 1; i < table.rows.length; i++) {
      table.rows[i].onclick = function () {
        document.getElementById("regID").value = this.cells[0].innerHTML;
        document.getElementById("studID").value = this.cells[1].innerHTML;
        document.getElementById("firstName").value = this.cells[2].innerHTML;
        document.getElementById("middleName").value = this.cells[3].innerHTML;
        document.getElementById("lastName").value = this.cells[4].innerHTML;
        document.getElementById("patronType").value = this.cells[5].innerHTML;
        document.getElementById("contactNumber").value = this.cells[6].innerHTML;
        document.getElementById("department").value = this.cells[7].innerHTML;
        document.getElementById("section").value = this.cells[8].innerHTML;
        document.getElementById("street").value = this.cells[9].innerHTML;
        document.getElementById("barangay").value = this.cells[10].innerHTML;
        document.getElementById("municipality").value = this.cells[11].innerHTML;
        document.getElementById("province").value = this.cells[12].innerHTML;

        console.log(rows[i]);

      };
    }
  </script>

</body>

</html>