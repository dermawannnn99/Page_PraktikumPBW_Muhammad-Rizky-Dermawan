<?php
//bikin konstanta PAJAK yang nilainya tidak bisa diubah selama program berjalan
define("PAJAK", 0.10); //sesyai intruksi soal, 10%

//menyimpan daftar barang beserta harganya
$daftar_barang = [
    ["nama" => "Keyboard",    "harga" => 150000],
    ["nama" => "Mouse",       "harga" => 100000],
    ["nama" => "Monitor LED", "harga" => 1200000],
    ["nama" => "Headset",     "harga" => 250000],
    ["nama" => "Webcam",      "harga" => 400000],
    ["nama" => "Mousepad",    "harga" => 80000]
];

$tampil_hasil = false;

//cek apakah tombol 'beli' sudah ditekan (form sudah dikirim via POST)
if (isset($_POST['beli'])) {
    $tampil_hasil = true;

    //pastiin input jumlah beli berupa angka bulat, bukan string
    $index_pilihan = (int)$_POST['pilihan_barang'];
    $jumlah_beli   = (int)$_POST['jumlah_beli'];

    //ngakses array berdasarkan index yang dikirim dari form
    $barang       = $daftar_barang[$index_pilihan];
    $nama_barang  = $barang['nama'];
    $harga_satuan = $barang['harga'];

    //itung total harga dan pajak
    $total_sebelum_pajak = $harga_satuan * $jumlah_beli;
    $nominal_pajak       = $total_sebelum_pajak * PAJAK; //pake konstanta pajak diatas tadi
    $total_bayar         = $total_sebelum_pajak + $nominal_pajak;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kasir Toko - Pertemuan 6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">

    <!-- FORM PEMBELIAN -->
    <section class="card form-card">
        <h2>Pilih Barang</h2>
        <hr>
        <form action="" method="POST">

            <div class="product-list">
                <?php foreach ($daftar_barang as $index => $item): ?>
                    <label class="product-item">
                        <input type="radio" name="pilihan_barang" value="<?= $index ?>" required>
                        <span class="item-name"><?= $item['nama'] ?></span>

                        <span class="item-price">Rp <?= number_format($item['harga'], 0, ',', '.') ?></span>
                    </label>
                <?php endforeach; ?>
            </div>

            <div class="qty-row">
                <label for="jumlah">Jumlah Beli:</label>
                <input type="number" id="jumlah" name="jumlah_beli" value="1" min="1" required>
            </div>

            <button type="submit" name="beli" class="btn-beli">Proses Pembelian</button>
        </form>
    </section>

    <!-- STRUK HASIL -->
    <section class="card struk-card">
        <h2>Struk Pembelian</h2>
        <hr>

        <?php if ($tampil_hasil): ?>
            <div class="struk-detail">
                <p>Nama Barang           : <strong><?= $nama_barang ?></strong></p>
                <p>Harga Satuan          : Rp <?= number_format($harga_satuan, 0, ',', '.') ?></p>
                <p>Jumlah Beli           : <?= $jumlah_beli ?></p>
                <p>Total (Sebelum Pajak) : Rp <?= number_format($total_sebelum_pajak, 0, ',', '.') ?></p>
                <p>Pajak (10%)           : Rp <?= number_format($nominal_pajak, 0, ',', '.') ?></p>
                <hr>
                <p class="total-bayar"><strong>Total Bayar: Rp <?= number_format($total_bayar, 0, ',', '.') ?></strong></p>
            </div>
            <!-- Reset Form -->
            <button onclick="window.location.href=window.location.href" class="btn-reset">Transaksi Baru</button>
        <?php else: ?>
            <p class="menunggu">Belum ada transaksi.</p>
        <?php endif; ?>
    </section>

</div>

</body>
</html>