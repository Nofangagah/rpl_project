<?php
include '../includes/connection.php';

$zz = $_POST['id'];
$pc = $_POST['prodcode'];
$pname = $_POST['prodname'];
$desc = $_POST['description'];
$pr = $_POST['price'];
$cat = $_POST['category'];

$query = 'UPDATE product 
          SET NAME = "'.$pname.'",
              DESCRIPTION = "'.$desc.'",
              PRICE = "'.$pr.'",
              CATEGORY_ID = "'.$cat.'"
          WHERE PRODUCT_CODE = "'.$pc.'"';

$result = mysqli_query($db, $query) or die(mysqli_error($db));

if ($result) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Product</title>
        <!-- Include SweetAlert CSS -->
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
                window.location = "product.php";
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
