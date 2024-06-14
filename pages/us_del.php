<?php
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['ID'];

    // SQL to delete a record
    $sql = "DELETE FROM users WHERE ID = $user_id";

    if (mysqli_query($db, $sql)) {
        echo "<script>alert('user  deleted successfully.'); window.location = 'user.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($db);
    }

    mysqli_close($db);
}
?>
