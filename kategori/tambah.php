<?php
include '../config/koneksi.php';

if(isset($_POST['simpan'])){
    $id_kategori = $_POST['id_kategori'];
    $kategori = $_POST['kategori'];

    mysqli_query($conn,"
        INSERT INTO data_kategori
        (id_kategori,kategori)

        VALUES
        ('$id_kategori','$kategori')
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
Tambah Kategori
</h4>

<form method="POST">

<div class="mb-3">

<label>ID Kategori</label>

<input type="text"
       name="id_kategori"
       class="form-control"
       placeholder="KG000"
       required>

</div>

<div class="mb-3">

<label>Nama Kategori</label>

<input type="text"
       name="kategori"
       class="form-control"
       required>

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