<?php
include('../includes/connection.php');

if (isset($_POST['id'], $_POST['name'], $_POST['province'], $_POST['city'], $_POST['phone'])) {
    $zz = $_POST['id'];
    $name = $_POST['name'];
    $prov = $_POST['province'];
    $cit = $_POST['city'];
    $phone = $_POST['phone'];


    $query = 'UPDATE supplier e 
              JOIN location l ON l.LOCATION_ID = e.LOCATION_ID 
              SET e.COMPANY_NAME = "'.$name.'", 
                  l.PROVINCE = "'.$prov.'", 
                  l.CITY = "'.$cit.'", 
                  e.PHONE_NUMBER = "'.$phone.'" 
              WHERE e.SUPPLIER_ID = "'.$zz.'"';

    $result = mysqli_query($db, $query);

    if ($result) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Supplier</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        </head>
        <body>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script type="text/javascript">
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "You've updated the supplier successfully.",
                }).then(function() {
                    window.location = "supplier.php";
                });
            </script>
        </body>
        </html>
        <?php
    } else {

        echo "Error updating record: " . mysqli_error($db);
    }
} else {

    echo "Incomplete or invalid POST data.";
}

mysqli_close($db);
?>
