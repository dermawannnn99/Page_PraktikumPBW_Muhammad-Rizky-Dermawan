<?php
define("PAJAK", 0.15);

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$email = $_POST['email'];
$layanan = $_POST['layanan'];
$barang = $_POST['barang']; //ini array dari checkbox

//dalam bentuk array sesuai soal
$harga = [
    "Buku Tulis" => 5000,
    "Pulpen"     => 3000,
    "Penggaris"  => 4000
];

$subtotal = 0; //itung totalnya
foreach ($barang as $item) {
    $nama_input = "jumlah_" . str_replace(" ", "_", $item);
    $jumlah = $_POST[$nama_input];
    
    $subtotal = $subtotal + ($harga[$item] * $jumlah); //artiny total = harga dikali jumlahnya brp
}

if ($layanan == "Prioritas") { //kalo prioritas, bayar 10k, kalau reguler gratis
    $biaya_layanan = 10000;
} else {
    $biaya_layanan = 0; 
}

//itung totalnya + pajak
$pajak_nominal = $subtotal * PAJAK;
$total_akhir = $subtotal + $pajak_nominal + $biaya_layanan;
?>

<table class="struk" border="1">
    <h2>STRUK BELANJA</h2>
    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
    <tr><td>NIM</td><td><?php echo $nim; ?></td></tr>
    <tr><td>Subtotal</td><td><?php echo $subtotal; ?></td></tr>
    <tr><td>Pajak (15%)</td><td><?php echo $pajak_nominal; ?></td></tr>
    <tr><td>Biaya Layanan</td><td><?php echo $biaya_layanan; ?></td></tr>
    <tr><td><b>Total Akhir</b></td><td><b><?php echo $total_akhir; ?></b></td></tr>
</table>