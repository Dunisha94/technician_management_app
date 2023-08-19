<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
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

    <title>My Education</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <h1 class="h3 mb-4 text-gray-800">My Education</h1>
            <div style="height: 100%; overflow-y: scroll;">
              <div class="content">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-hover">
                      <thead>
                        <tr style="background-color: #3399ff; color: white;">
                          <th class="fw-bold" scope="col">School Attended</th>
                          <th class="fw-bold" scope="col">School Attended(Year)</th>
                          <th class="fw-bold" scope="col">Certificate Cource </th>
                          <th class="fw-bold" scope="col">Institute/College</th>
                          <th class="fw-bold" scope="col">Completed Year</th>
                          <th class="fw-bold" scope="col">Diploma</th>
                          <th class="fw-bold" scope="col">Institute/College </th>
                          <th class="fw-bold" scope="col">Completed Year</th>
                          <th class="fw-bold" scope="col">Higher Diploma</th>
                          <th class="fw-bold" scope="col">Institute/College</th>
                          <th class="fw-bold" scope="col">Completed Year </th>
                          <th class="fw-bold" scope="col">Degree</th>
                          <th class="fw-bold" scope="col">Institute/College</th>
                          <th class="fw-bold" scope="col">Completed Year </th>
                          <th class="fw-bold" scope="col">NVQ Level</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $empCode = $_SESSION['empCode'];
                        $query = mysqli_query($con, "select * from empeducation where EmpCode=$empCode");
                        // echo ("select * from empeducation where EmpCode=$empCode");
                        $row = mysqli_fetch_array($query);
                        ?>
                        <tr>
                          <th><?php echo $row['School']; ?><input type="text" hidden name="School[<?= $index ?>]" value="<?php echo $row['School']; ?>"></th>
                          <th><?php echo $row['Schyear']; ?><input type="text" hidden name="Schyear[<?= $index ?>]" value="<?php echo $row['Schyear']; ?>"></th>
                          <th><?php echo $row['Certificate']; ?><input type="text" hidden name="Certificate[<?= $index ?>]" value="<?php echo $row['Certificate']; ?>"></th>
                          <th><?php echo $row['Cerins']; ?><input type="text" hidden name="Cerins[<?= $index ?>]" value="<?php echo $row['Cerins']; ?>"></th>
                          <th><?php echo $row['Ceryear']; ?><input type="text" hidden name="Ceryear[<?= $index ?>]" value="<?php echo $row['Ceryear']; ?>"></th>
                          <th><?php echo $row['Diploma']; ?><input type="text" hidden name="Diploma[<?= $index ?>]" value="<?php echo $row['Diploma']; ?>"></th>
                          <th><?php echo $row['Dipins']; ?><input type="text" hidden name="Dipins[<?= $index ?>]" value="<?php echo $row['Dipins']; ?>"></th>
                          <th><?php echo $row['Dipyear']; ?><input type="text" hidden name="Dipyear[<?= $index ?>]" value="<?php echo $row['Dipyear']; ?>"></th>
                          <th><?php echo $row['Hidip']; ?><input type="text" hidden name="Hidip[<?= $index ?>]" value="<?php echo $row['Hidip']; ?>"></th>
                          <th><?php echo $row['Hidipyear']; ?><input type="text" hidden name="Hidipyear[<?= $index ?>]" value="<?php echo $row['Hidipyear']; ?>"></th>
                          <th><?php echo $row['Hidipins']; ?><input type="text" hidden name="Hidipins[<?= $index ?>]" value="<?php echo $row['Hidipins']; ?>"></th>
                          <th><?php echo $row['Degree']; ?><input type="text" hidden name="Degree[<?= $index ?>]" value="<?php echo $row['Degree']; ?>"></th>
                          <th><?php echo $row['Degins']; ?><input type="text" hidden name="Degins[<?= $index ?>]" value="<?php echo $row['Digyear']; ?>"></th>
                          <th><?php echo $row['Digyear']; ?><input type="text" hidden name="Digyear[<?= $index ?>]" value="<?php echo $row['Employer3WorkDuration']; ?>"></th>
                          <th><?php echo $row['Nvq']; ?><input type="text" hidden name="Nvq[<?= $index ?>]" value="<?php echo $row['Nvq']; ?>"></th>
                          <th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <?php  ?>
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
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
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