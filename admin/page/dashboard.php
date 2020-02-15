<?php 
include "../function/secure.php";
require "../function/functions.php";
$_SESSION["ops_steal"] = false;
$pinjam = mysqli_query($conn, "SELECT * FROM pinjam WHERE stats=0 ORDER BY no DESC");
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
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/font.css">
    
    <title>Admin | Dashboard</title>
</head>
<body>
<!-- Navbar -->
    <div class="lefty-nav">
    <img src="../img/admin.png">
    <div class="butt-space">
    <a href="">Dashboard</a>
    <a href="ijin_konf.php">Ijin Terkonfirmasi</a>
    <a href="rwt_ijin.php">Riwayat Peminjaman</a>
    <a href="user.php">Daftar User</a>
    <a href="dftr_inv.php">Inventaris</a>
    <a href="../function/logggout.php">Logout</a>
    </div>
    </div>
<!-- Greet -->
    <h1>Selamat Datang, Admin</h1>
    <p class="tgl"><?php echo date("l, d M Y"); ?></p>
    
    <!-- Table -->
    <?php if(mysqli_num_rows($pinjam) >= 1): ?>
    <div class="card-table">
        <table border="0" cellpadding="10" cellspacing="0">
            
            <tr>
                <th class="tb_1">No.</th>
                <th class="tb_usr">User</th>
                <th class="tb_2">Inventaris</th>
                <th class="tb_2">Tanggal Pinjam</th>
                <th class="tb_2">Jam Pinjam</th>
                <th class="tb_2">Tanggal Kembali</th>
                <th class="tb_2">Guru Pendamping</th>
                <th class="tb_2">Status</th>
                <th class="tb_3">Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($pinjam as $row): ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row["nama_user"];?></td>
                <td><?php echo $row["nama_inventaris"];?></td>
                <td><?php echo $row["tgl_pinjam"]; ?></td>
                <td><?php if($row["jam_pinjam"] === null){echo"- -";}else{echo $row["jam_pinjam"];} ?></td>
                <td><?php echo $row["tgl_kembali"]; ?></td>
                <td><?php echo $row["guru_pendamping"]; ?></td>
                <td><?php echo "Unkonfirmasi"; ?></td>
                <td>
                    <a  class="a_conf" href="../function/konfirmasi.php?no=<?php echo $row["no"]; ?>">Konfirmasi</a>
                    <a href="detail_pinjam.php?no=<?php echo $row["no"]; ?>">Detail</a>
                    <a class="a_delete" href="../function/hapus_ijin.php?no=<?php echo $row["no"]; ?>" onclick="return confirm('Aksi ini akan membatalkan ijin user.');">Hapus</a>
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
    <?php if($t_data === 0) :?>
    <p></p>
    <?php else: ?>
    <p class="jum-total">Ada <?php echo $t_data; ?> ijin yang belum dikonfirmasi.</p>
    <?php endif; ?>
</body>
</html>