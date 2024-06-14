<?php
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['CUST_ID']) && is_numeric($_POST['CUST_ID'])) {
        $CUST_ID = $_POST['CUST_ID'];

        // Delete related transactions first
        $stmt = $db->prepare('DELETE FROM transaction WHERE CUST_ID = ?');
        $stmt->bind_param('i', $CUST_ID);

        if ($stmt->execute()) {
            // Now delete the customer
            $stmt = $db->prepare('DELETE FROM customer WHERE CUST_ID = ?');
            $stmt->bind_param('i', $CUST_ID);

            if ($stmt->execute()) {
                echo "<script>alert('Customer and related transactions deleted successfully.'); window.location = 'customer.php';</script>";
            } else {
                echo "Error deleting customer: " . $stmt->error;
            }
        } else {
            echo "Error deleting transactions: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid customer ID.";
    }
}

mysqli_close($db);
?>
