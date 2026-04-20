<?php
include 'koneksi.php';

$login_status = null;
$error_msg = null;
$data = null;

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // --- MODE LAB ---
    
    // OPSI 1: VERSI RENTAN SQL INJECTION
    // Query ini menggabungkan variabel langsung tanpa sanitasi
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $login_status = "success";
        $data = $result->fetch_assoc();
    } else {
        $login_status = "failed";
        $error_msg = $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Login Lab Keamanan</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .container { display: flex; background: white; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); overflow: hidden; width: 850px; min-height: 450px; }
        
        /* Form Login */
        .login-box { padding: 40px; width: 60%; }
        .login-box h2 { margin-top: 0; color: #1c1e21; font-size: 24px; }
        .input-group { margin-bottom: 20px; }
        .input-group label { display: block; margin-bottom: 8px; color: #4b4f56; font-weight: 600; }
        .input-group input { width: 100%; padding: 12px; border: 1px solid #dddfe2; border-radius: 6px; box-sizing: border-box; font-size: 14px; }
        .input-group input:focus { border-color: #1877f2; outline: none; box-shadow: 0 0 0 2px #e7f3ff; }
        button { width: 100%; padding: 12px; background: #42b72a; border: none; color: white; border-radius: 6px; cursor: pointer; font-size: 17px; font-weight: bold; transition: 0.3s; }
        button:hover { background: #36a420; }

        /* Sidebar Info */
        .sidebar { background: #2c3e50; color: #ecf0f1; padding: 40px; width: 40%; font-size: 14px; line-height: 1.6; }
        .sidebar h3 { color: #f1c40f; margin-top: 0; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px; }
        .sidebar code { background: #1a252f; padding: 4px 8px; border-radius: 4px; color: #e74c3c; display: inline-block; margin: 5px 0; font-family: 'Courier New', Courier, monospace; font-weight: bold; }
        .sidebar .payload-box { background: #34495e; padding: 15px; border-left: 4px solid #f1c40f; margin-top: 10px; }

        /* Alert */
        .alert { padding: 15px; border-radius: 6px; margin-bottom: 20px; font-size: 14px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

<div class="container">
    <div class="login-box">
        <h2>Login Dashboard</h2>

        <?php if ($login_status === "success"): ?>
            <div class="alert success">
                <strong>✓ Login Berhasil!</strong><br>
                Selamat datang, <b><?php echo htmlspecialchars($data['username']); ?></b>!<br>
                Hak Akses: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $data['role']; ?></span>
            </div>
        <?php elseif ($login_status === "failed"): ?>
            <div class="alert danger">
                <strong>✕ Login Gagal!</strong> Username atau password salah.
                <?php if($error_msg) echo "<br><small style='color: #444;'>SQL Error: $error_msg</small>"; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required placeholder="Contoh: admin" autocomplete="off">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Masukkan password">
            </div>
            <button type="submit" name="login">Masuk Sekarang</button>
        </form>
    </div>

    <div class="sidebar">
        <h3>SQLi Lab Guide</h3>
        
        <p><b>1. Login Normal:</b><br>
        Gunakan kredensial berikut:</p>
        <code>User: admin</code><br>
        <code>Pass: rahasia_super_123</code>

        <div class="payload-box">
            <p><b>2. Serangan SQL Injection:</b><br>
            Coba masukkan payload ini di kolom <b>Username</b> (password bebas):</p>
            <code>admin' -- </code>
            <p><small>*Pastikan ada spasi setelah --</small></p>
        </div>

        <p style="margin-top: 20px; font-size: 12px; color: #95a5a6;">
            <i>Catatan: Lab ini hanya untuk tujuan edukasi keamanan siber.</i>
        </p>
    </div>
</div>

</body>
</html>