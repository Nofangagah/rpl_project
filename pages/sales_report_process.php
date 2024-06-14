<?php
include '../includes/connection.php';

function format_rupiah($number) {
    return 'Rp ' . number_format($number, 3, ',', '.'); 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start_date = $_POST['start-date'];
    $end_date = $_POST['end-date'];

    if (!empty($start_date) && !empty($end_date)) {
        // Convert date format to match MySQL date format if needed
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));

        // Debug: Print the query
        $query = "SELECT TRANS_ID, NUMOFITEMS, SUBTOTAL, CASH, CUST_ID, GRANDTOTAL, DATE FROM transaction WHERE DATE(DATE) BETWEEN '$start_date' AND '$end_date'";
      
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        // Debug: Check number of rows returned
      
        if ($result && mysqli_num_rows($result) > 0) {
            $grand_total = 0;
            $profit = 0;
            ?>
            <!doctype html>
            <html lang="en-US">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <title>Sales Report</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
                <link rel="icon" href="../img/logodepan.jpg">

                <style>
                    @media print {
                        html, body {
                            font-size: 9.5pt;
                            margin: 0;
                            padding: 0;
                            justify-content: center;
                        }
                        .page-break {
                            page-break-before: always;
                            width: auto;
                            margin: auto;
                        }
                    }
                    .page-break {
                        width: 980px;
                        margin: 0 auto;
                    }
                    .sale-head {
                        margin: 40px 0;
                        text-align: center;
                    }
                    .sale-head h1, .sale-head strong {
                        padding: 10px 20px;
                        display: block;
                    }
                    .sale-head h1 {
                        margin: 0;
                        border-bottom: 1px solid #212121;
                    }
                    .table>thead:first-child>tr:first-child>th {
                        border-top: 1px solid #000;
                    }
                    table thead tr th {
                        text-align: center;
                        border: 1px solid #ededed;
                    }
                    table tbody tr td {
                        vertical-align: middle;
                    }
                    .sale-head, table.table thead tr th, table tbody tr td, table tfoot tr td {
                        border: 1px solid #212121;
                    }
                    .sale-head h1, table thead tr th, table tfoot tr td {
                        background-color: #f8f8f8;
                    }
                    table tbody tr td {
                        word-wrap: break-word;
                    }
                </style>
            </head>
            <body>
                <div class="page-break">
                    <div class="sale-head pull-right">
                        <h1>Sales Report</h1>
                        <strong><?php echo htmlspecialchars($start_date); ?> To <?php echo htmlspecialchars($end_date); ?></strong>
                    </div>
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Transaction ID</th>
                                <th>Number of Items</th>
                                <th>Subtotal</th>
                                <th>Customer ID</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['DATE']); ?></td>
                                    <td class="desc">
                                        <h6><?php echo htmlspecialchars(ucfirst($row['TRANS_ID'])); ?></h6>
                                    </td>
                                    <td class="text-right"><?php echo htmlspecialchars($row['NUMOFITEMS']); ?></td>
                                    <td class="text-right"><?php echo format_rupiah(floatval($row['SUBTOTAL'])); ?></td>
                                    <td class="text-right"><?php echo htmlspecialchars($row['CUST_ID']); ?></td>
                                    <td class="text-right"><?php echo format_rupiah(floatval($row['SUBTOTAL'])); ?></td>
                                </tr>
                                <?php
                                $grand_total += floatval($row['GRANDTOTAL']);
                                $profit += floatval($row['CASH']) - floatval($row['SUBTOTAL']);
                                ?>
                            <?php endwhile; ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-right">
                                <td colspan="5">Grand Total</td>
                                <td><?php echo format_rupiah($grand_total); ?></td>
                            </tr>
                            <tr class="text-right">
                                <td colspan="5">Profit</td>
                                <td><?php echo format_rupiah($profit); ?></td> 
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </body>
            </html>
            <?php
        } else {
            echo "<p>No sales found for the selected date range.</p>";
        }
    } else {
        echo "<p>Please select both start and end dates.</p>";
    }
}
?>
