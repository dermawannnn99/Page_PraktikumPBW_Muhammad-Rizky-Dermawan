<?php
session_start();

if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=Harus login dulu bro.");
    exit;
}
?>