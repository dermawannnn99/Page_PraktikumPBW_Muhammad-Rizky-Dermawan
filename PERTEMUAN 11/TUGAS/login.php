<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Toko Buku</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="output.css">
</head>

<body class="bg-slate-950 min-h-screen flex" style="font-family:'Inter',sans-serif;">

    <!-- Left Panel - Branding (hidden on mobile) -->
    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden flex-col justify-between p-12 bg-gradient-to-br from-indigo-700 via-purple-700 to-violet-900">
        <!-- Decorative blobs -->
        <div class="absolute top-16 left-8 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-16 right-8 w-80 h-80 bg-purple-400/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 w-40 h-40 bg-indigo-300/10 rounded-full blur-2xl"></div>

        <div class="relative z-10">
            <h1 class="text-3xl font-bold text-white">Toko Buku</h1>
            <p class="text-indigo-200 mt-1 text-sm">Sistem Manajemen</p>
        </div>

        <div class="relative z-10">
            <h2 class="text-4xl font-extrabold text-white leading-tight">
                Kelola toko buku<br>dengan mudah.
            </h2>
            <p class="text-indigo-200 mt-4 text-lg leading-relaxed max-w-md">
                Sistem manajemen lengkap untuk data pelanggan, inventaris buku, dan transaksi penjualan.
            </p>
        </div>

        <p class="relative z-10 text-indigo-300 text-sm">
            &copy; <?= date('Y') ?> Toko Buku - Admin Panel
        </p>
    </div>

    <!-- Right Panel - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
        <div class="w-full max-w-md">

            <!-- Mobile-only branding -->
            <div class="lg:hidden text-center mb-10">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                    Toko Buku
                </h1>
                <p class="text-slate-500 text-sm mt-1">Sistem Manajemen</p>
            </div>

            <h3 class="text-2xl font-bold text-white mb-2">Masuk ke akun Anda</h3>
            <p class="text-slate-500 mb-8">Silakan masukkan kredensial untuk melanjutkan</p>

            <?php if (isset($_GET['message'])): ?>
                <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-lg mb-6 text-sm">
                    <?= htmlspecialchars($_GET['message']) ?>
                </div>
            <?php endif; ?>

            <form method="post" action="proses_login.php" class="space-y-5">
                <div>
                    <label for="userInput" class="block text-sm font-medium text-slate-400 mb-2">Username</label>
                    <input type="text" name="username" id="userInput" required
                           class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-lg text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                           placeholder="Masukkan username">
                </div>

                <div>
                    <label for="passInput" class="block text-sm font-medium text-slate-400 mb-2">Password</label>
                    <input type="password" name="password" id="passInput" required
                           class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-lg text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                           placeholder="Masukkan password">
                </div>

                <button type="submit"
                        class="w-full py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-lg transition-all duration-200 shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 cursor-pointer">
                    MASUK
                </button>

                <div class="text-center">
                    <a href="#" class="text-sm text-slate-500 hover:text-indigo-400 transition">Lupa Password?</a>
                </div>
            </form>

            <!-- Mobile-only footer -->
            <p class="lg:hidden text-center text-slate-600 mt-10 text-xs">
                &copy; <?= date('Y') ?> Admin Panel
            </p>
        </div>
    </div>

</body>
</html>