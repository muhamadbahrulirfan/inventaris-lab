<?php
include '../template/header.php';
include '../config/koneksi.php';

$data = mysqli_query($conn, "

SELECT
    data_maintenance.*,
    data_barang.nama_barang

FROM data_maintenance

LEFT JOIN data_barang
ON data_maintenance.id_barang =
data_barang.id_barang

ORDER BY id_maintenance DESC

");
?>

<?php include '../template/sidebar.php'; ?>

<div class="content">

<?php include '../template/navbar.php'; ?>

<div class="card border-0 shadow rounded-4">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>
<h4 class="fw-bold">
Data Maintenance
</h4>

<small class="text-muted">
Kelola maintenance barang
</small>
</div>

<a href="tambah.php"
class="btn btn-primary">

Tambah Maintenance

</a>

</div>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead class="table-light">

<tr>
<th>No</th>
<th>ID Barang</th>
<th>Tanggal</th>
<th>Kerusakan</th>
<th>Tindakan</th>
<th>Biaya</th>
<th>Status</th>
<th>Teknisi</th>
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
<?= $row['id_barang'] ?>
</td>

<td>
<?= $row['tanggal_maintenance'] ?>
</td>

<td>
<?= $row['jenis_kerusakan'] ?>
</td>

<td>
<?= $row['tindakan'] ?>
</td>

<td>
Rp <?= number_format($row['biaya']) ?>
</td>

<td>

<?php if(
$row['status']
== 'proses'
): ?>

<span class="badge bg-warning">
Proses
</span>

<?php else: ?>

<span class="badge bg-success">
Selesai
</span>

<?php endif; ?>

</td>

<td>
<?= $row['teknisi'] ?>
</td>

<td>

<a href="edit.php?id=<?= $row['id_maintenance'] ?>"
class="btn btn-warning btn-sm">

Edit
</a>

<a href="hapus.php?id=<?= $row['id_maintenance'] ?>"
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