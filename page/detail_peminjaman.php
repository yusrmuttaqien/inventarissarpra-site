<?php 
include "../function/secure.php";
require "../function/functions.php";
include "../function/g_time.php";

// error_reporting(0);
$_SESSION["barang_not_found"]=null;
$_SESSION["barang_out_stock"]=null;

$id_user=htmlspecialchars($_SESSION["fl1"]);
$nama_user=htmlspecialchars($_SESSION["fl2"]);
$kelas=htmlspecialchars($_SESSION["fl3"]);
$jam_pinjam=$dates;
$jam_kembali=null;
// tgl set
// $tanggal_pinjam=date("Y-m-d");
// $tgl_kembali_0=date("d");
// $tgl_kembali_1=$_POST["haripinjam"];
// $tgl_kembali_2=$tgl_kembali_0 + $tgl_kembali_1;
// $tgl_kembali_3=date("Y-m") ."-$tgl_kembali_2"; 
$tanggal_pinjam=date("Y-m-d");
$tgl_kembali_0=str_replace('-', '/', $tanggal_pinjam);
if($_POST["haripinjam"] == 1){
    $tgl_kembali_3=date('Y-m-d',strtotime($tanggal_pinjam . "+1 days"));
}
if($_POST["haripinjam"] == 2){
    $tgl_kembali_3=date('Y-m-d',strtotime($tanggal_pinjam . "+2 days"));
}
if($_POST["haripinjam"] == 3){
    $tgl_kembali_3=date('Y-m-d',strtotime($tanggal_pinjam . "+3 days"));
}

// tgl set
$barang=htmlspecialchars($_POST["barang"]);
$g_pendamping=htmlspecialchars($_POST["guru"]);
$h_pinjam=htmlspecialchars($_POST["haripinjam"]);
$alasan=htmlspecialchars($_POST["alasan"]);
$jml_barang=htmlspecialchars($_POST["jml_barang"]);

$cek_barang = mysqli_query($conn, "SELECT * FROM inventaris WHERE nama_inventaris='$barang'");
$cek_jml = mysqli_fetch_assoc($cek_barang);
$fix_nama = $cek_jml["nama_inventaris"];

if($_SESSION["no_reload"] == true){
    header("Location: dashboard.php");
    exit;
}elseif(mysqli_num_rows($cek_barang) === 0){
    $_SESSION["barang_not_found"]=true;
    header("Location: dashboard.php");
    exit;
}elseif($jml_barang === "0"){
    header("Location: dashboard.php");
    exit;
}elseif($cek_jml["jumlah_inventaris"] === "0" || $cek_jml["jumlah_inventaris"] < $jml_barang){
    $_SESSION["barang_out_stock"]=true;
    header("Location: dashboard.php");
    exit;
}
$_SESSION["no_reload"]=true;
mysqli_query($conn, "INSERT INTO pinjam values ('','$id_user','$nama_user','$fix_nama','$jam_pinjam','$jam_kembali','$tanggal_pinjam','$tgl_kembali_3','','$alasan','$kelas','$g_pendamping','$jml_barang','')");

// update inventaris
    $upt = mysqli_query($conn, "SELECT * FROM inventaris WHERE nama_inventaris = '$barang'");
    $dex = mysqli_fetch_assoc($upt);
    $awal = $dex["jumlah_inventaris"];
    $updated= $awal - $jml_barang;
    mysqli_query($conn, "UPDATE `inventaris` SET `jumlah_inventaris` = '$updated' WHERE `nama_inventaris` = '$barang'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../img/telkom_logo.png">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/d_peminjaman.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Detail Peminjaman</title>
</head>
<body>
<!-- top nav -->
<div class="top-nav">
        <img src="../img/admin_1.png">
        <div class="nav-p">
        <b><p><?php echo $res; ?>, <?php echo $_SESSION["fl2"]; ?></p></b>
        </div>
        <div class="nav-a">
        <a href="../function/loggout.php">Logout</a>
        <!-- <a href="akun_usr.php">Akun</a> -->
        <a class="btn-2" href="rwt_pjm_usr.php">Riwayat Peminjaman</a>
        <a class="btn-2" href="dashboard.php">Dashboard</a>
        </div>
    </div>

<!-- Header -->
<h1>Detail Peminjaman</h1>
<!-- Card report -->
<div class="report-card">
    <div class="img-prof">
        <img class="img-admin" src="../admin/img/admin.png">
        <img class="img-usr" src="../img/admin_1.png">
    </div>
    <div class="text_report">
    <p>User <?php echo $_SESSION["fl2"]; ?>,</p>
    <p>Meminjam Inventaris <?php echo $fix_nama; ?>, sejumlah <?php echo $jml_barang; ?> dari SARPRA</p>
    <p>Pada tanggal <?php echo $tanggal_pinjam; ?>, di jam <?php echo $jam_pinjam; ?></p>
    <p>Dengan pendampingan dari <?php echo $g_pendamping; ?></p>
    <p>Peminjaman Inventaris dengan tujuan <?php echo $alasan; ?></p>
    <p>Pengembalian dilakukan pada tanggal <?php echo $tgl_kembali_3; ?></p>
    <p class="sign">- Detail Peminjaman Inventaris SARPRA -</p>
    </div>
    <!-- <a class="ok-next-1" href="../function/print.php?no=<?php echo $alasan; ?>" target="_blank">Cetak</a> -->
    <!-- <a class="ok-next-1" href="print_test.php?no=<?php echo $alasan; ?>" target="_blank">Cetak</a> -->
    <a class="ok-next" href="dashboard.php">Kembali</a>
</div>
    
</body>
</html>