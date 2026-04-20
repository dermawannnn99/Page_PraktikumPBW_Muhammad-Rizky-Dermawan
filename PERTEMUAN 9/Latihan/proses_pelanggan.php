<?php
include 'koneksi_db.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action === 'tambah') {
    $nama    = $_POST['nama'];
    $email   = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat  = $_POST['alamat'];

    $stmt = $conn->prepare("INSERT INTO Pelanggan (Nama, Email, Telepon, Alamat) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $email, $telepon, $alamat);

    if ($stmt->execute()) {
        header("Location: pelanggan.php?message=" . urlencode("Pelanggan berhasil ditambahkan."));
    } else {
        header("Location: pelanggan.php?message=" . urlencode("Gagal menambahkan pelanggan."));
    }
    exit;
}

if ($action === 'edit') {
    $id      = $_POST['id'];
    $nama    = $_POST['nama'];
    $email   = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat  = $_POST['alamat'];

    $stmt = $conn->prepare("UPDATE Pelanggan SET Nama=?, Email=?, Telepon=?, Alamat=? WHERE ID=?");
    $stmt->bind_param("ssssi", $nama, $email, $telepon, $alamat, $id);

    if ($stmt->execute()) {
        header("Location: pelanggan.php?message=" . urlencode("Pelanggan berhasil diupdate."));
    } else {
        header("Location: pelanggan.php?message=" . urlencode("Gagal mengupdate pelanggan."));
    }
    exit;
}

if ($action === 'hapus') {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM Pelanggan WHERE ID=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: pelanggan.php?message=" . urlencode("Pelanggan berhasil dihapus."));
    } else {
        header("Location: pelanggan.php?message=" . urlencode("Gagal menghapus pelanggan."));
    }
    exit;
}

header("Location: pelanggan.php");
exit;
?>