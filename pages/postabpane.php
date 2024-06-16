<!-- Tab panes -->
<div class="tab-content">
  <!-- 1ST TAB -->
  <div class="tab-pane fade in mt-2" id="Keyboard">
    <div class="row">
      <?php $query = 'SELECT * FROM product WHERE CATEGORY_ID=0 ';
      $result = mysqli_query($db, $query);

      if ($result) :
        if (mysqli_num_rows($result) > 0) :
          while ($product = mysqli_fetch_assoc($result)) :
            $disabled = $product['ON_HAND'] == 0 ? 'disabled' : '';
          
      ?>
            <div class="col-sm-4 col-md-2">
              <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                <div class="products">
                  <h6 class="text-warning"><?php echo $product['NAME']; ?></h6>
                  <h6>Product Code: <?php echo $product['PRODUCT_CODE']; ?></h6>
                  <h6>Rp. <?php echo $product['PRICE']; ?></h6>
                  <input type="text" name="quantity" class="form-control" value="1" />
                  <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                  <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                  <input type="hidden" name="code" value="<?php echo $product['PRODUCT_CODE']; ?>">
                  <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-warning" value="Add" <?php echo $disabled; ?> />
                  <?php if($disabled): ?>
                    <span class="text-danger">OUT OF STOCK</span>
                    <?php endif;?>
                </div>
              </form>
            </div>
          <?php endwhile; ?>
    </div>
  </div>
<?php
        endif;
      endif;
?>
<!-- 2ND TAB -->
<div class="tab-pane fade in mt-2" id="Mouse">
  <div class="row">
    <?php $query = 'SELECT * FROM product WHERE CATEGORY_ID=1 ';
    $result = mysqli_query($db, $query);

    if ($result) :
      if (mysqli_num_rows($result) > 0) :
        while ($product = mysqli_fetch_assoc($result)) :
          $disabled = $product['ON_HAND'] == 0 ? 'disabled' : '';
         
    ?>
          <div class="col-sm-4 col-md-2">
            <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
              <div class="products">
                <h6 class="text-warning"><?php echo $product['NAME']; ?></h6>
                <h6>Product Code: <?php echo $product['PRODUCT_CODE']; ?></h6>
                <h6>Rp. <?php echo $product['PRICE']; ?></h6>
                <input type="text" name="quantity" class="form-control" value="1" />
                <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                <input type="hidden" name="code" value="<?php echo $product['PRODUCT_CODE']; ?>">
                <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-warning" value="Add" <?php echo $disabled; ?> />
                <?php if($disabled): ?>
                  <span class="text-danger">OUT OF STOCK</span>
                  <?php endif;?>
              </div>
            </form>
          </div>
    <?php endwhile;
      endif;
    endif;
    ?>
  </div>
</div>
<!-- 3rd TAB -->
<div class="tab-pane fade in mt-2" id="Headset">
  <div class="row">
    <?php $query = 'SELECT * FROM product WHERE CATEGORY_ID=6';
    $result = mysqli_query($db, $query);

    if ($result) :
      if (mysqli_num_rows($result) > 0) :
        while ($product = mysqli_fetch_assoc($result)) :
          $disabled = $product['ON_HAND'] == 0 ? 'disabled' : '';
    ?>
          <div class="col-sm-4 col-md-2">
            <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
              <div class="products">
                <h6 class="text-warning"><?php echo $product['NAME']; ?></h6>
                <h6>Product Code: <?php echo $product['PRODUCT_CODE']; ?></h6>
                <h6>Rp. <?php echo $product['PRICE']; ?></h6>
                <input type="text" name="quantity" class="form-control" value="1" />
                <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-warning" value="Add" <?php echo $disabled; ?> />
                <?php if($disabled): ?>
                  <span class="text-danger">OUT OF STOCK</span>
                  <?php endif;?>
              </div>
            </form>
          </div>
    <?php endwhile;
      endif;
    endif;
    ?>
  </div>
</div>

<!-- 8th TAB -->
<div class="tab-pane fade in mt-2" id="others">
  <div class="row">
    <?php $query = 'SELECT * FROM product WHERE CATEGORY_ID=9';
    $result = mysqli_query($db, $query);

    if ($result) :
      if (mysqli_num_rows($result) > 0) :
        while ($product = mysqli_fetch_assoc($result)) :
          $disabled = $product['ON_HAND'] == 0 ? 'disabled' : '';
    ?>
          <div class="col-sm-4 col-md-2">
            <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
              <div class="products">
                <h6 class="text-warning"><?php echo $product['NAME']; ?></h6>
                <h6>Product Code : <?php echo $product['PRODUCT_CODE']; ?></h6>
                <h6>Rp. <?php echo $product['PRICE']; ?></h6>
                <input type="text" name="quantity" class="form-control" value="1" />
                <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                <input type="hidden" name="code" value="<?php echo $product['PRODUCT_CODE']; ?>">
                <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-warning" value="Add" <?php echo $disabled; ?> />
                <?php if($disabled): ?>
                  <span class="text-danger">OUT OF STOCK</span>
                  <?php endif;?>
              </div>
            </form>
          </div>
    <?php endwhile;
      endif;
    endif;
    ?>
  </div>
</div>

</div>
</div>

</div>
</div>
</div>