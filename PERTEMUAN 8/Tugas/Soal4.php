<?php
    include 'nav.php';

    $hasil = "";
    $angka = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $angka = (int) $_POST['angka']; 

        //ternary operator, jika sisa bagi dengan 2 abis/ =0, maka angka genap, kalau tidak maka angka ganjil
        $hasil = ($angka % 2 == 0) ? "genap" : "ganjil";
    }

    $nilaInput = htmlspecialchars($_POST['angka'] ?? '');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal nomor 4</title>
</head>
<body>
    <h2>Soal 4 - Menentukan Genap atau Ganjil dengan Ternary Operator</h2>

    <form method="post">
        <label>Masukan angka:</label>
        <input type="number" name="angka" value="<?= $nilaiInput ?>" required>
        <button type="submit">Cek</button>
    </form>

    <?php
    //hanya nampilin jika form sudah dikirim
    if ($hasil !== null): ?>
        <p>Angka : <strong><?= $angka ?></strong></p>
        <p>Hasil : <strong><?= $hasil ?></strong></p>
    <?php endif; ?>
    
    <br><a href="index.php">Kembali ke menu</a>
</body>
</html>
