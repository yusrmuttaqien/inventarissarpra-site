<?php  
include "../function/secure.php";
require "../function/functions.php";
include "../function/g_time.php";

$names = $_SESSION["fl2"];
$rwt = mysqli_query($conn, "SELECT * FROM pinjam WHERE nama_user= '$names' AND stats= 2 ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../img/telkom_logo.png">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/rwt_pjm_usr.css">
    <title>Riwayat Peminjaman</title>
</head>
<body>
    <!-- top nav -->
    <div class="top-nav">
        <img src="../img/admin_1.png">
        <div class="nav-p">
        <b><p><?php echo $res; ?>, <?php echo $_SESSION["fl2"]; ?></p></b>
        </div>
        <div class="nav-a">
        <a href="../function/loggout.php">Logout</a>
        <!-- <a href="akun_usr.php">Akun</a> -->
        <a class="btn-2" href="#">Riwayat Peminjaman</a>
        <a class="btn-2" href="dashboard.php">Dashboard</a>
        </div>
    </div>
    <!-- Riwayat Peminjaman -->
    <div class="rwt_card">
    <?php if(mysqli_num_rows($rwt) >= 1): ?>
        <table border="0" cellpadding="10" cellspacing="0" class="table_rwt">
            <tr>
                <th>No.</th>
                <th>Inventaris</th>
                <th>Tanggal Pinjam</th>
                <th>Jam Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Jam Kembali</th>
                <th>Guru Pendamping</th>
                <th>Alasan</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($rwt as $row): ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row["nama_inventaris"];?></td>
                <td><?php echo $row["tgl_pinjam"]; ?></td>
                <td><?php echo $row["jam_pinjam"]; ?></td>
                <td><?php echo $row["tgl_kembali"]; ?></td>
                <td><?php echo $row["jam_kembali"]; ?></td>
                <td><?php echo $row["guru_pendamping"];?></td>
                <td><?php echo $row["alasan"];?></td>
                <td>
                    <a  class="a_undelete" href="detail_pinjam.php?no=<?php echo $row["no"]; ?>">Detail</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
    <b><p class="else-table">Tidak ada riwayat pinjaman.</p></b>
    <?php endif; ?>
    </div>
</body>
</html>