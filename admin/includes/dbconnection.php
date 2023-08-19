<?php
$con = mysqli_connect("localhost", "root", "", "tec_managment", 3306);
if (mysqli_connect_errno()) {
  echo "Connection Fail" . mysqli_connect_error();
}
