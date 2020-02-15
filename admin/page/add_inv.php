<?php 
include "../function/secure.php";
require "../function/functions.php";

$_SESSION["ops_steal"] = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../../img/telkom_logo.png">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/add_inv.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Admin | Tambah User</title>
</head>
<body>

    <!-- Greet -->
    <h1>Tambah Inventaris</h1>

    <!-- Form -->
    <form action="../function/tbh_inv.php" method="post">
    <div class="card-bg">
        <div class="form-posi">
        <input type="text" placeholder="Inventaris" name="inventaris" required autocomplete="off" id="inventaris">
        <input type="number" min="1" placeholder="Jumlah" name="jml_inv" required autocomplete="off" id="jml_inv">
        <textarea type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi Inventaris" required></textarea>
    </div>
    <!-- Button -->
    <div class="butt-daf">
    <a class="button-dft" href="dftr_inv.php">Kembali</a>
    <button type="submit" name="login" class="button-dft">Tambahkan</button>
    </div>
    </form>

    <!-- Warning -->
    <?php if(isset($_SESSION["double_inv"])) :?>
    <p class="confir_acc">Inventaris sudah ada</p>
    <?php endif; ?>
</body>
</html>