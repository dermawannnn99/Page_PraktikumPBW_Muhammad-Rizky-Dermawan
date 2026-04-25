<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Mahasiswa - Form Belanja</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="proses.php">
    <link rel="stylesheet" href="struk.php">
</head>
<body>
    <div class="container">
        <h2>PENDAFTARAN BELANJA ATK - KOPERASI MAHASISWA CIHUY</h2>
        <form action="proses.php" method="POST">
            <div class="input-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" required minlength="3" placeholder="Masukkan nama lengkap">
                <br> <br>
                <label>NIM</label>
                <input type="text" name="nim" required minlength="8" maxlength="15" placeholder="Masukkan NIM">
                <br> <br>
                <label>Email</label>
                <input type="email" name="email" required placeholder="contoh@mahasiswa.ac.id">
                <br> <br>
                <label>Jenis Layanan</label>
                <select name="layanan" required>
                    <option value="">-- Pilih Layanan --</option>
                    <option value="Reguler">Reguler (Gratis)</option>
                    <option value="Prioritas">Prioritas (Biaya Rp 10.000)</option>
                </select>
            </div>

            <div class="item-selection">
                <br>
                <label>Pilih Barang & Jumlah:</label>
                <div class="item">
                    <input type="checkbox" name="barang[]" value="Buku Tulis"> Buku Tulis (Rp 5.000)
                    <input type="number" name="jumlah_Buku_Tulis" min="1" value="1">
                </div>
                <div class="item">
                    <input type="checkbox" name="barang[]" value="Pulpen"> Pulpen (Rp 3.000)
                    <input type="number" name="jumlah_Pulpen" min="1" value="1">
                </div>
                <div class="item">
                    <input type="checkbox" name="barang[]" value="Penggaris"> Penggaris (Rp 4.000)
                    <input type="number" name="jumlah_Penggaris" min="1" value="1">
                </div>
            </div>

            <br>
            <button type="submit" name="submit" class="btn-submit">Proses Pendaftaran</button>
        </form>
    </div>
</body>
</html>