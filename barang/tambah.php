<?php
include '../config/koneksi.php';

/* ambil data kategori */
$kategori = mysqli_query(
    $conn,
    "SELECT * FROM data_barang
    ORDER BY id_kategori ASC"
);

/* ambil data ruangan */
$ruangan = mysqli_query(
    $conn,
    "SELECT * FROM data_barang
    ORDER BY id_ruangan ASC"
);

if(isset($_POST['simpan'])){

    $id_barang = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $merk = $_POST['merk'];
    $jumlah = $_POST['jumlah'];
    $id_kategori = $_POST['id_kategori'];
    $id_ruangan = $_POST['id_ruangan'];
    $tahun = $_POST['tahun_beli'];
    $kondisi = $_POST['kondisi'];

    mysqli_query($conn,"
        INSERT INTO data_barang
        (
            id_barang,
            id_kategori,
            id_ruangan,
            nama_barang,
            merk,
            jumlah,
            tahun_beli,
            kondisi
        )

        VALUES
        (
            '$id_barang',
            '$id_kategori',
            '$id_ruangan',
            '$nama',
            '$merk',
            '$jumlah',
            '$tahun',
            '$kondisi'
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
Tambah Barang
</h4>

<form method="POST">

<div class="mb-3">
<label>ID Barang</label>

<input type="text"
       name="id_barang"
       class="form-control" placeholder="contoh BR000">
</div>
<!-- Nama Barang -->
<div class="mb-3">
<label>Nama Barang</label>

<input type="text"
       name="nama_barang"
       class="form-control"
       required>
</div>

<!-- Merk -->
<div class="mb-3">
<label>Merk</label>

<input type="text"
       name="merk"
       class="form-control">
</div>

<!-- Kategori -->
<div class="mb-3">
<label>ID Kategori</label>

<input type="text"
       name="id_kategori"
       class="form-control" placeholder="contoh KG000">
</div>

<!-- Ruangan -->
<div class="mb-3">
<label>ID Ruangan</label>

<input type="text"
       name="id_ruangan"
       class="form-control" placeholder="contoh RG000">
</div>

<!-- Jumlah -->
<div class="mb-3">
<label>Jumlah</label>

<input type="number"
       name="jumlah"
       class="form-control"
       required>
</div>

<!-- Tahun Beli -->
<div class="mb-3">
<label>Tahun Beli</label>

<input type="number"
       name="tahun_beli"
       class="form-control"
       required>
</div>

<!-- Kondisi -->
<div class="mb-3">

<label>Kondisi</label>

<select name="kondisi"
        class="form-select">

<option value="baik">
Baik
</option>

<option value="rusak ringan">
Rusak Ringan
</option>

<option value="rusak berat">
Rusak Berat
</option>

</select>

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