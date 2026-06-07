<?php
include '../config/koneksi.php';

$id = $_GET['id'];

/* ambil data barang */
$data = mysqli_query(
    $conn,
    "SELECT * FROM data_barang
    WHERE id_barang='$id'"
);

$row = mysqli_fetch_assoc($data);

/* proses update */
if(isset($_POST['update'])){

    $id_barang = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $merk = $_POST['merk'];
    $jumlah = $_POST['jumlah'];
    $tahun = $_POST['tahun_beli'];
    $kondisi = $_POST['kondisi'];
    $id_kategori = $_POST['id_kategori'];
    $id_ruangan = $_POST['id_ruangan'];

    mysqli_query($conn,"
        UPDATE data_barang SET

        id_barang='$id_barang',
        id_kategori='$id_kategori',
        id_ruangan='$id_ruangan',
        nama_barang='$nama',
        merk='$merk',
        jumlah='$jumlah',
        tahun_beli='$tahun',
        kondisi='$kondisi'

        WHERE id_barang='$id'
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
Edit Barang
</h4>

<form method="POST">

<div class="mb-3">
<label>ID Barang</label>

<input type="text"
       name="id_barang"
       class="form-control"
       value="<?= $row['id_barang'] ?>"
       required>
</div>

<!-- Nama Barang -->
<div class="mb-3">
<label>Nama Barang</label>

<input type="text"
       name="nama_barang"
       class="form-control"
       value="<?= $row['nama_barang'] ?>"
       required>
</div>

<!-- Merk -->
<div class="mb-3">
<label>Merk</label>

<input type="text"
       name="merk"
       class="form-control"
       value="<?= $row['merk'] ?>">
</div>

<!-- Id Kategori -->
<div class="mb-3">
<label>ID Kategori</label>

<input type="text"
       name="id_kategori"
       class="form-control"
       value="<?= $row['id_kategori'] ?>"
       required>
</div>

<!-- ID Ruangan -->
<div class="mb-3">
<label>ID Ruangan</label>

<input type="text"
       name="id_ruangan"
       class="form-control"
       value="<?= $row['id_ruangan'] ?>">
</div>
<!-- Jumlah -->
<div class="mb-3">
<label>Jumlah</label>

<input type="number"
       name="jumlah"
       class="form-control"
       value="<?= $row['jumlah'] ?>"
       required>
</div>

<!-- Tahun Beli -->
<div class="mb-3">
<label>Tahun Beli</label>

<input type="number"
       name="tahun_beli"
       class="form-control"
       value="<?= $row['tahun_beli'] ?>"
       required>
</div>

<!-- Kondisi -->
<div class="mb-3">

<label>Kondisi</label>

<select name="kondisi"
        class="form-select">

<option value="baik"
<?= ($row['kondisi']
== 'baik')
? 'selected' : '' ?>>

Baik
</option>

<option value="rusak ringan"
<?= ($row['kondisi']
== 'rusak ringan')
? 'selected' : '' ?>>

Rusak Ringan
</option>

<option value="rusak berat"
<?= ($row['kondisi']
== 'rusak berat')
? 'selected' : '' ?>>

Rusak Berat
</option>

</select>

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