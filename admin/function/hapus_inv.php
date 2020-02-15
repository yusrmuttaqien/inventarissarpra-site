<?php 
include "secure.php";
require "functions.php";
$_SESSION["ops_steal"] = false;
$id_inv = $_GET["no"];
var_dump($id_inv);
// cek pinjaman
$cek = mysqli_query($conn, "SELECT * FROM pinjam WHERE nama_inventaris = '$id_inv' AND stats='0'");
$cek_1 = mysqli_query($conn, "SELECT * FROM pinjam WHERE nama_inventaris = '$id_inv' AND stats='1'");
// $cek_2 = mysqli_query($conn, "SELECT * FROM pinjam WHERE nama_inventaris = '$id_inv' AND stats='2'");
if(mysqli_num_rows($cek) === 0 && mysqli_num_rows($cek_1) === 0){
    mysqli_query($conn, "DELETE FROM inventaris WHERE nama_inventaris = '$id_inv'");
    mysqli_query($conn, "DELETE FROM pinjam WHERE nama_inventaris = '$id_inv'");
    header("Location: ../page/dftr_inv.php");
    exit;
}
$_SESSION["ops_steal"] = true;
header("Location: ../page/dftr_inv.php");
?>