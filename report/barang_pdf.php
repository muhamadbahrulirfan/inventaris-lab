<?php
include '../config/koneksi.php';

$data = mysqli_query($conn, "

SELECT
    data_barang.*,
    data_kategori.kategori,
    data_ruangan.nama_ruangan

FROM data_barang

LEFT JOIN data_kategori
ON data_barang.id_kategori =
data_kategori.id_kategori

LEFT JOIN data_ruangan
ON data_barang.id_ruangan =
data_ruangan.id_ruangan

ORDER BY data_barang.id_barang DESC

");
?>

<!DOCTYPE html>
<html>
<head>

<title>
Laporan Data Barang
</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<style>
body{
    font-size:14px;
}
</style>

</head>
<body onload="window.print()">

<h3 class="text-center">
LAPORAN DATA BARANG
</h3>

<table class="table table-bordered">

<thead>

<tr>
<th>No</th>
<th>Barang</th>
<th>Kategori</th>
<th>Ruangan</th>
<th>Merk</th>
<th>Jumlah</th>
<th>Tahun</th>
<th>Kondisi</th>
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
<?= $row['kategori'] ?>
</td>

<td>
<?= $row['nama_ruangan'] ?>
</td>

<td>
<?= $row['merk'] ?>
</td>

<td>
<?= $row['jumlah'] ?>
</td>

<td>
<?= $row['tahun_beli'] ?>
</td>

<td>
<?= $row['kondisi'] ?>
</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</body>
</html>