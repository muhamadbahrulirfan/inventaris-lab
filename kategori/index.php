<?php
include '../template/header.php';
include '../config/koneksi.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM data_kategori
    ORDER BY id_kategori DESC"
);
?>

<?php include '../template/sidebar.php'; ?>

<div class="content">

<?php include '../template/navbar.php'; ?>

<div class="card border-0 shadow rounded-4">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>
<h4 class="fw-bold mb-1">
Data Kategori
</h4>

<small class="text-muted">
Kelola kategori barang inventaris
</small>
</div>

<a href="tambah.php"
   class="btn btn-primary">

<i class="bi bi-plus-circle"></i>
Tambah Kategori

</a>

</div>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead class="table-light">

<tr>
<th width="80">No</th>
<th>ID Kategori</th>
<th>Kategori</th>
<th width="180">
Aksi
</th>
</tr>

</thead>

<tbody>

<?php
$no = 1;

while($row =
mysqli_fetch_assoc($data)):
?>

<tr>

<td>
<?= $no++ ?>
</td>

<td>
<?= $row['id_kategori'] ?>
</td>

<td>
<?= $row['kategori'] ?>
</td>

<td>

<a href="edit.php?id=<?= $row['id_kategori'] ?>"
   class="btn btn-warning btn-sm">

Edit
</a>

<a href="hapus.php?id=<?= $row['id_kategori'] ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin ingin menghapus kategori?')">

Hapus
</a>

</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</div>

</div>
</div>
</div>

<?php include '../template/footer.php'; ?>