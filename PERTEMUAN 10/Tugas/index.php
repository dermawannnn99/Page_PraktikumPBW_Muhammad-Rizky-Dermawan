<?php
session_start();


?>

<?php include 'koneksi_db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Toko Buku - Home</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container mt-4">
        <!-- Halo User -->
        <div class="alert alert-info">
            Halo, <b><?= htmlspecialchars($_SESSION['nama']); ?></b> !👋
        </div>

        <div class="jumbotron bg-light p-5 rounded">
            <h1 class="display-4">Selamat Datang di Toko Buku</h1>
            <p class="lead">Sistem manajemen toko buku berbasis PHP dan MariaDB.</p>
            <hr class="my-4">
            <p>Gunakan menu navigasi di atas untuk mengelola data pelanggan, buku, dan transaksi.</p>
    </div>

        <div class="row mt-4">
            <?php
            $total_pelanggan = $conn->query("SELECT COUNT(*) AS total FROM Pelanggan")->fetch_assoc()['total'];
            $total_buku = $conn->query("SELECT COUNT(*) AS total FROM Buku")->fetch_assoc()['total'];
            $total_pesanan = $conn->query("SELECT COUNT(*) AS total FROM Pesanan")->fetch_assoc()['total'];
            ?>
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Pelanggan</div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $total_pelanggan ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Buku</div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $total_buku ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Total Pesanan</div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $total_pesanan ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>