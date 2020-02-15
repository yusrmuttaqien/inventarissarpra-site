<?php 
include "../function/secure.php";
require "../function/functions.php";

$_SESSION["ops_steal"] = false;
$inv_id = $_GET["no"];
$_SESSION["no_use"] = $inv_id;
$query_pck = mysqli_query($conn, "SELECT * FROM inventaris WHERE id_inventaris='$inv_id'");
$data_pck = mysqli_fetch_assoc($query_pck);
$dat_1= $data_pck["nama_inventaris"];
$dat_2= $data_pck["jumlah_inventaris"];
$dat_3= $data_pck["deskripsi"];

// if(isset($_POST["login"])){
//     $data_1 = $_POST["inventaris"];
//     $data_2 = $_POST["jml_inv"];
//     $data_3 = $_POST["deskripsi"];

//     mysqli_query($conn, "UPDATE `inventaris` SET `nama_inventaris` = '$data_1' AND `jumlah_inventaris` = '$data_2' AND `deskripsi` = '$data_3' WHERE `inventaris`.`id_inventaris` = $inv_id");
//     header("Location: dftr_inv.php");
// }
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
    <title>Admin | Ubah User</title>
</head>
<body>

    <!-- Greet -->
    <h1 class="change">Ubah Inventaris</h1>

    <!-- Form -->
    <form action="../function/ubh_inv.php" method="post">
    <div class="card-bg">
        <div class="form-posi">
        <input type="text" placeholder="Inventaris" name="inventaris" required autocomplete="off" id="inventaris" value="<?= $dat_1;?>">
        <input type="number" min="1" placeholder="Jumlah" name="jml_inv" required autocomplete="off" id="jml_inv" value="<?= $dat_2;?>">
        <textarea type="text" name="deskripsi" id="deskripsi" placeholder="<?= $dat_3;?>" ></textarea>
    </div>
    <!-- Button -->
    <div class="butt-daf">
    <a class="button-dft" href="dftr_inv.php">Kembali</a>
    <button type="submit" name="login" class="button-dft">Ubah</button>
    </div>
    </form>

    <!-- Warning -->
    <?php if(isset($_SESSION["double_inv"])) :?>
    <p class="confir_acc">Inventaris sudah ada</p>
    <?php endif; ?>
</body>
</html>