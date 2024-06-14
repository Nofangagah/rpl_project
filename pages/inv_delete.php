<?php
include '../includes/connection.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $query = "DELETE FROM product WHERE PRODUCT_ID = '$product_id'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    if ($result) {
        ?>
        <script type="text/javascript">
            alert("Product deleted successfully.");
            window.location = "inventory.php";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Error deleting product.");
            window.location = "inventory.php";
        </script>
        <?php
    }
} else {
    ?>
    <script type="text/javascript">
        alert("Invalid product ID.");
        window.location = "inventory.php";
    </script>
    <?php
}
?>
