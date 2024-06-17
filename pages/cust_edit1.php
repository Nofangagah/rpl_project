<?php
include('../includes/connection.php');
$zz = $_POST['id'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$phone = $_POST['phone'];

$query = 'UPDATE customer SET FIRST_NAME ="'.$fname.'",
          LAST_NAME ="'.$lname.'", PHONE_NUMBER="'.$phone.'" WHERE
          CUST_ID ="'.$zz.'"';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// Check if update was successful
if ($result) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Customer</title>
        <!-- Include SweetAlert CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "You've updated the customer successfully.",
            }).then(function() {
                window.location = "customer.php";
            });
        </script>
    </body>
    </html>
    <?php
} else {
    // Handle update failure (optional)
    echo "Error updating record: " . mysqli_error($db);
}

// Close connection
mysqli_close($db);
?>
