<?php  
include "../function/secure.php";
require "../function/functions.php";
include "../function/g_time.php";

$id = $_GET["no"];
$detail_i = mysqli_query($conn, "SELECT * FROM inventaris WHERE id_inventaris = '$id' ");
// ambil data
$data_q = mysqli_fetch_assoc($detail_i);
$d_0 = $data_q["id_inventaris"];
$d_11 = $data_q["nama_inventaris"];
$d_12 = $data_q["jumlah_inventaris"];
$d_13 = $data_q["deskripsi"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../../img/telkom_logo.png">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/d_u.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Detail Peminjaman</title>
</head>
<body>
    <!-- Header -->
<h1>Detail</h1>
<!-- Card report -->
<div class="report-card">
    <div class="img-prof">
        <!-- <h1>Status Peminjaman :</h1> -->
        <img class="img-admin" src="../img/stuff.png">
        <b><p><?php echo $d_11; ?></p></b>
        
    </div>
    <div class="text_report">
    <b><p>#1 ID Inventaris : </b><?php echo $d_0; ?></p>
    <b><p>#2 Jumlah Inventaris : </b><?php echo $d_12; ?></p>
    <b><p>#3 Deskripsi Inventaris : </b><?php echo $d_13;?></b></p>
    </div>
    <a class="ok-next" href="dftr_inv.php">Kembali</a>
</div>
</body>
</html>