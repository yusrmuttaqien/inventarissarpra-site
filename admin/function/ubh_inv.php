<?php 
include "secure.php";
require "functions.php";

$data_1 = $_POST["inventaris"];
$data_2 = $_POST["jml_inv"];
$data_3 = $_POST["deskripsi"];

$use = $_SESSION["no_use"];

if($data_3 == null){
    mysqli_query($conn, "UPDATE `inventaris` SET `nama_inventaris` = '$data_1', `jumlah_inventaris` = '$data_2' WHERE `inventaris`.`id_inventaris` = '$use'");
}else {
    mysqli_query($conn, "UPDATE `inventaris` SET `nama_inventaris` = '$data_1', `jumlah_inventaris` = '$data_2', `deskripsi` = '$data_3' WHERE `inventaris`.`id_inventaris` = '$use'");
}

header("Location: ../page/dftr_inv.php");

?>