<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan php</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Nama</label>
        <input type="text" name="nama"> <br><br>

        <label for="">Nilai</label>
        <input type="number" name="nilai"> <br><br>

        <button type="submit">Submit</button>
    </form>

<?php
    $name = $_POST['nama'];
    $number = $_POST['nilai'];
    $predikat = "";
    $status = "";

    if ($number >= 85 && $number <= 100) {
        $predikat = "A";
        $status = "Lulus";

    } else if ($number >= 75 && $number <= 84) {
        $predikat = "B";
        $status = "Lulus";
    } else if ($number >= 65 && $number <= 74 ) {
        $predikat = "C";
        $status = "Lulus";
    } else if ($number >= 50 && $number <= 64) {
        $predikat = "D";
        $status = "Lulus";
    } else if ($number >= 0 && $number <= 49) {
        $predikat = "E";
        $status = "Tidak Lulus";
    }
?>
    <h2>====Hasil Outputnya====</h2>
    <p>Nama : <?php echo $name ?> </p>
    <p>Nilai: <?php echo $number ?> </p>
    <p>Predikat : <?php echo $predikat ?> </p>
    <p>Status : <?php echo $status ?> </p>
</body>
</html>