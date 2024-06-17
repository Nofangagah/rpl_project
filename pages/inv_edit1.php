<?php
include '../includes/connection.php';

$zz = $_POST['idd'];
$a = $_POST['qty'];
$b = $_POST['oh'];
// $c = $_POST['up'];

$query = 'UPDATE product 
          SET QTY_STOCK = "'.$a.'", 
              ON_HAND = "'.$b.'"
          WHERE PRODUCT_ID = "'.$zz.'"';

$result = mysqli_query($db, $query) or die(mysqli_error($db));

if ($result) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Inventory</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "You've updated the product successfully.",
            }).then(function() {
                window.location = "inventory.php";
            });
        </script>
    </body>
    </html>
    <?php
} else {
   
    echo "Error updating record: " . mysqli_error($db);
}

mysqli_close($db);
?>
