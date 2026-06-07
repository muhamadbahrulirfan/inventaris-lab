<?php
include '../config/koneksi.php';

header(
"Content-type: application/vnd-ms-excel"
);

/* paksa download excel */
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_barang.xls");
header("Pragma: no-cache");
header("Expires: 0");
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

");
?>

<h3>
Laporan Barang
</h3>

<table border="1">

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

</table>