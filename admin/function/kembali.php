<?php 
include "secure.php";
require "functions.php";

$id = $_GET["no"];
$namas = $_GET["ni"];
// var_dump($_SESSION["inv"]);
mysqli_query($conn, "UPDATE `pinjam` SET `stats` = '2' WHERE `pinjam`.`no` = $id");
// update inventaris
$update_inv = mysqli_query($conn, "SELECT * FROM inventaris WHERE nama_inventaris= '$namas'");
$dex_0 = mysqli_fetch_assoc($update_inv);
$jml_barang = $dex_0["jumlah_inventaris"];
$upt = mysqli_query($conn, "SELECT * FROM pinjam WHERE no = '$id'");
$dex = mysqli_fetch_assoc($upt);
$user = $dex["nama_inventaris"];
$awal = $dex["jml_barang"];
$updated= $awal + $jml_barang;
mysqli_query($conn, "UPDATE `inventaris` SET `jumlah_inventaris` = '$updated' WHERE `nama_inventaris` = '$user'");
header("Location: ../page/ijin_konf.php");
?>