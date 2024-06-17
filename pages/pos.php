<?php
// Include file koneksi dan file topp.php
ob_start();
include '../includes/connection.php';
include '../includes/topp.php';

function formatRupiah($number)
{
  return "Rp " . number_format($number, 0, ',', '.');
}

$product_ids = array();

if (filter_input(INPUT_POST, 'addpos')) {
  $product_id = filter_input(INPUT_GET, 'id');
  $quantity = filter_input(INPUT_POST, 'quantity');

 
  $query = "SELECT * FROM product WHERE PRODUCT_ID='$product_id'";
  $result = mysqli_query($db, $query);
  $product = mysqli_fetch_assoc($result);

  if ($product['ON_HAND'] >= $quantity) {
    if (isset($_SESSION['pointofsale'])) {
      $count = count($_SESSION['pointofsale']);

     
      $product_ids = array_column($_SESSION['pointofsale'], 'id');

    
      if (!in_array(filter_input(INPUT_POST, 'id'), $product_ids)) {
        
        $_SESSION['pointofsale'][$count] = array(
          'id' => filter_input(INPUT_GET, 'id'),
          'name' => filter_input(INPUT_POST, 'name'),
          'price' => filter_input(INPUT_POST, 'price'),
          'quantity' => filter_input(INPUT_POST, 'quantity')
        );
      } else {
      
        foreach ($_SESSION['pointofsale'] as &$product) {
          if ($product['id'] == filter_input(INPUT_POST, 'id')) {
            $product['quantity'] += filter_input(INPUT_POST, 'quantity');
          }
        }
      }
    } else {
      
      $_SESSION['pointofsale'][0] = array(
        'id' => filter_input(INPUT_GET, 'id'),
        'name' => filter_input(INPUT_POST, 'name'),
        'price' => filter_input(INPUT_POST, 'price'),
        'quantity' => filter_input(INPUT_POST, 'quantity')
      );
    }
  } else {
    echo "<script>alert('Stock is insufficient. Only " . $product['ON_HAND'] . " left in stock.');</script>";
  }

  
  header("Location: pos.php");
  exit();
}

if (filter_input(INPUT_GET, 'action') == 'delete') {
  $delete_id = filter_input(INPUT_GET, 'id');

  foreach ($_SESSION['pointofsale'] as $key => $product) {
    if ($product['id'] == $delete_id) {
      unset($_SESSION['pointofsale'][$key]);
      break;
    }
  }

  header("Location: pos.php");
  exit();
}

function pre_r($array)
{
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}
?>
<div class="row">
  <div class="col-lg-12">
    <div class="card shadow mb-0">
      <div class="card-header py-2">
        <h4 class="m-1 text-lg text-primary">Product category</h4>
      </div>
      <!-- /.panel-heading -->
      <div class="card-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="#" data-target="#Keyboard" data-toggle="tab" style="color: black;">Sparepart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-target="#Mouse" data-toggle="tab" style="color:black;">Accesories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Headset" data-toggle="tab" style="color:black;">Gasoline</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#others" data-toggle="tab">Others</a>
          </li>
        </ul>

        <?php include 'postabpane.php'; ?>

        <div style="clear:both"></div>
        <br />
        <div class="card shadow mb-4 col-md-12">
          <div class="card-header py-3 bg-white">
            <h4 class="m-2 font-weight-bold text-primary">Point of Sale</h4>
          </div>

          <div class="row">
            <div class="card-body col-md-9">
              <div class="table-responsive">

                <!-- trial form lang   -->
                <form role="form" method="post" action="pos_transac.php?action=add">
                  <input type="hidden" name="employee" value="<?php echo $_SESSION['FIRST_NAME']; ?>">
                  <input type="hidden" name="role" value="<?php echo $_SESSION['JOB_TITLE']; ?>">

                  <table class="table">
                    <tr>
                      <th width="55%">Product Name</th>
                      <th width="10%">Quantity</th>
                      <th width="15%">Price</th>
                      <th width="15%">Total</th>
                      <th width="5%">Action</th>
                    </tr>
                    <?php
                    if (!empty($_SESSION['pointofsale'])) :
                      $total = 0;
                      foreach ($_SESSION['pointofsale'] as $key => $product) :
                    ?>
                        <tr>
                          <td>
                            <input type="hidden" name="name[]" value="<?php echo $product['name']; ?>">
                            <?php echo $product['name']; ?>
                          </td>
                          <td>
                            <input type="hidden" name="quantity[]" value="<?php echo $product['quantity']; ?>">
                            <?php echo $product['quantity']; ?>
                          </td>
                          <td>
                            <input type="hidden" name="price[]" value="<?php echo $product['price']; ?>">
                            <?php echo formatRupiah($product['price'],) ?>
                          </td>
                          <td>
                            <input type="hidden" name="total" value="<?php echo $product['quantity'] * $product['price']; ?>">
                            <?php echo formatRupiah($product['quantity'] * $product['price'],); ?>
                          </td>
                          <td>
                            <a href="pos.php?action=delete&id=<?php echo $product['id']; ?>">
                              <div class="btn bg-gradient-danger btn-danger"><i class="fas fa-fw fa-trash"></i></div>
                            </a>
                          </td>
                        </tr>
                      <?php
                        $total = $total + ($product['quantity'] * $product['price']);
                      endforeach;
                      ?>
                    <?php endif; ?>
                  </table>
              </div>
            </div>

            <?php
            ob_end_flush();
            include 'posside.php';
            include '../includes/footer.php';
            ?>
