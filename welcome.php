<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['uid'] == 0)) {
  header('location:logout.php');
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to eTechnician</title>

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
      <?php include_once('includes/sidebar.php'); ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <?php include_once('includes/header.php'); ?>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Performance View Of <?php echo $fname . " " . $lname; ?></h1>
            </div>

            <!-- add chart -->
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <?php
                $empid = $_SESSION['uid'];
                $ret = mysqli_query($con, "select EmpFname,EmpLname from employeedetail where ID='$empid'");
                $row = mysqli_fetch_array($ret);
                $fname = $row['EmpFname'];
                $lname = $row['EmpLname'];
                ?>
              </div>
              <!-- <div class="col-auto">
        <i class="fas fa-user fa-2x text-gray-300"></i>
      </div> -->
            </div>
            <div class="row">
              <div class="col-sm-10">
                <div class="card">
                  <div class="card-body">
                    <p class="card-text">The following shows your ratings according to the projects you have completed.</p>
                    <?php
                    include 'chart1.php';
                    ?>
                  </div>
                </div>

              </div>
              <!-- <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <p class="card-text">The following shows your performances according to the projects you have completed.</p>
                    <?php
                    include 'chart1.php';
                    ?>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
          <!-- Content Row -->
        </div>
      </div>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

  </body>

  </html>

  </html>
<?php
}
?>