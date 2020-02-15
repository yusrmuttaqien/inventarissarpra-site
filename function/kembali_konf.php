<?php 
include "secure.php";
require "functions.php";
include "../function/g_time.php";

$id = $_GET["no"];
mysqli_query($conn, "UPDATE `pinjam` SET `usr-lght` = '1' WHERE `pinjam`.`no` = $id;");
mysqli_query($conn, "UPDATE `pinjam` SET `jam_kembali` = '$dates' WHERE `pinjam`.`no` = $id;");
header("Location: ../page/dashboard.php");
?>