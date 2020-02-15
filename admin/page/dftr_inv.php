<?php 
include "../function/secure.php";
require "../function/functions.php";

error_reporting(0);
$user = mysqli_query($conn, "SELECT * FROM inventaris");
$_SESSION["double_inv"] = null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../../img/telkom_logo.png">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/dftr_inv.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Admin | Inventaris</title>
</head>
<body>
    <!-- Navbar -->
    <div class="lefty-nav">
    <img src="../img/admin.png">
    <div class="butt-space">
    <a href="dashboard.php">Dashboard</a>
    <a href="ijin_konf.php">Ijin Terkonfirmasi</a>
    <a href="rwt_ijin.php">Riwayat Peminjaman</a>
    <a href="user.php">Daftar User</a>
    <a href="">Inventaris</a>
    <a href="../function/logggout.php">Logout</a>
    </div>
    </div>

    <!-- Button tambah Invetaris -->
    <a class="usr_add" href="add_inv.php">Tambah Inventaris</a>

    <!-- warning -->
    <?php if($_SESSION["ops_steal"] == true): ?>
    <h1>Ada peminjaman aktif pada Inventaris terkait.</h1>
    <?php endif; ?>

    <!-- Table Inventaris -->
    <div class="card-table-user">
        <table border="0" cellpadding="10" cellspacing="0">
            
<tr>
    <th class="no">No.</th>
	<th class="tb-sm-col">ID Inventaris</th>
    <th class="tb-sm-col">Inventaris</th>
    <th>Jumlah Inventaris</th>
    <th>Deskripsi</th>
	<th class="actions">Aksi</th>
</tr>
<?php $i = 1; ?>
<?php foreach($user as $row): ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row["id_inventaris"]; ?></td>
        <td><?php echo $row["nama_inventaris"]; ?></td>
        <td><?php echo $row["jumlah_inventaris"]; ?></td>
        <td><?php echo $row["deskripsi"]; ?></td>
		<td>
            <a href="detail_inv.php?no=<?php echo $row["id_inventaris"]; ?>">Detail</a>
            <a href="ubh_inv.php?no=<?php echo $row["id_inventaris"]; ?>">Ubah</a>
            <a class="a_delete" href="../function/hapus_inv.php?no=<?php echo $row["nama_inventaris"]; ?>" onclick="return confirm('Aksi ini akan menghapus data Inventaris.');">Hapus</a>
		</td>
	</tr>
    <?php $i++;?>
	<?php endforeach; ?>
    
    
	
</table>
</div>

</body>
</html>