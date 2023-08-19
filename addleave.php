<?php
session_start();
$empcode = $_SESSION['empCode'];
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['uid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $eid = $_SESSION['uid'];
        $EmpName = $_POST['EmpName'];
        $EmpDept = $_POST['EmpDept'];
        $NoofLeaves = $_POST['NoofLeaves'];
        $LeaveType = $_POST['LeaveType'];
        $Reason = $_POST['Reason'];
        $CommenceOn = $_POST['CommenceOn'];
        $EndOn = $_POST['EndOn'];
        $ApplyDate = $_POST['ApplyDate'];

        $query = mysqli_query($con, "insert into employeeleaves(EmpName,EmpCode,EmpDept,NoofLeaves,LeaveType,Reason,CommenceOn,EndOn,ApplyDate)
        value ('$EmpName','$empcode','$EmpDept','$NoofLeaves','$LeaveType','$Reason','$CommenceOn','$EndOn','$ApplyDate')");

        if ($query) {
            echo "<script>alert('Your leave informations inserted successfully.!!'); </script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.!'); </script>";
            echo json_encode(mysqli_error($con));
        }
    }
    $q = "SELECT EmpCode,SUM(NoofLeaves) AS AppLeaves From employeeleaves where EmpCode ='$empcode' AND LeaveStatus = 'Approved' GROUP BY EmpCode";
    $query = mysqli_query($con, $q);
    $result = mysqli_fetch_array($query);
    $rowcount = mysqli_num_rows($query);
    //print_r($result);
    //die("OK".$rowcount);
    // print_r($result[0]);
    $approve = $rowcount > 0 ? $result["AppLeaves"] : 0;
    //echo($approve);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Apply Leave</title>

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
                        <h1 class="h3 mb-4 text-gray-800">Apply Leave</h1>

                        <form name="" class="user" method="post">
                            <?php
                            $cid = $_SESSION['uid'];
                            $ret = mysqli_query($con, "select * from employeedetail where ID='$cid'");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <div class="row">
                                    <div class="col-4 mb-3" style="font-size:16px; color:blue"><b>Total Leaves = 21</b></div>
                                    <div class="col-4 mb-3" style="font-size:16px; color:blue"><b>Approved Leaves = <?= $approve ?></b></div>
                                    <div class="col-4 mb-3" style="font-size:16px; color:blue"><b>Remain Leaves = <?= 21 - $approve ?></b></div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-4 mb-3">Employee Name</div>
                                    <div class="col-4 mb-3"> <input type="text" class="form-control" id="EmpName" name="EmpName" value="<?php echo $fname . " " . $lname; ?>" readonly="true"></div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mb-3">Employee Code</div>
                                    <div class="col-4 mb-3"> <input type="text" class="form-control" id="EmpCode" name="EmpCode" value="<?php echo $row['EmpCode']; ?>" readonly="true"></div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mb-3">Employee Department</div>
                                    <div class="col-4 mb-3">
                                        <select id="EmpDept" name="EmpDept" class="form-control" readonly="true">
                                            <option selected>Electrical Engineering</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mb-3">No of days leave applied for</div>
                                    <div class="col-4 mb-3"> <input type="number" class="form-control" id="NoofLeaves" name="NoofLeaves" style="width: 100px;" value="<?php echo $row['NoofLeaves']; ?>" required="true"></div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mb-3">Leave Type</div>
                                    <div class="col-4 mb-3">
                                        <input type='Radio' name='LeaveType' value='A' id="LeaveType">Annual &nbsp;
                                        <input type='Radio' name='LeaveType' value='C' id="LeaveType">Casual &nbsp;
                                        <input type='Radio' name='LeaveType' value='M' id="LeaveType">Medical
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mb-3">Reason for Application</div>
                                    <div class="col-4 mb-3"> <input type="text" class="form-control" id="Reason" name="Reason" value="<?php echo $row['Reason']; ?>" required="true"></div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mb-3">Leave to commence on</div>
                                    <div class="col-4  mb-3">
                                        <input type="date" class="form-control" id="CommenceOn" name="CommenceOn" aria-describedby="emailHelp" placeholder="YYYY-MM-DD" required="true" value="<?php echo $row['CommenceOn']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mb-3">Leave on end on</div>
                                    <div class="col-4  mb-3">
                                        <input type="date" class="form-control" id="EndOn" name="EndOn" aria-describedby="emailHelp" placeholder="YYYY-MM-DD" required="true" value="<?php echo $row['EndOn']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mb-3">Leave Apply Date</div>
                                    <div class="col-4  mb-3">
                                        <input type="date" class="form-control" id="ApplyDate" name="ApplyDate" aria-describedby="emailHelp" placeholder="YYYY-MM-DD" required="true" value="<?php echo $row['ApplyDate']; ?>">
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row" style="margin-top:4%">
                                <div class="col-4"></div>
                                <div class="col-3">
                                    <input type="submit" name="submit" value="Request" class="btn btn-primary btn-user btn-block">
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