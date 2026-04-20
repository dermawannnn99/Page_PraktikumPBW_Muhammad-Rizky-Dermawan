<?php
include 'koneksi_db.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action === 'tambah') {
    $judul     = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $harga     = $_POST['harga'];
    $stok      = $_POST['stok'];

    $stmt = $conn->prepare("INSERT INTO Buku (Judul, Pengarang, Harga, Stok) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdi", $judul, $pengarang, $harga, $stok);

    if ($stmt->execute()) {
        header("Location: buku.php?message=" . urlencode("Buku berhasil ditambahkan."));
    } else {
        header("Location: buku.php?message=" . urlencode("Gagal menambahkan buku."));
    }
    exit;
}

if ($action === 'edit') {
    $id        = $_POST['id'];
    $judul     = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $harga     = $_POST['harga'];
    $stok      = $_POST['stok'];

    $stmt = $conn->prepare("UPDATE Buku SET Judul=?, Pengarang=?, Harga=?, Stok=? WHERE ID=?");
    $stmt->bind_param("ssdii", $judul, $pengarang, $harga, $stok, $id);

    if ($stmt->execute()) {
        header("Location: buku.php?message=" . urlencode("Buku berhasil diupdate."));
    } else {
        header("Location: buku.php?message=" . urlencode("Gagal mengupdate buku."));
    }
    exit;
}

if ($action === 'hapus') {
    $id   = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM Buku WHERE ID=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: buku.php?message=" . urlencode("Buku berhasil dihapus."));
    } else {
        header("Location: buku.php?message=" . urlencode("Gagal menghapus buku."));
    }
    exit;
}

header("Location: buku.php");
exit;
?>