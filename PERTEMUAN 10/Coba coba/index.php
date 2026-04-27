<?php
session_start();

if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Harus login dulu bro."));
    exit;
}
?>