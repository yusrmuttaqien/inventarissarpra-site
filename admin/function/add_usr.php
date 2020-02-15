<?php 
include "../function/secure.php";
require "../function/functions.php";

$username = mysqli_real_escape_string($conn,$_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$kelas = mysqli_real_escape_string($conn, $_POST["kelas"]);
$display_pict = "admin_1.jpg";

	// cek username double
	$check = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($check)){
        $_SESSION["double_acc"] = true;
        header("Location:../page/add_user.php");
		exit;
	}

	// enkripsi password
	$password_enc = password_hash($password, PASSWORD_DEFAULT);
	// tambah user baru
	mysqli_query($conn, "INSERT INTO user values ('', '$username','$password_enc', '$display_pict', '$kelas', '$email')");

	header("Location: ../page/user.php");
?>