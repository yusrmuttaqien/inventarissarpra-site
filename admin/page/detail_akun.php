<?php  
include "../function/secure.php";
require "../function/functions.php";
include "../function/g_time.php";

$id = $_GET["no"];
$detail_q = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id' ");
// ambil data
$data_q = mysqli_fetch_assoc($detail_q);
$d_0 = $data_q["username"];
$d_11 = $data_q["kelas"];
$d_12 = $data_q["email"];
$d_13 = $data_q["dp"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../img/telkom_logo.png">
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
        <img class="img-admin" src="../../img/<?php echo $d_13; ?>">
        <b><p><?php echo $d_0; ?></p></b>
        
    </div>
    <div class="text_report">
    <b><p>#1 ID User : </b><?php echo $id; ?></p>
    <b><p>#2 Kelas : </b><?php echo $d_11; ?></p>
    <b><p>#3 Email : </b><?php echo $d_12;?></b></p>
    </div>
    <a class="ok-next" href="user.php">Kembali</a>
</div>
</body>
</html>