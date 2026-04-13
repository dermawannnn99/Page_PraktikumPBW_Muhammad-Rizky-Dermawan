<?php

include 'nav.php';

$jenis = "";
$jumlah_roda = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jumlah_roda = (int) $_POST['jumlah_roda'];

    switch ($jumlah_roda) {
        case 2:
            $jenis = "Sepeda Motor/ Sepeda";
            break;
        case 4:
            $jenis = "Mobil";
            break;
        case 6:
            $jenis = "Truk Kecil";
            break;
        case 8:
            $jenis = "Truk Besar";
            break;
        default:
            $jenis = "Kendaraan tidak dikenali";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal nomor 1</title>
</head>
<body>
    <h2>Soal 1 - Menentukan Jenis Kendaraan Berdasarkan Jumlah Roda</h2>
    
    <form method="post">
        <label>Masukan Jumlah roda:</label>
        <input type="number" name="jumlah_roda" min="1" value="<?=htmlspecialchars($_POST['jumlah_roda'] ?? '') ?>"required>
        <button type="submit">Cek Kendaraan</button>
        </form>
    
    <?php if ($jenis !== null): ?>
        <p>Jumlah roda: <strong><?= $jumlah_roda ?></strong></p>
        <p>Jenis kendaraan: <strong><?= $jenis ?></strong></p>
    <?php endif; ?>

    <br><a href="index.php"> Kembali ke Menu</a>
</body>
</html>