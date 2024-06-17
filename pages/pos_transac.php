<?php
include '../includes/connection.php';

session_start();

$date = $_POST['date'];
$customer = $_POST['customer'];
$subtotal = $_POST['subtotal'];
$total = $_POST['total'];
$cash = $_POST['cash'];
$emp = $_POST['employee'];
$rol = $_POST['role'];
$today = date("mdGis");

$subtotal = floatval($subtotal);

// Calculate tax
$tax = $subtotal * 0.11;
$grandTotal = $subtotal + $tax;

$countID = count($_POST['name']);

switch ($_GET['action']) {
  case 'add':
    for ($i = 1; $i <= $countID; $i++) {
      $query = "INSERT INTO `transaction_details`
                (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`)
                VALUES (Null, '{$today}', '" . $_POST['name'][$i - 1] . "', '" . $_POST['quantity'][$i - 1] . "', '" . $_POST['price'][$i - 1] . "', '{$emp}', '{$rol}')";
      mysqli_query($db, $query) or die(mysqli_error($db));
    }
    
    $query111 = "INSERT INTO `transaction`
                 (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `TAX`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`)
                 VALUES (Null, '{$customer}', '{$countID}', '{$subtotal}', '{$tax}', '{$grandTotal}', '{$cash}', '{$date}', '{$today}')";
    mysqli_query($db, $query111) or die(mysqli_error($db));
    break;
}

unset($_SESSION['pointofsale']);

$change = $cash - $grandTotal;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Success</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script type="text/javascript">
        Swal.fire({
            title: 'Good job!',
            text: 'Transaction successfully added. Your change is: Rp. <?php echo number_format($change); ?>',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "pos.php";
            }
        });
    </script>
</body>
</html>
