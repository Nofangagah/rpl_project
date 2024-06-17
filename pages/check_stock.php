<?php
include '../includes/connection.php';

$data = json_decode(urldecode($_POST['products']), true);
$response = ['success' => true, 'message' => ''];

foreach ($data as $product) {
  $product_id = $product['id'];
  $quantity = $product['quantity'];

  $query = "SELECT ON_HAND FROM product WHERE PRODUCT_ID='$product_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);

  if ($row['ON_HAND'] < $quantity) {
    $response['success'] = false;
    $response['message'] = "Stok untuk produk ID $product_id tidak mencukupi.";
    break;
  }
}

echo json_encode($response);
?>
