<?php
include '../includes/connection.php';

$zz = $_POST['id'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$gen = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$hdate = $_POST['hireddate'];
$prov = $_POST['province'];
$cit = $_POST['city'];

$query = 'UPDATE employee e 
          JOIN location l ON l.LOCATION_ID = e.LOCATION_ID 
          SET e.FIRST_NAME = "'.$fname.'",
              e.LAST_NAME = "'.$lname.'",
              e.GENDER = "'.$gen.'",
              e.EMAIL = "'.$email.'",
              e.PHONE_NUMBER = "'.$phone.'",
              e.HIRED_DATE = "'.$hdate.'",
              l.PROVINCE = "'.$prov.'",
              l.CITY = "'.$cit.'"
          WHERE e.EMPLOYEE_ID = "'.$zz.'"';

$result = mysqli_query($db, $query) or die(mysqli_error($db));

if ($result) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Employee</title>
        <!-- Include SweetAlert CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "You've updated the employee successfully.",
            }).then(function() {
                window.location = "employee.php";
            });
        </script>
    </body>
    </html>
    <?php
} else {
    // Handle update failure (optional)
    echo "Error updating record: " . mysqli_error($db);
}

mysqli_close($db);
?>
