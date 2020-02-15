<?php 
include "../function/secure.php";
require "../function/functions.php";

error_reporting(0);
$_SESSION["double_acc"] = null;
$_SESSION["ops_steal"] = false;
$user = mysqli_query($conn, "SELECT * FROM user ORDER BY id_user DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../../img/telkom_logo.png">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Admin | Daftar User</title>
</head>
<body>
    <!-- Navbar -->
    <div class="lefty-nav">
    <img src="../img/admin.png">
    <div class="butt-space">
    <a href="dashboard.php">Dashboard</a>
    <a href="ijin_konf.php">Ijin Terkonfirmasi</a>
    <a href="rwt_ijin.php">Riwayat Peminjaman</a>
    <a href="">Daftar User</a>
    <a href="dftr_inv.php">Inventaris</a>
    <a href="../function/logggout.php">Logout</a>
    </div>
    </div>

    <!-- Button tambah user -->
    <a class="usr_add" href="add_user.php">Tambah User</a>

    <!-- warning -->
    <?php if($_SESSION["usr_steal"] == true): ?>
    <h1>Ada peminjaman aktif pada User terkait.</h1>
    <?php endif; ?>

    <!-- Table -->
    <div class="card-table-user">
        <table border="0" cellpadding="10" cellspacing="0">
            
<tr>
    <th class="no">No.</th>
	<th class="tb-sm-col">ID User</th>
    <th class="tb-sm-col">Username</th>
    <th>Kelas</th>
	<th class="actions">Aksi</th>
</tr>
<?php $i = 1; ?>
<?php foreach($user as $row): ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row["id_user"]; ?></td>
        <td><?php echo $row["username"]; ?></td>
        <td><?php echo $row["kelas"]; ?></td>
		<td>
            <a href="detail_akun.php?no=<?php echo $row["id_user"]; ?>">Detail</a>
            <a class="a_delete" href="../function/hapus_akun.php?no=<?php echo $row["id_user"]; ?>" onclick="return confirm('Aksi ini akan menghilangkan user anda selamanya.');">Keluar</a>
		</td>
	</tr>
    <?php $i++;?>
	<?php endforeach; ?>
    
    
	
</table>
</div>
</body>
</html>