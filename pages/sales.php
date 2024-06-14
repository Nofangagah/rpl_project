<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
  $(document).ready(function(){
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });
  });
</script>

<div class="row">
  <div class="col-md-6">
    Sales Report
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel">
      <div class="panel-heading">
      </div>
      <div class="panel-body">
          <form class="clearfix" method="post" action="sales_report_process.php">
            <div class="form-group">
              <label class="form-label">Date Range</label>
                <div class="input-group">
                  <input type="text" class="datepicker form-control" name="start-date" placeholder="From">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-menu-right"></i></span>
                  <input type="text" class="datepicker form-control" name="end-date" placeholder="To">
                </div>
            </div>
            <div class="form-group">
                 <button type="submit" name="submit" class="btn btn-warning">Generate Report</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
</body>
</html> 
