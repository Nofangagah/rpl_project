<div class="card-body col-md-3">
    <?php   
    if(!empty($_SESSION['pointofsale'])):  
        
        $total = 0;  
    
        foreach($_SESSION['pointofsale'] as $key => $product): 
            $total += ($product['quantity'] * $product['price']);
        endforeach;

    
        $tax = $total * 0.11;
        $grandTotal = $total + $tax;

     
        $sql = "SELECT CUST_ID, FIRST_NAME, LAST_NAME FROM customer ORDER BY FIRST_NAME ASC";
        $res = mysqli_query($db, $sql) or die ("Error SQL: $sql");

        $opt = "<select class='form-control'  style='border-radius: 0px;' name='customer' required>
                <option value='' disabled selected hidden>Select Customer</option>";
        while ($row = mysqli_fetch_assoc($res)) {
            $opt .= "<option value='".$row['CUST_ID']."'>".$row['FIRST_NAME'].' '.$row['LAST_NAME']."</option>";
        }
        $opt .= "</select>";
      
    ?>  
    <?php 
        echo "Today's date is : "; 
        $today = date("Y-m-d H:i a"); 
        echo $today; 
    ?> 
    <input type="hidden" name="date" value="<?php echo $today; ?>">
    <input type="hidden" name="tax" value="<?php echo $tax; ?>"> <!-- Hidden input for tax -->
    <div class="form-group row text-left mb-3">
        <div class="col-sm-12 text-primary btn-group">
            <?php echo $opt; ?>
            <a href="#" data-toggle="modal" data-target="#poscustomerModal" type="button" class="btn btn-warning bg-gradient-warning" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a>
        </div>
    </div>
    <div class="form-group row mb-2">
        <div class="col-sm-5 text-left text-primary py-2">
            <h6>Subtotal</h6>
        </div>
        <div class="col-sm-7">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                </div>
                <input type="text" class="form-control text-right" value="<?php echo number_format($total); ?>" readonly name="subtotal">
            </div>
        </div>
    </div>
    <div class="form-group row mb-2">
        <div class="col-sm-5 text-left text-primary py-2">
            <h6>Tax</h6>
        </div>
        <div class="col-sm-7">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                </div>
                <input type="text" class="form-control text-right" value="<?php echo number_format($tax); ?>" readonly name="tax">
            </div>
        </div>
    </div>
    <div class="form-group row text-left mb-2">
        <div class="col-sm-5 text-primary">
            <h6 class="font-weight-bold py-2">Total</h6>
        </div>
        <div class="col-sm-7">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                </div>
                <input type="text" class="form-control text-right" value="<?php echo number_format($grandTotal); ?>" readonly name="total">
            </div>
        </div>
    </div>
    <?php endif; ?>       
    <button type="submit" data-target="#posMODAL" data-toggle="modal" class="btn btn-block btn-warning" <?php echo empty($_SESSION['pointofsale']) ? 'disabled' : ''; ?>>Submit</button>
 
    <div class="modal fade" id="posMODAL" tabindex="-1" role="dialog" aria-labelledby="POS" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">SUMMARY</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row text-left mb-2">
                        <div class="col-sm-12 text-center">
                            <h3 class="py-0">GRAND TOTAL</h3>
                            <h3 class="font-weight-bold py-3 bg-light">Rp. <?php echo number_format($grandTotal); ?></h3>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input class="form-control text-right" id="txtNumber" onkeypress="return isNumberKey(event)" type="text" name="cash" placeholder="ENTER CASH" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning btn-block" onclick="return validatePayment()">PROCEED TO PAYMENT</button>
                </div>
            </div>
        </div>
    </div>
  
</form>
</div> 

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function validatePayment() {
    var cash = parseFloat(document.getElementById('txtNumber').value);
    var total = <?php echo $grandTotal; ?>;
    var isStockSufficient = true;
    if (cash < total) {
        Swal.fire({
            title: 'Payment Failed',
            text: 'Insufficient cash. Payment failed.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return false;
    }
   
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "check_stock.php", false); // Use synchronous request
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            if (!response.success) {
                isStockSufficient = false;
                alert(response.message);
            }
        }
    };

    var params = "products=<?php echo urlencode(json_encode($_SESSION['pointofsale'])); ?>";
    xhr.send(params);

    if (!isStockSufficient) {
        return false;
    }

 
    console.log("Sending data to update_inventory.php");

 
    var xhrUpdate = new XMLHttpRequest();
    xhrUpdate.open("POST", "update_inventory.php", true);
    xhrUpdate.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhrUpdate.onreadystatechange = function() {
        if (xhrUpdate.readyState == 4) {
            console.log("Response received: " + xhrUpdate.responseText);
            if (xhrUpdate.status == 200) {
                
                console.log("Success: " + xhrUpdate.responseText);
            } else {
                console.log("Error: " + xhrUpdate.status);
            }
        }
    };

    xhrUpdate.send(params);

    return true;
}



function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>