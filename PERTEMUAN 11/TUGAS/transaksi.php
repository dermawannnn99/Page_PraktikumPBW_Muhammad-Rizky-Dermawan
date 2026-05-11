<?php
include 'koneksi_db.php';
include 'proteksi.php';

$message         = $_GET['message'] ?? '';
$pelanggan_result = $conn->query("SELECT ID, Nama FROM Pelanggan");
$buku_result      = $conn->query("SELECT ID, Judul FROM Buku WHERE Stok > 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Transaksi</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container mt-4">
        <h2>Buat Pesanan</h2>

        <?php if ($message): ?>
            <div class="alert alert-info alert-dismissible fade show">
                <?= htmlspecialchars($message) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <form action="proses_transaksi.php" method="POST">
            <div class="mb-3">
                <label for="pelanggan_id" class="form-label">Pilih Pelanggan</label>
                <select class="form-select" name="pelanggan_id" id="pelanggan_id" required>
                    <option value="">Pilih Pelanggan</option>
                    <?php while ($row = $pelanggan_result->fetch_assoc()): ?>
                    <option value="<?= $row['ID'] ?>"><?= $row['Nama'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <h3>Daftar Buku</h3>
            <div class="mb-3">
                <label for="buku_id" class="form-label">Pilih Buku</label>
                <select class="form-select" name="buku[1][id]" id="buku_id" required>
                    <option value="">Pilih Buku</option>
                    <?php while ($row = $buku_result->fetch_assoc()): ?>
                    <option value="<?= $row['ID'] ?>"><?= $row['Judul'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="kuantitas" class="form-label">Jumlah Buku</label>
                <input type="number" class="form-control" id="kuantitas" name="buku[1][kuantitas]" required min="1">
            </div>

            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>