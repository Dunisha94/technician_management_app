<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['uid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        //$eid = $_SESSION['uid'];
        $empcode = $_SESSION['empCode'];
        $id = $_POST['ID'];
        $disable_textboxes = $_POST['disable_textboxes'] ? 0 : 1;

        $emp1name = $disable_textboxes ? $_POST['emp1name'] : "";
        $emp1des = $disable_textboxes ? $_POST['emp1des'] : "";
        $emp1salary = $disable_textboxes ? $_POST['emp1salary'] : "";
        $emp1workduration = $disable_textboxes ? $_POST['emp1workduration'] : "";

        $emp2name = $disable_textboxes ? $_POST['emp2name'] : "";
        $emp2des = $disable_textboxes ? $_POST['emp2des'] : "";
        $emp2salary = $disable_textboxes ? $_POST['emp2salary'] : "";
        $emp2workduration = $disable_textboxes ? $_POST['emp2workduration'] : "";

        $emp3name = $disable_textboxes ? $_POST['emp3name'] : "";
        $emp3des = $disable_textboxes ? $_POST['emp3des'] : "";
        $emp3salary = $disable_textboxes ? $_POST['emp3salary'] : "";
        $emp3workduration = $disable_textboxes ? $_POST['emp3workduration'] : "";

        if ($id  === "") {
            $query = "insert into empexpireince (EmpCode,Employer1Name,Employer1Designation,Employer1Salary,Employer1WorkDuration,
            Employer2Name,Employer2Designation,Employer2Salary,Employer2WorkDuration,
            Employer3Name,Employer3Designation,Employer3Salary,Employer3WorkDuration,No_Exp) value
            ('$empcode','$emp1name','$emp1des','$emp1salary','$emp1workduration','$emp2name','$emp2des','$emp2salary','$emp2workduration',
            '$emp3name','$emp3des','$emp3salary','$emp3workduration',$disable_textboxes)";
        } else {
            $query = "update empexpireince set Employer1Name='$emp1name',  Employer1Designation ='$emp1des', Employer1Salary ='$emp1salary', Employer1WorkDuration='$emp1workduration',
            Employer2Name='$emp2name',  Employer2Designation ='$emp2des', Employer2Salary ='$emp2salary', Employer2WorkDuration='$emp2workduration', 
            Employer3Name='$emp3name',  Employer3Designation ='$emp3des', Employer3Salary ='$emp3salary', Employer3WorkDuration='$emp3workduration',No_Exp=$disable_textboxes where ID='$id'";
        }
        //echo($query);
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('Your exp details inserted successfully.!!'); </script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.!'); </script>";
            echo json_encode(mysqli_error($con));
            die();
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

        <title>My Exp</title>

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
                        <h1 class="h3 mb-4 text-gray-800">Add / Edit Exp Info</h1>
                        <?php
                        if (isset($_POST['disable_textboxes'])) {
                            // Checkbox is checked, set textboxes to disabled
                            $row['Employer1Name'] = '';
                            $row['Employer1Designation'] = '';
                            $row['Employer1Salary'] = '';
                            $row['Employer1WorkDuration'] = '';

                            $row['Employer2Name'] = '';
                            $row['Employer2Designation'] = '';
                            $row['Employer2Salary'] = '';
                            $row['Employer2WorkDuration'] = '';

                            $row['Employer3Name'] = '';
                            $row['Employer3Designation'] = '';
                            $row['Employer3Salary'] = '';
                            $row['Employer3WorkDuration'] = '';
                            $textbox_disabled = 'disabled';
                        } else {
                            // Checkbox is not checked, show textboxes
                            $row['Employer1Name'] = $_POST['emp1name'] ?? '';
                            $row['Employer1Designation'] = $_POST['emp1des'] ?? '';
                            $row['Employer1Salary'] = $_POST['emp1salary'] ?? '';
                            $row['Employer1WorkDuration'] = $_POST['emp1workduration'] ?? '';

                            $row['Employer2Name'] = $_POST['emp2name'] ?? '';
                            $row['Employer2Designation'] = $_POST['emp2des'] ?? '';
                            $row['Employer2Salary'] = $_POST['emp2salary'] ?? '';
                            $row['Employer2WorkDuration'] = $_POST['emp2workduration'] ?? '';

                            $row['Employer3Name'] = $_POST['emp3name'] ?? '';
                            $row['Employer3Designation'] = $_POST['emp3des'] ?? '';
                            $row['Employer3Salary'] = $_POST['emp3salary'] ?? '';
                            $row['Employer3WorkDuration'] = $_POST['emp3workduration'] ?? '';
                            $textbox_disabled = '';
                        }
                        ?>
                        <form name="" class="user" method="post">
                            <?php
                            $empcode = $_SESSION['empCode'];
                            $ret = mysqli_query($con, "select * from empexpireince where EmpCode='$empcode'");
                            $cnt = 1;
                            $row = mysqli_fetch_array($ret);
                            $textbox_disabled = $row["No_Exp"] ? "disabled" : '';
                            ?>
                            <br />
                            <input type="text" hidden name="ID" value="<?= $row['ID']; ?>" />
                            <div class="row">
                                <div class="mb-3"><input type="checkbox" name="disable_textboxes" id="disable_textboxes"></div>
                                <div class="col-6 mb-1">
                                    <p style="font-size:16px; color:green">If you don't have any experiences tick the check box: </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 1 Name</div>
                                <div class="col-6 mb-3"> <input type="text" class="form-control" id="emp1name" name="emp1name" aria-describedby="emailHelp" value="<?= $row['Employer1Name']; ?>" <?= $textbox_disabled ?>></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 1 Designation </div>
                                <div class="col-6 mb-3"> <input type="text" class="form-control" id="emp1des" name="emp1des" aria-describedby="emailHelp" value="<?= $row['Employer1Designation']; ?>" <?= $textbox_disabled ?>></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 1 Salary </div>
                                <div class="col-6 mb-3">
                                    <input type="number" class="form-control" id="emp1salary" name="emp1salary" aria-describedby="emailHelp" value="<?= $row['Employer1Salary']; ?>" <?= $textbox_disabled ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 1 Work Duration</div>
                                <div class="col-6 mb-3">
                                    <input type="text" class="form-control" id="emp1workduration" name="emp1workduration" aria-describedby="emailHelp" value="<?= $row['Employer1WorkDuration']; ?>" <?= $textbox_disabled ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 2 Name</div>
                                <div class="col-6 mb-3"> <input type="text" class="form-control" id="emp2name" name="emp2name" aria-describedby="emailHelp" value="<?= $row['Employer2Name']; ?>" <?= $textbox_disabled ?>></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 2 Designation </div>
                                <div class="col-6 mb-3"> <input type="text" class="form-control" id="emp2des" name="emp2des" aria-describedby="emailHelp" value="<?= $row['Employer2Designation']; ?>" <?= $textbox_disabled ?>></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 2 Salary </div>
                                <div class="col-6 mb-3">
                                    <input type="number" class="form-control" id="emp2salary" name="emp2salary" aria-describedby="emailHelp" value="<?= $row['Employer2Salary']; ?>" <?= $textbox_disabled ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 2 Work Duration</div>
                                <div class="col-6 mb-3">
                                    <input type="text" class="form-control" id="emp2workduration" name="emp2workduration" aria-describedby="emailHelp" value="<?= $row['Employer2WorkDuration']; ?>" <?= $textbox_disabled ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 3 Name</div>
                                <div class="col-6 mb-3"> <input type="text" class="form-control" id="emp3name" name="emp3name" aria-describedby="emailHelp" value="<?= $row['Employer3Name']; ?>" <?= $textbox_disabled ?>></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 3 Designation </div>
                                <div class="col-6 mb-3"> <input type="text" class="form-control" id="emp3des" name="emp3des" aria-describedby="emailHelp" value="<?= $row['Employer3Designation']; ?>" <?= $textbox_disabled ?>></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 3 Salary </div>
                                <div class="col-6 mb-3">
                                    <input type="number" class="form-control" id="emp3salary" name="emp3salary" aria-describedby="emailHelp" value="<?= $row['Employer3Salary']; ?>" <?= $textbox_disabled ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 3 Work Duration</div>
                                <div class="col-6 mb-3">
                                    <input type="text" class="form-control" id="emp3workduration" name="emp3workduration" aria-describedby="emailHelp" value="<?= $row['Employer3WorkDuration']; ?>" <?= $textbox_disabled ?>>
                                </div>
                            </div>
                            <div class="row" style="margin-top:4%">
                                <div class="col-4"></div>
                                <div class="col-3">
                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-user btn-block">
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
        <script>
            const checkbox = document.querySelector('#disable_textboxes');
            const emp1name = document.querySelector('#emp1name');
            const emp1des = document.querySelector('#emp1des');
            const emp1salary = document.querySelector('#emp1salary');
            const emp1workduration = document.querySelector('#emp1workduration');

            const emp2name = document.querySelector('#emp2name');
            const emp2des = document.querySelector('#emp2des');
            const emp2salary = document.querySelector('#emp2salary');
            const emp2workduration = document.querySelector('#emp2workduration');

            const emp3name = document.querySelector('#emp3name');
            const emp3des = document.querySelector('#emp3des');
            const emp3salary = document.querySelector('#emp3salary');
            const emp3workduration = document.querySelector('#emp3workduration');

            checkbox.addEventListener('change', () => {
                if (checkbox.checked) {
                    emp1name.disabled = true;
                    emp1des.disabled = true;
                    emp1salary.disabled = true;
                    emp1workduration.disabled = true;

                    emp2name.disabled = true;
                    emp2des.disabled = true;
                    emp2salary.disabled = true;
                    emp2workduration.disabled = true;

                    emp3name.disabled = true;
                    emp3des.disabled = true;
                    emp3salary.disabled = true;
                    emp3workduration.disabled = true;
                } else {
                    emp1name.disabled = false;
                    emp1des.disabled = false;
                    emp1salary.disabled = false;
                    emp1workduration.disabled = false;

                    emp2name.disabled = false;
                    emp2des.disabled = false;
                    emp2salary.disabled = false;
                    emp2workduration.disabled = false;

                    emp3name.disabled = false;
                    emp3des.disabled = false;
                    emp3salary.disabled = false;
                    emp3workduration.disabled = false;
                }
            });
        </script>
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