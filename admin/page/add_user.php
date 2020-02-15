<?php 
include "../function/secure.php";
require "../function/functions.php";

$_SESSION["usr_steal"] = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../../img/telkom_logo.png">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/add_user.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Admin | Tambah User</title>
</head>
<body>

    <!-- Greet -->
    <h1>Daftarkan User</h1>

    <!-- Form -->
    <form action="confir_detail.php" method="post">
    <div class="card-bg">
        <div class="form-posi">
        <input type="text" placeholder="Username" name="username" required autocomplete="off" id="username">
        <input type="email" placeholder="Email" name="email" required autocomplete="off" id="email">
        <input type="password" placeholder="Password" name="password" required autocomplete="off">
        <input type="text" name="kelas" placeholder="Kelas" id="kelas" required autocomplete="off" maxlength="7">
    </div>
    <!-- Button -->
    <div class="butt-daf">
    <a class="button-dft" href="user.php">Kembali</a>
    <button type="submit" name="login" class="button-dft">Daftarkan</button>
    </div>
    </form>

    <!-- Warning -->
    <?php if(isset($_SESSION["double_acc"])) :?>
    <p class="confir_acc">Username sudah ada</p>
    <?php endif; ?>
</body>
</html>