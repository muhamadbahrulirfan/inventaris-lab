<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM data_maintenance
    WHERE id_maintenance='$id'"
);

$row = mysqli_fetch_assoc($data);

$barang = mysqli_query(
    $conn,
    "SELECT * FROM data_barang"
);

if(isset($_POST['update'])){

    mysqli_query($conn, "

    UPDATE data_maintenance SET

    id_barang='$_POST[id_barang]',
    tanggal_maintenance='$_POST[tanggal_maintenance]',
    jenis_kerusakan='$_POST[jenis_kerusakan]',
    tindakan='$_POST[tindakan]',
    biaya='$_POST[biaya]',
    status='$_POST[status]',
    teknisi='$_POST[teknisi]',
    keterangan='$_POST[keterangan]'

    WHERE id_maintenance='$id'

    ");

    header("Location: index.php");
    exit;
}
?>

<?php include '../template/header.php'; ?>
<?php include '../template/sidebar.php'; ?>

<div class="content">

<?php include '../template/navbar.php'; ?>

<div class="card border-0 shadow rounded-4">

<div class="card-body">

<h4 class="fw-bold mb-4">
Edit Maintenance
</h4>

<form method="POST">

<div class="mb-3">
<label>Barang</label>

<select name="id_barang"
class="form-select">

<?php
while($b =
mysqli_fetch_assoc($barang)):
?>

<option
value="<?= $b['id_barang'] ?>"

<?= (
$row['id_barang']
==
$b['id_barang']
)

? 'selected'
: ''
?>

>

<?= $b['nama_barang'] ?>

</option>

<?php endwhile; ?>

</select>
</div>

<div class="mb-3">
<label>Tanggal</label>

<input type="date"
name="tanggal_maintenance"
class="form-control"
value="<?= $row['tanggal_maintenance'] ?>">
</div>

<div class="mb-3">
<label>Jenis Kerusakan</label>

<textarea
name="jenis_kerusakan"
class="form-control"><?= $row['jenis_kerusakan'] ?></textarea>
</div>

<div class="mb-3">
<label>Tindakan</label>

<textarea
name="tindakan"
class="form-control"><?= $row['tindakan'] ?></textarea>
</div>

<div class="mb-3">
<label>Biaya</label>

<input type="number"
name="biaya"
class="form-control"
value="<?= $row['biaya'] ?>">
</div>

<div class="mb-3">
<label>Status</label>

<select name="status"
class="form-select">

<option value="proses"
<?= $row['status']=='proses'
? 'selected' : '' ?>>

Proses
</option>

<option value="selesai"
<?= $row['status']=='selesai'
? 'selected' : '' ?>>

Selesai
</option>

</select>
</div>

<div class="mb-3">
<label>Teknisi</label>

<input type="text"
name="teknisi"
class="form-control"
value="<?= $row['teknisi'] ?>">
</div>

<div class="mb-3">
<label>Keterangan</label>

<textarea
name="keterangan"
class="form-control"><?= $row['keterangan'] ?></textarea>
</div>

<button type="submit"
name="update"
class="btn btn-warning">

Update
</button>

<a href="index.php"
class="btn btn-secondary">

Kembali
</a>

</form>

</div>
</div>
</div>

<?php include '../template/footer.php'; ?>