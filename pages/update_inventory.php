<?php
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the product data from the request
    $products = json_decode(urldecode($_POST['products']), true);

    // Loop through each product and update the inventory
    foreach ($products as $product) {
        $productId = $product['id'];
        $quantity = $product['quantity'];

        // Get the current stock for the product
        $sql = "SELECT ON_HAND FROM product WHERE PRODUCT_ID = '$productId'";
        $result = mysqli_query($db, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $currentStock = $row['ON_HAND'];

     
            $newStock = max(0, $currentStock - $quantity);

            // Update the stock for the product
            $sql = "UPDATE product SET ON_HAND = $newStock WHERE PRODUCT_ID = '$productId'";
            if (!mysqli_query($db, $sql)) {
          
                echo "Error updating inventory: " . mysqli_error($db);
                exit;
            }
        } else {
            // Handle error if the product is not found
            echo "Product not found with ID: " . $productId;
            exit;
        }
    }

    echo "Inventory updated successfully.";
}
?>
