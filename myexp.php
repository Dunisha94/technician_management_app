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

        <title>My Experience</title>

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
                        <h1 class="h3 mb-4 text-gray-800">My Previous Expirence</h1>

                        <div style="height: 100%; overflow-y: scroll;">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr style="background-color: #3399ff; color: white;">
                                                    <th class="fw-bold" scope="col">Employer1 Name</th>
                                                    <th class="fw-bold" scope="col">Employer1 Designation</th>
                                                    <th class="fw-bold" scope="col">Employer1 Salary </th>
                                                    <th class="fw-bold" scope="col">Employer1 WorkDuration</th>
                                                    <th class="fw-bold" scope="col">Employer2 Name</th>
                                                    <th class="fw-bold" scope="col">Employer2 Designation</th>
                                                    <th class="fw-bold" scope="col">Employer2 Salary </th>
                                                    <th class="fw-bold" scope="col">Employer2 WorkDuration</th>
                                                    <th class="fw-bold" scope="col">Employer3 Name</th>
                                                    <th class="fw-bold" scope="col">Employer3 Designation</th>
                                                    <th class="fw-bold" scope="col">Employer3 Salary </th>
                                                    <th class="fw-bold" scope="col">Employer3 WorkDuration</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $empCode = $_SESSION['empCode'];
                                                $query = mysqli_query($con, "select * from empexpireince where EmpCode=$empCode");
                                                $row = mysqli_fetch_array($query);
                                                ?>
                                                <tr>
                                                    <th><?php echo $row['Employer1Name']; ?></th>
                                                    <th><?php echo $row['Employer1Designation']; ?></th>
                                                    <th><?php echo $row['Employer1Salary']; ?></th>
                                                    <th><?php echo $row['Employer1WorkDuration']; ?></th>
                                                    <th><?php echo $row['Employer2Name']; ?></th>
                                                    <th><?php echo $row['Employer2Designation']; ?></th>
                                                    <th><?php echo $row['Employer2Salary']; ?></th>
                                                    <th><?php echo $row['Employer2WorkDuration']; ?></th>
                                                    <th><?php echo $row['Employer3Name']; ?></th>
                                                    <th><?php echo $row['Employer3Designation']; ?></th>
                                                    <th><?php echo $row['Employer3Salary']; ?></th>
                                                    <th><?php echo $row['Employer3WorkDuration']; ?></th>
                                                    <th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php ?>
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
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
    </body>

    </html>
<?php }  ?>