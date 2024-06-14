<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../includes/connection.php');

if (isset($_POST['btnregister'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('Registration Successful');
        document.location.href = 'login.php';
        </script>";
    } else {
        echo mysqli_error($db);
    }
}

function registrasi($data) {
    global $db;

    // Ambil data dari formulir
    $username = mysqli_real_escape_string($db, $data['username']);
    $password = mysqli_real_escape_string($db, $data['password']);
    $type = mysqli_real_escape_string($db, $data['type']); // Ambil jenis pengguna

    // Hash password untuk keamanan
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Masukkan data ke database
    $query = "INSERT INTO users (username, password, TYPE_ID) VALUES ('$username', '$password', (SELECT TYPE_ID FROM type WHERE TYPE='$type'))";

    mysqli_query($db, $query);

    // Mengembalikan jumlah baris yang terpengaruh
    return mysqli_affected_rows($db);
}

$db->close();
?>
