<?php
include '../config/koneksi.php';

if(isset($_POST['simpan'])){

    $id = $_POST['id_ruangan'];
    $nama = $_POST['nama_ruangan'];
    $lokasi = $_POST['lokasi'];
    $kapasitas = $_POST['kapasitas'];
    $keterangan = $_POST['keterangan'];

    mysqli_query($conn,"
        INSERT INTO data_ruangan
        (
            id_ruangan,
            nama_ruangan,
            lokasi,
            kapasitas,
            keterangan
        )

        VALUES
        (
            '$id',
            '$nama',
            '$lokasi',
            '$kapasitas',
            '$keterangan'
        )
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
Tambah Ruangan
</h4>

<form method="POST">

<div class="mb-3">
<label>ID Ruangan</label>

<input type="text"
name="id_ruangan"
class="form-control"
placeholder="RG001"
required>
</div>

<div class="mb-3">
<label>Nama Ruangan</label>

<input type="text"
name="nama_ruangan"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Lokasi</label>

<input type="text"
name="lokasi"
class="form-control">
</div>

<div class="mb-3">
<label>Kapasitas</label>

<input type="number"
name="kapasitas"
class="form-control">
</div>

<div class="mb-3">
<label>Keterangan</label>

<textarea
name="keterangan"
class="form-control"
rows="3"></textarea>
</div>

<button type="submit"
name="simpan"
class="btn btn-primary">

Simpan
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