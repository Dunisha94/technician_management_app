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
        $empcode = $_POST['EmpCode'];
        $meals_str = $_POST['MealType'];
        $current_date = date('Y-m-d');
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <link rel="shortcut icon" href="./static/img/9.png" />
        <title>Technician Managment</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="./js/jquery-3.3.1.min.js"></script>
        <style>
            .form-card {
                font-size: x-large;
            }

            @media print {
                #print {
                    display: none;
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <p class="text-center" style="font-size: smaller; font-weight: bold;"><br />Technician Managment <br> Meal Sheet for the employees for the year 2023</p>
                <p class="text-center" style="font-size: smaller; font-weight: bold;">Employee Code = <?= $empcode ?></p>
                <div class="row">
                </div>
                <div class="col-8">
                    <table class=" table-bordered" style="font-size: 9px;">
                        <thead>
                            <tr>
                                <th>Employee Code</th>
                                <th>Meal Type Type</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <p>Rs.250 will be charged for lunch per day.<br />
                           Charges for the lunch taken by an employee will be deducted from the monthly salary.<br />
                           If an employee did not request lunch, the particular amount will be added to the monthly salary.
                        </p>
                        <tbody>
                            <?php
                            $empCode = $_SESSION['empCode'];
                            $sql = "select * from employeemeals where EmpCode=$empCode";
                            $stmt = mysqli_query($con, $sql);
                            // echo ("select * from empeducation where EmpCode=$empCode");
                            while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['EmpCode'] ?></td>
                                    <td><?php echo $row['MealType'] ?></td>
                                    <td><?php echo $row['Date'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Terms and Conditions -->
                <div class="text-center">
                <br />
                    <button id="print" class="btn btn-primary" style="float: left;">Print</button>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="js\printThis.js"></script>
        <script>
            $('#print').click(function() {
                $('.container').printThis({
                    debug: false, // show the iframe for debugging
                    importCSS: true, // import parent page css
                    importStyle: true, // import style tags
                    printContainer: true, // print outer container/$.selector
                    loadCSS: "", // path to additional css file - use an array [] for multiple
                    pageTitle: " ", // add title to print page
                    removeInline: false, // remove inline styles from print elements
                    removeInlineSelector: "*", // custom selectors to filter inline styles. removeInline must be true
                    printDelay: 333, // variable print delay
                    header: "<h1></h1>", // prefix to html
                    footer: null, // postfix to html
                    base: false, // preserve the BASE tag or accept a string for the URL
                    formValues: true, // preserve input/form values
                    canvas: true, // copy canvas content
                    doctypeString: '<!DOCTYPE html>', // enter a different doctype for older markup
                    removeScripts: false, // remove script tags from print content
                    copyTagClasses: true, // copy classes from the html & body tag
                    copyTagStyles: true, // copy styles from html & body tag (for CSS Variables)
                    beforePrintEvent: null, // callback function for printEvent in iframe
                    beforePrint: null, // function called before iframe is filled
                    afterPrint: null // function called before iframe is removed
                });
            })
        </script>
    </body>

    </html>
<?php }  ?>