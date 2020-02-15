<?php 
include "secure.php";
require "functions.php";

$id = $_GET["no"];

$upt = mysqli_query($conn, "SELECT * FROM pinjam WHERE no = '$id'");
$dex = mysqli_fetch_assoc($upt);
$awal = $dex["jml_barang"];
$nama_brng = $dex["nama_inventaris"];
$update_inv = mysqli_query($conn, "SELECT * FROM inventaris WHERE nama_inventaris= '$nama_brng'");
$dex_0 = mysqli_fetch_assoc($update_inv);
$jml_barang = $dex_0["jumlah_inventaris"];
$updated= $awal + $jml_barang;
mysqli_query($conn, "UPDATE `inventaris` SET `jumlah_inventaris` = '$updated' WHERE `nama_inventaris` = '$nama_brng'");

mysqli_query($conn, "DELETE FROM pinjam WHERE no = $id");
header("Location: ../page/dashboard.php");
?>