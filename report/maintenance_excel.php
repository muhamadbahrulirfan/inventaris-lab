<?php
include '../config/koneksi.php';

/* paksa download excel */
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_maintenance.xls");
header("Pragma: no-cache");
header("Expires: 0");

$data = mysqli_query($conn, "

SELECT
    data_maintenance.*,
    data_barang.nama_barang

FROM data_maintenance

LEFT JOIN data_barang
ON data_maintenance.id_barang =
data_barang.id_barang

ORDER BY
id_maintenance DESC

");

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>

<body>

<h3>
Laporan Maintenance
</h3>

<table border="1">

<tr style="font-weight:bold;">
    <th>No</th>
    <th>Barang</th>
    <th>Tanggal</th>
    <th>Kerusakan</th>
    <th>Tindakan</th>
    <th>Biaya</th>
    <th>Status</th>
    <th>Teknisi</th>
</tr>

<?php
$no = 1;

while(
    $row =
    mysqli_fetch_assoc($data)
):
?>

<tr>

<td>
<?= $no++ ?>
</td>

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
<?= ucfirst($row['status']) ?>
</td>

<td>
<?= $row['teknisi'] ?>
</td>

</tr>

<?php endwhile; ?>

</table>

</body>
</html>