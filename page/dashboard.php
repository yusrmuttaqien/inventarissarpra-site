<?php  
include "../function/secure.php";
require "../function/functions.php";
include "../function/g_time.php";

$pribadi=$_SESSION["fl2"];
$_SESSION["no_reload"]=false;
$inventaris = mysqli_query($conn, "SELECT * FROM inventaris ");
$p_aktif= mysqli_query($conn, "SELECT * FROM pinjam WHERE stats=0 AND nama_user='$pribadi' ");
$p_aktif_1= mysqli_query($conn, "SELECT * FROM pinjam WHERE stats=1 AND nama_user='$pribadi' ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../img/telkom_logo.png">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Dashboard</title>
</head>
<body>
    <!-- top nav -->
    <div class="top-nav">
        <img src="../img/admin_1.png">
        <div class="nav-p">
        <b><p><?php echo $res; ?>, <?php echo $_SESSION["fl2"]; ?></p></b>
        </div>
        <div class="nav-a">
        <a class="btn-1"href="../function/loggout.php">Logout</a>
        <!-- <a href="akun_usr.php">Akun</a> -->
        <a class="btn-2" href="rwt_pjm_usr.php">Riwayat Peminjaman</a>
        <a class="btn-2" href="#">Dashboard</a>
        </div>
    </div>

    <!-- Peminjaman -->
    <div class="card-pinjam">
    <h1>Form Peminjaman</h1>
    <form action="detail_peminjaman.php" method="post">
    <b><p class="no-1">#1</p></b>
    <!-- <input class="input-1" type="text" name="barang" placeholder="Ketik Inventaris" id="barang" autocomplete="off" required> -->
    <!-- Looping select -->
    <select class="input-1" name="barang" id="barang" required>
    <option value="">Pilih Inventaris</option>
    <?php foreach($inventaris as $list): ?>
    <option value="<?php echo $list["nama_inventaris"]; ?>"><?php echo $list["nama_inventaris"]; ?></option>
    <?php endforeach; ?>
    </select>
    <!--  -->
    <input class="input-1_1" min="1" maxlength="3" type="number" name="jml_barang" placeholder="Jumlah" id="jml_barang" autocomplete="off" required>
    <b><p class="no-2">#2</p></b>
    <input class="input-2" type="text" name="guru" id="guru" autocomplete="off" placeholder="Guru Pendamping" required>
    <b><p class="no-3">#3</p></b>
    <select name="haripinjam" id="haripinjam" required>
        <option value="">Jangka Pinjam</option>
        <option value = "1 Hari">1 Hari</option>
        <option value = "2 Hari">2 Hari</option>
        <option value = "3 Hari">3 Hari</option>
    </select>
    <p class="notice-hari">Maksimal 3 hari peminjaman</p>
    <b><p class="no-4">#4</p></b>
    <textarea class="input-4" type="text" name="alasan" id="alasan" placeholder="Alasan Meminjam" required></textarea>
    <button class="btn-sub" type="submit" name="btn" id="btn"> </button>
    </form>
    <!-- Warning -->
    <?php if(isset($_SESSION["barang_not_found"])) :?>
    <p class="confir_inv">Inventaris tidak ditemukan</p>
    <?php endif; ?>
    <?php if(isset($_SESSION["barang_out_stock"])):?>
    <p class="confir_inv_1">Inventaris out of stock</p>
    <?php endif; ?>
    <!-- Inventaris -->
    <div class="invent-card">
        <table cellpadding="10" cellspacing="0" class="table-inv">
            <tr>
                <th>No.</th>
                <th>Inventaris</th>
                <th>Jumlah</th>
                <th>Deskripsi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($inventaris as $row): ?>
            <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row["nama_inventaris"];?></td>
            <td><?php echo $row["jumlah_inventaris"];?></td>
            <td><?php echo $row["deskripsi"]; ?></td>
            </tr>
            <?php $i++;?>
	        <?php endforeach; ?>
        </table>
    </div>
    </div>
    <!-- Peminjaman Aktif -->
    <div class="pinjam-card">
    <div class="belum-konf">
    <?php if(mysqli_num_rows($p_aktif) >= 1): ?>
        <table cellpadding="10" cellspacing="0" class="table-nkonf">
        <tr>
    <th>No.</th>
    <th>Inventaris</th>
    <th>Status</th>
	<th>Aksi</th>
</tr>
<?php $i = 1; ?>
<?php foreach($p_aktif as $row): ?>
	<tr>
		<td><?php echo $i; ?></td>
        <td><?php echo $row["nama_inventaris"];?></td>
        <td><?php echo "Unkonfirmasi"; ?></td>
		<td>
            <a class="a_undelete" href="detail_pinjam_1.php?no=<?php echo $row["no"]; ?>">Detail</a>
            <a class="a_delete" href="../function/hapus_konf.php?no=<?php echo $row["no"]; ?>" onclick="return confirm('Aksi ini akan membatalkan pinjaman.');">Hapus</a>
		</td>
	</tr>
    <?php $i++;?>
	<?php endforeach; ?>
        </table>
        </div>
    <?php else: ?>
    <b><p class="else-table">Tidak ada pinjaman terbaru.</p></b>
    <?php endif; ?>
    
        <div class="sdh-konf">
        <?php if(mysqli_num_rows($p_aktif_1) >= 1): ?>
        <table cellpadding="10" cellspacing="0" class="table-nkonf">
        <tr>
    <th>No.</th>
    <th>Inventaris</th>
    <th>Kembali</th>
	<th>Aksi</th>
</tr>
<?php $i = 1; ?>
<?php foreach($p_aktif_1 as $row): ?>
	<tr>
    <td><?php if($row["usr-lght"] === "0"): ?>
        <a class="notyet"><?php echo $i; ?></a>
            <?php elseif($row["usr-lght"] === "1"): ?>
        <a class="yet"><?php echo $i; ?></a>
            <?php endif; ?>
        </td>
        <td><?php echo $row["nama_inventaris"];?></td>
        <td><?php echo $row["tgl_kembali"];?></td>
		<td>
            <a class="a_undelete" href="detail_pinjam_1.php?no=<?php echo $row["no"]; ?>">Detail</a>
            <a class="a_conf" href="../function/kembali_konf.php?no=<?php echo $row["no"]; ?>" onclick="return confirm('Pastikan barang sudah dikembalikan.');">Kembali</a>
		</td>
	</tr>
    <?php $i++;?>
	<?php endforeach; ?>
        </table>
        </div>
    <?php else: ?>
    <b><p class="else-table">Tidak ada pengembalian pinjaman terbaru.</p></b>
    <?php endif; ?>
    </div>

</body>
</html>