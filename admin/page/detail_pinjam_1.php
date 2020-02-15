<?php  
include "../function/secure.php";
require "../function/functions.php";
include "../function/g_time.php";

$id = $_GET["no"];
$detail_q = mysqli_query($conn, "SELECT * FROM pinjam WHERE no = '$id' ");
// ambil data
$data_q = mysqli_fetch_assoc($detail_q);
$d_0 = $data_q["nama_user"];
$d_1 = $data_q["nama_inventaris"];
$d_2 = $data_q["stats"];
$d_3 = $data_q["jml_barang"];
$d_4 = $data_q["guru_pendamping"];
$d_5 = $data_q["jam_pinjam"];
$d_6 = $data_q["tgl_pinjam"];
$d_7 = $data_q["jam_kembali"];
$d_8 = $data_q["tgl_kembali"];
$d_9 = $data_q["alasan"];
$d_10 = $data_q["usr-lght"];
$d_11 = $data_q["kelas"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../img/telkom_logo.png">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/d_p.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Detail Peminjaman</title>
</head>
<body>
    <!-- Header -->
<h1>Detail</h1>
<!-- Card report -->
<div class="report-card">
    <div class="img-prof">
        <h1>Status Peminjaman :</h1>
        <?php if($d_2 === '0'): ?>
        <img class="img-admin" src="../img/wit.png">
        <b><p>Menunggu Konfirmasi Anda</p></b>
        <?php endif; ?>
        <?php if($d_2 === '1' && $d_10 === '0'): ?>
        <img class="img-admin" src="../img/red.png">
        <b><p>Dipinjam - Belum dikembalikan</p></b>
        <?php endif; ?>
        <?php if($d_2 === '1' && $d_10 === '1'): ?>
        <img class="img-admin" src="../img/yellow.png">
        <b><p>Kembali - Menunggu Konfirmasi</p></b>
        <?php endif; ?>
        <?php if($d_2 === '2' && $d_10 === '1'): ?>
        <img class="img-admin" src="../img/ok.png">
        <b><p>Barang sudah Dikembalikan</p></b>
        <?php endif; ?>
        <?php if($d_2 === '2' && $d_10 === '0'): ?>
        <img class="img-admin" src="../img/ok.png">
        <b><p>Yo, thats impossible</p></b>
        <?php endif; ?>
    </div>
    <div class="text_report">
    <b><p>User <?php echo $d_0; ?> - <?php echo $d_11; ?>,</p></b>
    <b><p>#1 Inventaris Dipinjam : </b><?php echo $d_1; ?></p>
    <b><p>#2 Banyak Inventaris : </b><?php echo $d_3; ?> Barang</p>
    <b><p>#3 Tanggal dan Jam Pinjam : </b><?php echo $d_6;?> - </b><?php echo $d_5;?></p>
    <b><p>#4 Tanggal dan Jam Kembali : </b><?php echo $d_8;?> - </b><?php if($d_7 === '00:00:00'){echo "Belum diset";}else{echo $d_7;}?></p>
    <b><p>#5 Guru Pendamping : </b><?php echo $d_4; ?></p>
    <b><p>#6 Alasan : </b><?php echo $d_9; ?></p>
    </div>
    <a class="ok-next" href="ijin_konf.php">Kembali</a>
</div>
</body>
</html>