<?php 
include "../function/secure.php";
require "../function/functions.php";
include "../function/g_time.php";

$_SESSION["barang_not_found"]=null;
$_SESSION["barang_out_stock"]=null;

$inventaris = mysqli_query($conn, "SELECT * FROM inventaris WHERE jumlah_inventaris !=0 ORDER BY no DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../img/telkom_logo.png">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Akun Anda</title>
</head>
<body>
    <!-- top nav -->
    <div class="top-nav">
        <img src="../img/admin_1.png" href=>
        <div class="nav-p">
        <b><p><?php echo $res; ?>, <?php echo $_SESSION["fl2"]; ?></p></b>
        </div>
        <div class="nav-a">
        <a href="../function/loggout.php">Logout</a>
        <!-- <a href="#">Akun</a> -->
        <a href="rwt_pjm_usr.php">Riwayat Peminjaman</a>
        <a href="dashboard.php">Dashboard</a>
        </div>
    </div>

</body>
</html>