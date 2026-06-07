<?php
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

<!DOCTYPE html>
<html>
<head>

<title>
Laporan Maintenance
</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body onload="window.print()">

<h3 class="text-center">
LAPORAN MAINTENANCE
</h3>

<table class="table table-bordered">

<thead>

<tr>
<th>No</th>
<th>Barang</th>
<th>Tanggal</th>
<th>Kerusakan</th>
<th>Tindakan</th>
<th>Biaya</th>
<th>Status</th>
<th>Teknisi</th>
</tr>

</thead>

<tbody>

<?php
$no=1;

while($row=
mysqli_fetch_assoc($data)):
?>

<tr>

<td><?= $no++ ?></td>

<td>
<?= $row['nama_barang'] ?>
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
<?= $row['status'] ?>
</td>

<td>
<?= $row['teknisi'] ?>
</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</body>
</html>