<?php
$host = "localhost";
$user = "root"; // Username default MySQL
$pass = "";     // Password default MySQL (kosongkan jika tidak ada)
$db   = "lab_sqli";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>