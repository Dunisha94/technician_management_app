<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    //echo("\n EmpCode:".$_POST['EmpCode']);
    if (isset($_POST['submit'])) {
        //echo("\n LeaveStatus:".$_POST['LeaveStatus']);
        $eid = $_SESSION['uid'];
        $id = $_POST['ID'];
        $empcode = $_POST['EmpCode'];
        //$empcode = $_POST['EmpCode'];
        $status = $_POST['LeaveStatus'];
        $query = "UPDATE employeeleaves SET LeaveStatus = '$status' WHERE ID = '$id'";
        //var_dump($query);

        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('Employee leave details updated successfully.!!'); </script>";
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

        <title>Employees Leave Details</title>

        <!-- Custom fonts for this template-->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
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
                    <div class="contaner-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800">All Employees Leave Details</h1>

                        <div style="height: 100%; overflow-y: scroll;">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr style="background-color: #3399ff; color: white;">
                                                    <th class="fw-bold" scope="col">Employee Code</th>
                                                    <th class="fw-bold" scope="col">No of days leave applied for</th>
                                                    <th class="fw-bold" scope="col">Leave Type</th>
                                                    <th class="fw-bold" scope="col">Reason for Application </th>
                                                    <th class="fw-bold" scope="col">Leave to commence on</th>
                                                    <th class="fw-bold" scope="col">Leave on end on</th>
                                                    <th class="fw-bold" scope="col">Leave Apply Date</th>
                                                    <th class="fw-bold" scope="col">Action</th>
                                                    <th class="fw-bold" scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $empCode = $_SESSION['empCode'];
                                                $sql = "select * from employeeleaves";
                                                $stmt = mysqli_query($con, $sql);
                                                // echo ("select * from empeducation where EmpCode=$empCode");
                                                while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {
                                                    //print_r($row);
                                                ?>
                                                    <form class="user" method="post" action="">
                                                        <tr>
                                                            <input type="text" name="ID" value="<?= $row['ID']; ?>" hidden />
                                                            <th><?= $row['EmpCode']; ?><input type="number" hidden name="EmpCode" value="<?= $row['EmpCode']; ?>"></th>
                                                            <th><?= $row['NoofLeaves']; ?></th>
                                                            <th><?= $row['LeaveType']; ?></th>
                                                            <th><?= $row['Reason']; ?></th>
                                                            <th><?= $row['CommenceOn']; ?></th>
                                                            <th><?= $row['EndOn']; ?></th>
                                                            <th><?= $row['ApplyDate']; ?></th>
                                                            <th>
                                                                <select id="status" name="LeaveStatus" class="form-control">
                                                                    <?php
                                                                    if ($row['LeaveStatus']) {
                                                                    ?>
                                                                        <option selected hidden><?= $row['LeaveStatus'] ?></option>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <option hidden>Select</option>
                                                                        <option value="Approved">Approved</option>
                                                                        <option value="Reject">Reject</option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </th>
                                                            <th>
                                                                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Update" />
                                                            </th>
                                                        </tr>
                                                    </form>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
        <script>
            function levapr() {
                alert("Leaves  Successfully Updated!");
                window.location.refresh();
            }
        </script>
        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>
        <!-- Page level plugins -->
        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="../js/demo/datatables-demo.js"></script>
    </body>

    </html>
<?php }  ?>