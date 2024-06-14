<?php
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $supplier_id = $_POST['SUPPLIER_ID'];

    
    $sql = "DELETE FROM supplier WHERE SUPPLIER_ID = $supplier_id";

    if (mysqli_query($db, $sql)) {
        echo "<script>alert('supplier deleted successfully.'); window.location = 'supplier.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($db);
    }

    mysqli_close($db);
}
?>
