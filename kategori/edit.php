<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM data_kategori
    WHERE id_kategori='$id'"
);

$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    $id_kategori = $_POST['id_kategori'];
    $kategori = $_POST['kategori'];

    mysqli_query($conn,"
        UPDATE data_kategori SET
        id_kategori='$id_kategori',
        kategori='$kategori'

        WHERE id_kategori='$id'
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
Edit Kategori
</h4>

<form method="POST">


<div class="mb-3">

<label>ID Kategori</label>

<input type="text"
       name="id_kategori"
       class="form-control"
       placeholder="KG000"
       value="<?= $row['id_kategori'] ?>"
       required>

</div>

<div class="mb-3">

<label>Nama Kategori</label>

<input type="text"
       name="kategori"
       class="form-control"
       value="<?= $row['kategori'] ?>"
       required>

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