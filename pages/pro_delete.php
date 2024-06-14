<?php
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];

    // SQL to delete a record
    $sql = "DELETE FROM product WHERE PRODUCT_ID = $product_id";

    if (mysqli_query($db, $sql)) {
        echo "<script>alert('Product deleted successfully.'); window.location = 'product.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($db);
    }

    mysqli_close($db);
}
?>
