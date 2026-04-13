<?php

include 'nav.php';

$hasil = [];
$batas = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $batas = (int) $_POST['batas'];

    //mulai dari 2, selama $i <= batas, naik 2 srtiap iterasinya
    for ($i = 2; $i <= $batas; $i += 2) {
        $hasil[] = $i;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal nomor 2</title>
</head>
<body>
    <h2>Soal 2 - Mencetak Bilangan Genap dari 2 sampai N</h2>

    <form method="post">
        <label>Masukan batas angka</label>
        <input type="number" name="batas" min="2" value="<?= htmlspecialchars($_POST['batas'] ?? '') ?>" required>
        <button type="submit">Tampilkan</button>
    </form>

    <?php if ($batas !== null): //cuma tampilkan hasil jika form sudah dikirim ?>
        <p>Bilangan genap dari 2 sampai <?= $batas ?>:</p>
        <?php if (!empty($hasil)): //ngcek apakah array hasil tidak kosong ?>
            <?php foreach ($hasil as $angka): //tampilkan tiap bilangan genap ?>
                <?= $angka ?><br>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada bilangan genap dalam rentang ini.</p>
        <?php endif; ?>
    <?php endif; ?>
    
    <br><a href="index.php">Kembali ke menu</a>
</body>
</html>