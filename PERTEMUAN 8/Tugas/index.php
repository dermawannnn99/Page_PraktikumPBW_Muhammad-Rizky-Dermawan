<?php

include 'nav.php';

$pages = [
    1 => "Soal No. 1 - Jenis Kendaraan (Switch",
    2 => "Soal No. 2 - Bilangan Genap (For)",
    3 => "Soal No. 3 - Daftar Hewan (Foreach)",
    4 => "Soal No. 4 - Genap atau Ganjil (Ternary)",
];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Praktikum PHP</title>
</head>
<body>
    <h2>G. Latihan Praktikum</h2>
    <nav>
        <ul>
            <?php foreach ($pages as $no => $judul): ?>
                <li>
                    <a href="soal<?= $no ?>.php"><?= $judul ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</body>
</html>