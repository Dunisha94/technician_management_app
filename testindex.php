<?php
include('includes/dbconnection.php');
error_reporting(0);
if (isset($_POST['submit'])) {
  $FName = $_POST['FirstName'];
  $LName = $_POST['LastName'];
  $empcode = $_POST['empcode'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
  //$RPassword=$_POST['RepeatPassword'];
  $ret = mysqli_query($con, "select EmpEmail from employeedetail where EmpEmail='$Email'");
  $result = mysqli_fetch_array($ret);
  if ($result > 0) {
    $msg = "This email already exists";
  } else {
    $query = mysqli_query($con, "insert into employeedetail(EmpFname, EmpLName, EmpCode, EmpEmail,  EmpPassword) value('$FName', '$LName', '$empcode', '$Email', '$Password' )");
    if ($query) {
      $msg = "You have successfully registered";
    } else {
      $msg = "Something Went Wrong. Please try again";
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

  <title>Employee Record Managment System</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- <h3 align="center" style="color: black; padding-top: 1%">Employee Record Managment System</h3> -->
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image">
            <img src="img/register.jpg" width="500" height="500" />
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <p style="font-size:16px; color:blue" align="center"> <?php if ($msg) {
                                                                      echo $msg;
                                                                    }  ?> </p>
              <form class="user" name="changepassword" method="post" id="changepassword">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="First Name" pattern="[A-Za-z]+" required="true">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Last Name" pattern="[A-Za-z]+" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" id="empcode" name="empcode" placeholder="Enter your Employee Code - 012345" pattern="[0-5]" required="true">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="Email" name="Email" placeholder="Email Address" required="true">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" required="true">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="RepeatPassword" name="RepeatPassword" placeholder="Repeat Password" required="true">
                  </div>
                </div>
                <input type="submit" name="submit" value="Register Account" class="btn btn-primary btn-user btn-block">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="loginerms.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
    document.getElementById("changepassword").addEventListener("submit", e => {
      if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
        alert('New Password and Confirm Password field does not match');
        // document.changepassword.confirmpassword();
        e.preventDefault();
      }
    })
  </script>

</body>

</html>