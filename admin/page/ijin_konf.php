<?php  
include "../function/secure.php";
require "../function/functions.php";
$_SESSION["ops_steal"] = false;
$pinjam = mysqli_query($conn, "SELECT * FROM pinjam WHERE stats=1 ORDER BY no DESC");
$t_data = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../../img/telkom_logo.png">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/ijin_konf.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Admin | Ijin Terkonfirmasi</title>
</head>
<body>
    <!-- Navbar -->
    <div class="lefty-nav">
    <img src="../img/admin.png">
    <div class="butt-space">
    <a href="dashboard.php">Dashboard</a>
    <a href="">Ijin Terkonfirmasi</a>
    <a href="rwt_ijin.php">Riwayat Peminjaman</a>
    <a href="user.php">Daftar User</a>
    <a href="dftr_inv.php">Inventaris</a>
    <a href="../function/logggout.php">Logout</a>
    </div>
    </div>

    <!-- Table -->
    <?php if(mysqli_num_rows($pinjam) >= 1): ?>
    <div class="card-table-konf">
        <table border="0" cellpadding="10" cellspacing="0">
            
<tr>
    <th>No.</th>
	<th>User</th>
    <th>Inventaris</th>
    <th>Tanggal Pinjam</th>
    <th>Jam Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Guru Pendamping</th>
    <th>Status</th>
	<th class="actions">Aksi</th>
</tr>
<?php $i = 1; ?>
<?php foreach($pinjam as $row): ?>
	<tr>
		<td><?php echo $i; ?></td>
        <td><?php echo $row["nama_user"];?></td>
        <td><?php echo $row["nama_inventaris"];?></td>
        <!-- <?php $_SESSION["inv"]=$row["nama_inventaris"]; ?> -->
        <td><?php echo $row["tgl_pinjam"]; ?></td>
        <td><?php if($row["jam_pinjam"] === null){echo"- -";}else{echo $row["jam_pinjam"];} ?></td>
        <td><?php echo $row["tgl_kembali"]; ?></td>
        <td><?php echo $row["guru_pendamping"];?></td>
        <td><?php if($row["usr-lght"] === "0"): ?>
        <a class="notyet">Dipinjam</a>
            <?php elseif($row["usr-lght"] === "1"): ?>
        <a class="yet">Kembali</a>
            <?php endif; ?>
        </td>
		<td>
            <a href="../function/kembali.php?no=<?php echo $row["no"];?>&ni=<?php echo $row["nama_inventaris"];?>" onclick="return confirm('Konfirmasi?.');">Konfirmasi</a>
            <a href="detail_pinjam_1.php?no=<?php echo $row["no"]; ?>">Detail</a>
		</td>
	</tr>
    <?php $i++;
    $t_data++; ?>
	<?php endforeach; ?>
    
    
	
</table>
</div>
<?php else: ?>
    <img class="no_data" src="../img/no_data.png">
    <?php endif; ?>
<!-- Notice -->
<!-- <?php if($t_data === 0) :?>
    <a class="jum-total-non">Tidak ada data.</a>
    <?php else: ?>
    <p class="jum-total">Ada <?php echo $t_data; ?> ijin yang berjalan.</p>
    <?php endif; ?> -->
</body>
</html>