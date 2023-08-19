<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['uid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        if (empty($_POST['MealType'])) {
            $msg = "Please select your meal.";
        } else {
            $empcode = $_SESSION['empCode'];
            $meals_str = $_POST['MealType'];
            $current_date = date('Y-m-d');
            $query = mysqli_query($con, "INSERT INTO employeemeals (EmpCode, MealType, date) VALUES ('$empcode', '$meals_str','$current_date')");
            if ($query) {
                echo "<script>alert('Your meal has been updated.!!'); </script>";
            } else {
                echo "<script>alert('Something Went Wrong. Please try again.!'); </script>";
                echo json_encode(mysqli_error($con));
                //die;
            }
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
        <title>Select Meals</title>
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
                        <h1 class="h3 mb-4 text-gray-800">Select Your Meals For <b><?php echo date('Y-m-d'); ?></b></h1>
                        <br />
                        <br />
                        <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                    echo $msg;
                                                                                }  ?> </p>
                        <h3 class="h3 mb-4 text-gray-800">Lunch Menu</h3>
                        <form class="user" method="post" action="">
                            <div class="row">
                                <div class="mb-3"><input type="checkbox" value="chickenrice" name="MealType" id="chickenrice" style="margin-left: 50%;margin-bottom: 5%">
                                    <div class="col-lg-6">
                                        <img src="img/meals/chickenrice.png" width="180" height="100" />
                                    </div>
                                </div>
                                <div class="mb-3"><input type="checkbox" value="eggrice" name="MealType" id="eggrice" style="margin-left: 50%;margin-bottom: 5%">
                                    <div class="col-lg-6">
                                        <img src="img/meals/eggrice.png" width="180" height="100" />
                                    </div>
                                </div>
                                <div class="mb-3"><input type="checkbox" value="fishrice" name="MealType" id="fishrice" style="margin-left: 50%;margin-bottom: 5%">
                                    <div class="col-lg-6">
                                        <img src="img/meals/fishrice.png" width="180" height="100" />
                                    </div>
                                </div>
                                <div class="mb-3"><input type="checkbox" value="vegrice" name="MealType" id="vegrice" style="margin-left: 50%;margin-bottom: 5%">
                                    <div class="col-lg-6">
                                        <img src="img/meals/vegrice.png" width="180" height="100" />
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:4%">
                                <div class="col-4"></div>
                                <div class="col-3">
                                    <input type="submit" name="submit" value="Update Your Meal" class="btn btn-primary btn-user btn-block" onclick="return validateForm();">
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
        <script>
            function validateForm() {
                var checkbox = document.getElementById("MealType");
                if (!checkbox.checked) {
                    alert("Please select the checkbox");
                    return false;
                }
                return true;
            }
        </script>
    </body>

    </html>
<?php }  ?>