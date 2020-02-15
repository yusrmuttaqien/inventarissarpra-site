<?php 
include "secure.php";
require "functions.php";

$_SESSION["usr_steal"] = false;
$id = $_GET["no"];
// cek pinjaman
$cek = mysqli_query($conn, "SELECT * FROM pinjam WHERE id_user = '$id' AND stats='0'");
$cek_1 = mysqli_query($conn, "SELECT * FROM pinjam WHERE id_user = '$id' AND stats='1'");
if(mysqli_num_rows($cek) === 0 && mysqli_num_rows($cek_1) === 0){
    mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id'");
    mysqli_query($conn, "DELETE FROM pinjam WHERE id_user = '$id'");
    header("Location: ../page/user.php");
    exit;
}
$_SESSION["usr_steal"] = true;
header("Location: ../page/user.php");
?>