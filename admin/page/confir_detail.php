<?php 
include "../function/secure.php";
require "../function/functions.php";

$_SESSION["double_acc"] = null;
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../../img/telkom_logo.png">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/confir_detail.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Admin | Detail User</title>
</head>
<body>
    <h1>Konfirmasi Data</h1>
    <div class="report-card">
    <div class="img-prof">
    <img class="img-admin" src="../img/admin_1.png">
    </div>
    <div class="text_report">
    <p><b>#1 Username :</b> <?php echo $_POST["username"]; ?></p>
    <p><b>#2 Email :</b> <?php echo $_POST["email"]; ?></p>
    <p><b>#3 Kelas :</b> <?php echo $_POST["kelas"]; ?></p>
    </div>
    <a class="ok-next" href="user.php">Ok</a>
    </div>
</body>
</html>