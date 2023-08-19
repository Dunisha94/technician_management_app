<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {

        $eid = $_SESSION['uid'];
        $empcode = $_POST['EmpCode'];
        $project = $_POST['ProjectName'];
        $ratings = $_POST['ratings'];
        $comments = $_POST['Comments'];

        $query = mysqli_query($con, "insert into emprating (EmpCode,ProjectName,Ratings,Comments) value
        ('$empcode','$project','$ratings','$comments')");

        if ($query) {
            echo "<script>alert('Employee ratings inserted successfully.!!'); </script>";
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

        <title>Employees Details</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <!-- Custom fonts for this template-->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
        <!-- <style media="screen">
            body {
                background: #2c7dd9;
            }

            .rating {
                width: 265px;
                padding: 5px;
                background: rgb(248, 249, 252);
                margin-right: 5px;
                position: relative;
                direction: rtl;
            }

            .rating input {
                position: absolute;
                width: 35px;
                height: 50px;
                cursor: pointer;
                transform: translateX(52px);
                opacity: 0;
                z-index: 5;
            }

            .rating input:nth-of-type(1) {
                right: 50px;
            }

            .rating input:nth-of-type(2) {
                right: 100px;
            }

            .rating input:nth-of-type(3) {
                right: 150px;
            }

            .rating input:nth-of-type(4) {
                right: 200px;
            }

            .rating input:nth-of-type(5) {
                right: 250px;
            }

            .rating input:nth-of-type(6) {
                right: 300px;
            }

            .rating input:checked~.star:after,
            .rating input:hover~.star:after {
                content: '\f005';
            }

            .rating .star {
                display: inline-block;
                font-family: FontAwesome;
                font-size: 42px;
                color: #FBB202;
                cursor: pointer;
                margin: 3px;
            }

            .rating .star:after {
                content: '\f006';
            }

            .rating .star:hover~.star:after,
            .rating .star:hover:after {
                content: '\f005';
            }
        </style> -->
        <style>
            .star:before {
                content: "\2605";
                color: gold;
                font-size: 2em;
            }

            .rating {
                padding: 20px;
            }
        </style>
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
                        <h1 class="h3 mb-4 text-gray-800">Add Employee Ratings</h1>
                        <form name="" class="user" method="post">
                            <br />
                            <div class="row">
                                <div class="col-4 mb-3">Employee Code</div>
                                <div class="col-4 mb-3"><input type="number" class="form-control" id="EmpCode" name="EmpCode" value="<?php echo $row['EmpCode']; ?>" aria-describedby="emailHelp" required="true"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Project Done</div>
                                <div class="col-4 mb-3"> <input type="text" class="form-control" id="ProjectName" name="ProjectName" value="<?php echo $row['ProjectName']; ?>" required="true"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Rating For the project</div>
                                <div class="rating">
                                    <input type='Radio' name='ratings' value='rating_1' id="ratings" <?= $row['Ratings'] == "rating_1" ? "checked" : ''; ?>><span class="star"> </span> <br />
                                    <input type='Radio' name='ratings' value='rating_2' id="ratings" <?= $row['Ratings'] == "rating_2" ? "checked" : ''; ?>><span class="star"><span class="star"> </span> <br />
                                    <input type='Radio' name='ratings' value='rating_3' id="ratings" <?= $row['Ratings'] == "rating_3" ? "checked" : ''; ?>><span class="star"><span class="star"> </span><span class="star"><br />
                                    <input type='Radio' name='ratings' value='rating_4' id="ratings" <?= $row['Ratings'] == "rating_4" ? "checked" : ''; ?>><span class="star"><span class="star"> </span><span class="star"><span class="star"><br />
                                    <input type='Radio' name='ratings' value='rating_5' id="ratings" <?= $row['Ratings'] == "rating_5" ? "checked" : ''; ?>><span class="star"><span class="star"> </span><span class="star"><span class="star"><span class="star">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Comments</div>
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" rows="16" id="Comments" name="Comments" value="<?php echo $row['Comments']; ?>" required="true"></textarea>
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