<?php
include '../template/header.php';
include '../config/koneksi.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM data_ruangan
    ORDER BY id_ruangan ASC"
);
?>

<?php include '../template/sidebar.php'; ?>

<div class="content">

<?php include '../template/navbar.php'; ?>

<div class="card border-0 shadow rounded-4">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>
<h4 class="fw-bold">
Data Ruangan
</h4>

<small class="text-muted">
Kelola data ruangan laboratorium
</small>
</div>

<a href="tambah.php"
   class="btn btn-primary">

<i class="bi bi-plus-circle"></i>
Tambah Ruangan

</a>

</div>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead class="table-light">

<tr>
<th>No</th>
<th>ID Ruangan</th>
<th>Nama Ruangan</th>
<th>Lokasi</th>
<th>Kapasitas</th>
<th>Keterangan</th>
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

<td><?= $no++ ?></td>

<td>
<?= $row['id_ruangan'] ?>
</td>

<td>
<?= $row['nama_ruangan'] ?>
</td>

<td>
<?= $row['lokasi'] ?>
</td>

<td>
<?= $row['kapasitas'] ?>
</td>

<td>
<?= $row['keterangan'] ?>
</td>

<td>

<a href="edit.php?id=<?= $row['id_ruangan'] ?>"
class="btn btn-warning btn-sm">

Edit
</a>

<a href="hapus.php?id=<?= $row['id_ruangan'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus data?')">

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