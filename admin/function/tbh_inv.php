<?php 
include "../function/secure.php";
require "../function/functions.php";

$inventaris = mysqli_real_escape_string($conn,$_POST["inventaris"]);
$jml_inv = mysqli_real_escape_string($conn, $_POST["jml_inv"]);
$deskripsi = mysqli_real_escape_string($conn, $_POST["deskripsi"]);

// cek inventaris
	$check = mysqli_query($conn, "SELECT nama_inventaris FROM inventaris WHERE nama_inventaris = '$inventaris'");

	if( mysqli_fetch_assoc($check)){
        $_SESSION["double_inv"] = true;
        header("Location:../page/add_inv.php");
		exit;
	}
	// tambah inv
	mysqli_query($conn, "INSERT INTO inventaris values ('','$inventaris','$jml_inv','$deskripsi')");

	header("Location: ../page/dftr_inv.php");
?>