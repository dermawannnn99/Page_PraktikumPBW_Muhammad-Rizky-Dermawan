<?php
    include 'nav.php';

    $hewan = [];
    $submitted = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $submitted = true;
        $hewan = $_POST['hewan'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal nomor 3</title>
</head>
<body>
    <h2>Soal 3 - Daftar Nama Hewan menggunakan Foreach</h2>
 
    <form method="POST">
        <label>Masukkan nama hewan:</label><br>
        <input type="text" name="hewan[]" placeholder="Hewan ke-1" required><br>
        <input type="text" name="hewan[]" placeholder="Hewan ke-2"><br>
        <input type="text" name="hewan[]" placeholder="Hewan ke-3"><br>
        <button type="submit">Tampilkan</button>
    </form>

    <?php
        //cuman tampilkan hasil jika form sudah dikirim 
        if ($submitted):?>
            <p>Daftar hewan yang dimasukkan:</p>
            <ul>
                <?php foreach ($hewan as $nama): //loop foreach untuk menampilkan tiap nama hewan ?>
                    <?php if ($nama !== ''): //cuma tampilkan jika input tidak kosong ?>
                        <li><?= $nama ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <br><a href="index.php">Kembali ke menu</a>
    
</body>
</html>