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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="text/javascript">
    alert("Transaction successfully added. Your change is: <?php echo number_format($change); ?>");
    window.location = "pos.php";
</script>