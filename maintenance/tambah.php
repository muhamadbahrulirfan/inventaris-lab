<?php
include '../config/koneksi.php';

$barang = mysqli_query(
    $conn,
    "SELECT * FROM data_barang
    ORDER BY nama_barang ASC"
);

if(isset($_POST['simpan'])){

    mysqli_query($conn, "

    INSERT INTO data_maintenance
    (
        id_barang,
        tanggal_maintenance,
        jenis_kerusakan,
        tindakan,
        biaya,
        status,
        teknisi,
        keterangan
    )

    VALUES
    (
        '$_POST[id_barang]',
        '$_POST[tanggal_maintenance]',
        '$_POST[jenis_kerusakan]',
        '$_POST[tindakan]',
        '$_POST[biaya]',
        '$_POST[status]',
        '$_POST[teknisi]',
        '$_POST[keterangan]'
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
Tambah Maintenance
</h4>

<form method="POST">

<div class="mb-3">
<label>Barang</label>

<select name="id_barang"
class="form-select"
required>

<option value="">
-- Pilih Barang --
</option>

<?php
while($b =
mysqli_fetch_assoc($barang)):
?>

<option
value="<?= $b['id_barang'] ?>">

<?= $b['nama_barang'] ?>

</option>

<?php endwhile; ?>

</select>
</div>

<div class="mb-3">
<label>Tanggal Maintenance</label>

<input type="date"
name="tanggal_maintenance"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Jenis Kerusakan</label>

<textarea
name="jenis_kerusakan"
class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Tindakan</label>

<textarea
name="tindakan"
class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Biaya</label>

<input type="number"
name="biaya"
class="form-control">
</div>

<div class="mb-3">
<label>Status</label>

<select name="status"
class="form-select">

<option value="proses">
Proses
</option>

<option value="selesai">
Selesai
</option>

</select>
</div>

<div class="mb-3">
<label>Teknisi</label>

<input type="text"
name="teknisi"
class="form-control">
</div>

<div class="mb-3">
<label>Keterangan</label>

<textarea
name="keterangan"
class="form-control"></textarea>
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