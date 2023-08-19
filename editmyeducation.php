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
    $empcode = $_POST['EmpCode'];
    $school = $_POST['school'];
    $schyear = $_POST['schyear'];
    $certificate = $_POST['certificate'];
    $cerins = $_POST['cerins'];
    $ceryear = $_POST['ceryear'];
    $diploma = $_POST['diploma'];
    $dipins = $_POST['dipins'];
    $dipyear = $_POST['dipyear'];
    $hidip = $_POST['hidip'];
    $hidipins = $_POST['hidipins'];
    $hidipyear = $_POST['hidipyear'];
    $degree = $_POST['degree'];
    $degins = $_POST['degins'];
    $digyear = $_POST['digyear'];
    $nvq = $_POST['nvq'];

    $query = mysqli_query($con, "update empeducation set School='$school', Schyear='$schyear', Certificate='$certificate',  
     Cerins= '$cerins', Ceryear='$ceryear',  Diploma='$diploma',
     Dipins= '$dipins', Dipyear='$dipyear', Hidip='$hidip',
     Hidipins='$hidipins', Hidipyear= '$hidipyear', 
     Degree= '$degree', Degins='$degins', 
     Digyear='$digyear', Nvq='$nvq' where EmpCode='$empcode'");

    if ($query) {
      echo "<script>alert('Your education details updated successfully.!!'); </script>";
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

    <title>Edit My Education</title>

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
            <h1 class="h3 mb-4 text-gray-800">Edit My Education</h1>

            <form class="user" method="post" action="">
              <?php
              //$cid = $_SESSION['uid'];
              $empCode = $_SESSION['empCode'];
              $ret = mysqli_query($con, "select * from empeducation where EmpCode=$empCode");
              $cnt = 1;
              while ($row = mysqli_fetch_array($ret)) {
              ?>
                <div class="row">
                  <div class="col-4 mb-3">School Attended</div>
                  <div class="col-4 mb-3"> <input type="text" class="form-control" id="school" name="school" aria-describedby="emailHelp" required="true" value="<?php echo $row['School']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">&nbsp;&nbsp;&nbsp;Year </div>
                  <div class="col-4 mb-2"> <input type="text" class="form-control" id="schyear" name="schyear" aria-describedby="emailHelp" required="true" value="<?php echo $row['Schyear']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Certificate Cource</div>
                  <div class="col-4 mb-3"> <input type="text" class="form-control" id="certificate" name="certificate" aria-describedby="emailHelp" required="true" value="<?php echo $row['Certificate']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">&nbsp;&nbsp;&nbsp;Institute/College </div>
                  <div class="col-4 mb-3"> <input type="text" class="form-control" id="cerins" name="cerins" aria-describedby="emailHelp" required="true" value="<?php echo $row['Cerins']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">&nbsp;&nbsp;&nbsp;Completed Year </div>
                  <div class="col-4 mb-3">
                    <input type="text" class="form-control" id="ceryear" name="ceryear" aria-describedby="emailHelp" required="true" value="<?php echo $row['Ceryear']; ?>">
                  </div>
                </div>
                <p style="font-size:16px; color:green">If you have any other educational qualification please add below: </p>
                <div class="row">
                  <div class="col-4 mb-3">Diploma </div>
                  <div class="col-4 mb-3"> <input type="text" class="form-control" id="diploma" name="diploma" aria-describedby="emailHelp" value="<?php echo $row['Diploma']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">&nbsp;&nbsp;&nbsp;Institute/College </div>
                  <div class="col-4 mb-3"> <input type="text" class="form-control" id="dipins" name="dipins" aria-describedby="emailHelp" value="<?php echo $row['Dipins']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">&nbsp;&nbsp;&nbsp;Completed Year </div>
                  <div class="col-4 mb-3">
                    <input type="text" class="form-control" id="dipyear" name="dipyear" aria-describedby="emailHelp" value="<?php echo $row['Dipyear']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Higher Diploma </div>
                  <div class="col-4 mb-3"> <input type="text" class="form-control" id="hidip" name="hidip" aria-describedby="emailHelp" value="<?php echo $row['Hidip']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">&nbsp;&nbsp;&nbsp;Institute/College </div>
                  <div class="col-4 mb-3"> <input type="text" class="form-control" id="hidipins" name="hidipins" aria-describedby="emailHelp" value="<?php echo $row['Hidipins']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">&nbsp;&nbsp;&nbsp;Completed Year </div>
                  <div class="col-4 mb-3">
                    <input type="text" class="form-control" id="hidipyear" name="hidipyear" aria-describedby="emailHelp" value="<?php echo $row['Hidipyear']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Degree </div>
                  <div class="col-4 mb-3"> <input type="text" class="form-control" id="degree" name="degree" aria-describedby="emailHelp" value="<?php echo $row['Degree']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">&nbsp;&nbsp;&nbsp;Institute/College </div>
                  <div class="col-4 mb-3"> <input type="text" class="form-control" id="degins" name="degins" aria-describedby="emailHelp" value="<?php echo $row['Degins']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">&nbsp;&nbsp;&nbsp;Completed Year </div>
                  <div class="col-4 mb-3">
                    <input type="text" class="form-control" id="digyear" name="digyear" aria-describedby="emailHelp" value="<?php echo $row['Digyear']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Last Obtained NVQ Level </div>
                  <div class="col-4 mb-3">
                    <input type="text" class="form-control" id="nvq" name="nvq" aria-describedby="emailHelp" value="<?php echo $row['Nvq']; ?>">
                  </div>
                </div>
              <?php } ?>
              <div class="row" style="margin-top:4%">
                <div class="col-4"></div>
                <div class="col-3">
                  <input type="submit" name="submit" value="update" class="btn btn-primary btn-user btn-block">
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