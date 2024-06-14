<?php
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the product data from the request
    $products = json_decode(urldecode($_POST['products']), true);

    // Loop through each product and update the inventory
    foreach ($products as $product) {
        $productId = $product['id'];
        $quantity = $product['quantity'];

        // Decrease the stock for each product
        $sql = "UPDATE product SET ON_HAND = ON_HAND - $quantity WHERE PRODUCT_ID = '$productId'";
        if (!mysqli_query($db, $sql)) {
            // Handle error if the query fails
            echo "Error updating inventory: " . mysqli_error($db);
            exit;
        }
    }

    echo "Inventory updated successfully.";
}
?>
