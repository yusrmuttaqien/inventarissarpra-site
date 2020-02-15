<?php 
include "secure.php";
require "functions.php";

$id = $_GET["no"];
mysqli_query($conn, "UPDATE `pinjam` SET `stats` = '1' WHERE `pinjam`.`no` = $id");
header("Location: ../page/dashboard.php");
?>