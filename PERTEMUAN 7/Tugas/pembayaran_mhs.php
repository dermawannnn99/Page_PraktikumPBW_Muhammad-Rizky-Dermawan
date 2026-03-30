<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur Menu Diskon Pembayaran Mahasiswa</title>
</head>
<body>
    <form action="" method="post">

    <p>Jika mahasiswa membayar ukt >= Rp 5.000.000,- maka diskon 10%</p>
    <p>Jika mahasiswa membayar ukt >= Rp 5.000.000,- dan > 8 semester maka diskonnya ditambah 5% menjadi 15%</p> 
    <h2><b>Fitur Menu Diskon Pembayaran Mahasiswa</b></h2>
    <hr><br>
        <div class="form-group">
            <label>NPM</label>
            <input type="number" name="NPM" required>

            <label>NAMA</label>
            <input type="text" name="nama" required>

            <label>PRODI</label>
            <input type="text" name="prodi" required>

            <label>SEMESTER</label>
            <input type="number" name="semester" required>

            <label>BIAYA UKT</label>
            <input type="number" name="biaya_ukt" required>

            <br>
            <button type="submit"><b>SUBMIT</b></button>
        </div>
    </form>

    <?php
        $npm = $_POST['NPM'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $semester = $_POST['semester'];
        $biaya_ukt = $_POST['biaya_ukt'];
        $diskon = "";
        $bayar = "";

        if ($biaya_ukt >= 5000000 && $semester > 8) { //jika ukt nya 5jt ketas dan smt 8, maka diskonnya 15%
        $diskon = 15;
        } else if ($biaya_ukt >= 5000000) { //kalau ukt nya 5jt keatas dan smt 8 kebawah, diskonnya 10%
            $diskon = 10;
        } else {
            $diskon = 0; //jika biaya ukt nya dibawah 5jt, tdak dapat diskon
        }

        $bayar = $biaya_ukt - ($biaya_ukt * $diskon / 100); //total yg harus dobayar = biaya ukt - potongan diskon

        echo "<b>====== HASIL OUTPUT ======</b><br>";
        echo "<b>NPM :</b> $npm <br>";
        echo "<b>Nama :</b> $nama <br>";
        echo "<b>Prodi :</b> $prodi <br>";
        echo "<b>Semester :</b> $semester <br>";
        echo "<b>Biaya UKT :</b> Rp $biaya_ukt <br>";
        echo "<b>Diskon :</b> $diskon% <br>";
        echo "<b>Total Bayar :</b> Rp $bayar <br>";
    ?>
</body>
</html>