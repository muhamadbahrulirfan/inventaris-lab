<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM data_ruangan
    WHERE id_ruangan='$id'"
);

$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $id_baru =
    $_POST['id_ruangan'];

    mysqli_query($conn,"
        UPDATE data_ruangan SET

        id_ruangan='$id_baru',
        nama_ruangan='$_POST[nama_ruangan]',
        lokasi='$_POST[lokasi]',
        kapasitas='$_POST[kapasitas]',
        keterangan='$_POST[keterangan]'

        WHERE id_ruangan='$id'
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
Edit Ruangan
</h4>

<form method="POST">

<div class="mb-3">
<label>ID Ruangan</label>

<input type="text"
name="id_ruangan"
class="form-control"
value="<?= $row['id_ruangan'] ?>"
required>
</div>

<div class="mb-3">
<label>Nama Ruangan</label>

<input type="text"
name="nama_ruangan"
class="form-control"
value="<?= $row['nama_ruangan'] ?>"
required>
</div>

<div class="mb-3">
<label>Lokasi</label>

<input type="text"
name="lokasi"
class="form-control"
value="<?= $row['lokasi'] ?>">
</div>

<div class="mb-3">
<label>Kapasitas</label>

<input type="number"
name="kapasitas"
class="form-control"
value="<?= $row['kapasitas'] ?>">
</div>

<div class="mb-3">
<label>Keterangan</label>

<textarea
name="keterangan"
class="form-control"
rows="3"><?= $row['keterangan'] ?></textarea>
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