<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['uid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $eid = $_SESSION['uid'];
    $FName = $_POST['FirstName'];
    $LName = $_POST['LastName'];
    $Address = $_POST['Address'];
    $empcode = $_POST['EmpCode'];
    $EmpDept = $_POST['EmpDept'];
    $EmpDesignation = $_POST['EmpDesignation'];
    $EmpContactNo = $_POST['EmpContactNo'];
    $gender = $_POST['gender'];
    $empjdate = $_POST['EmpJoingdate'];
    $query = mysqli_query($con, "update employeedetail set EmpFname='$FName',  EmpLName='$LName',  
                          EmpAddress='$Address', EmpCode='$empcode', EmpDept='$EmpDept', EmpDesignation='$EmpDesignation', 
                          EmpContactNo='$EmpContactNo', EmpGender='$gender',EmpJoingdate='$empjdate' where ID='$eid'");
    if ($query) {
      echo "<script>alert('Your profile has been updated.!!'); </script>";
    } else {
      echo "<script>alert('Something Went Wrong. Please try again.!'); </script>";
      echo json_encode(mysqli_error($con));
      die;
    }
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Profile</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <?php include_once('includes/sidebar.php') ?>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <?php include_once('includes/header.php') ?>
          <!-- End of Topbar -->
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
            <form class="user" method="post" action="">
              <?php
              $eid = $_SESSION['uid'];
              $ret = mysqli_query($con, "select * from employeedetail where ID='$eid'");

              $cnt = 1;
              while ($row = mysqli_fetch_array($ret)) {
                //print_r($row);
              ?>
                <div class="row">
                  <div class="col-4 mb-3">First Name</div>
                  <div class="col-4 mb-3"> <input type="text" class="form-control" id="FirstName" name="FirstName" aria-describedby="emailHelp" required="true" value="<?= $row['EmpFname']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Last Name </div>
                  <div class="col-4 mb-3"> <input type="text" class="form-control" id="LastName" name="LastName" aria-describedby="emailHelp" required="true" value="<?= $row['EmpLName']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Employee Address </div>
                  <div class="col-4 mb-3"> <input type="text" class="form-control" id="Address" name="Address" aria-describedby="emailHelp" required="true" value="<?= $row['EmpAddress']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Employee Code </div>
                  <div class="col-4 mb-3">
                    <input type="number" class="form-control" id="EmpCode" name="EmpCode" aria-describedby="emailHelp" required="true" value="<?= $row['EmpCode']; ?>" readonly="true">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Employee Dept</div>
                  <div class="col-4 mb-3">
                    <!-- <input type="text" class="form-control" id="EmpDept" name="EmpDept" aria-describedby="emailHelp" required="true" value="<?= $row['EmpDept']; ?>"> -->
                    <select id="EmpDept" name="EmpDept" class="form-control">
                      <option selected>Electrical Engineering</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Employee Desigantion</div>

                  <div class="col-4 mb-3">
                    <!-- <input type="text" class="form-control" id="EmpDesignation" name="EmpDesignation" aria-describedby="emailHelp" required="true" value="<?= $row['EmpDesignation']; ?>"> -->
                    <select id="EmpDesignation" name="EmpDesignation" class="form-control">
                      <option selected>Technician</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Employee Contact No.</div>
                  <div class="col-4 mb-3">
                    <input type="number" class="form-control" id="EmpContactNo" name="EmpContactNo" pattern="[0]{1}[7]{1}[0-9]{8}" aria-describedby="emailHelp" required="true" value="<?= $row['EmpContactNo']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Email</div>
                  <div class="col-4 mb-3">
                    <input type="email" class="form-control" id="Email" name="Email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required="true" value="<?= $row['EmpEmail']; ?>" readonly="true">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Employee Joing Date</div>
                  <div class="col-4  mb-3">
                    <input type="date" class="form-control" value="<?= $row['EmpJoingdate']; ?>" id="jDate" name="EmpJoingdate" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Gender</div>
                  <div class="col-4 mb-3">
                    <input type='Radio' name='gender' value='Male' id="gender" <?= $row['EmpGender'] == "Male" ? "checked" : ''; ?>>Male
                    <input type='Radio' name='gender' value='Female' id="gender" <?= $row['EmpGender'] == "Female" ? "checked" : ''; ?>>Female
                  </div>
                <?php } ?>
                <div class="row" style="margin-top:15%">
                  <div class="col-4"></div>
                  <div class="col-12">
                    <input type="submit" name="submit" value="Update Your Profile" class="btn btn-primary btn-user btn-block" style="position: relative; right: 400px; bottom: 100px;">
                    <br />
                  </div>
                </div>
            </form>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <?php include_once('includes/footer.php'); ?>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
      $(".jDate").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      }).datepicker("update", "10/10/2016");
    </script>
  </body>

  </html>
<?php }  ?>