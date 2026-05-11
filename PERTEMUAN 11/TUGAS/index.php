<?php
session_start();
?>

<?php include 'koneksi_db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="output.css">
    <title>Toko Buku - Dashboard</title>
</head>

<body class="bg-slate-950 min-h-screen" style="font-family:'Inter',sans-serif;">
    <?php include 'nav.php'; ?>

    <main class="max-w-6xl mx-auto px-6 py-8">

        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-indigo-600/20 via-purple-600/10 to-transparent border border-indigo-500/20 rounded-2xl p-6 mb-8">
            <p class="text-slate-400 text-sm">Selamat datang kembali,</p>
            <h1 class="text-2xl font-bold text-white mt-1"><?= htmlspecialchars($_SESSION['nama']); ?></h1>
        </div>

        <!-- Hero Section -->
        <div class="bg-slate-900/50 border border-slate-800 rounded-2xl p-8 mb-8">
            <h2 class="text-3xl font-extrabold bg-gradient-to-r from-white via-slate-200 to-slate-400 bg-clip-text text-transparent">
                Toko Buku Dashboard
            </h2>
            <p class="text-slate-400 mt-3 text-lg max-w-2xl">
                Sistem manajemen toko buku berbasis PHP dan MariaDB.
            </p>
            <div class="h-px bg-gradient-to-r from-indigo-500/40 via-purple-500/20 to-transparent my-6"></div>
            <p class="text-slate-500">
                Gunakan menu navigasi di atas untuk mengelola data pelanggan, buku, dan transaksi.
            </p>
        </div>

        <!-- Stats -->
        <?php
        $total_pelanggan = $conn->query("SELECT COUNT(*) AS total FROM Pelanggan")->fetch_assoc()['total'];
        $total_buku = $conn->query("SELECT COUNT(*) AS total FROM Buku")->fetch_assoc()['total'];
        $total_pesanan = $conn->query("SELECT COUNT(*) AS total FROM Pesanan")->fetch_assoc()['total'];
        ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Pelanggan -->
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 hover:border-indigo-500/40 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-slate-500 text-sm font-medium uppercase tracking-wider">Pelanggan</span>
                    <span class="w-10 h-10 rounded-xl bg-indigo-500/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </span>
                </div>
                <p class="text-3xl font-bold text-white"><?= $total_pelanggan ?></p>
                <p class="text-slate-600 text-sm mt-1">Total terdaftar</p>
            </div>

            <!-- Buku -->
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 hover:border-emerald-500/40 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-slate-500 text-sm font-medium uppercase tracking-wider">Buku</span>
                    <span class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </span>
                </div>
                <p class="text-3xl font-bold text-white"><?= $total_buku ?></p>
                <p class="text-slate-600 text-sm mt-1">Judul tersedia</p>
            </div>

            <!-- Pesanan -->
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 hover:border-amber-500/40 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-slate-500 text-sm font-medium uppercase tracking-wider">Pesanan</span>
                    <span class="w-10 h-10 rounded-xl bg-amber-500/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </span>
                </div>
                <p class="text-3xl font-bold text-white"><?= $total_pesanan ?></p>
                <p class="text-slate-600 text-sm mt-1">Total transaksi</p>
            </div>

        </div>

    </main>

</body>
</html>