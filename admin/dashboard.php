<?php
include '../template/header.php';
include '../config/koneksi.php';

/* ==========================
   DATA BARANG
========================== */

$totalBarang = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM data_barang"
    )
);

$totalBaik = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM data_barang
        WHERE kondisi='baik'"
    )
);

$totalRusakRingan = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM data_barang
        WHERE kondisi='rusak ringan'"
    )
);

$totalRusakBerat = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM data_barang
        WHERE kondisi='rusak berat'"
    )
);

/* ==========================
   KATEGORI & RUANGAN
========================== */

$totalKategori = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM data_kategori"
    )
);

$totalRuangan = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM data_ruangan"
    )
);

/* ==========================
   MAINTENANCE
========================== */

$totalMaintenance = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM data_maintenance"
    )
);

$totalProses = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM data_maintenance
        WHERE status='proses'"
    )
);

$totalSelesai = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM data_maintenance
        WHERE status='selesai'"
    )
);

$biayaQuery = mysqli_query(
    $conn,
    "SELECT SUM(biaya)
    AS total_biaya
    FROM data_maintenance"
);

$biayaData =
mysqli_fetch_assoc(
    $biayaQuery
);

$totalBiaya =
$biayaData['total_biaya']
?? 0;
?>

<?php include '../template/sidebar.php'; ?>

<div class="content">

<?php include '../template/navbar.php'; ?>

<!-- CARD DASHBOARD -->
<div class="row g-4">

<div class="col-md-3">
<div class="card shadow-sm border-0 rounded-4 p-4">

<h6 class="text-muted">
Total Barang
</h6>

<h2 class="fw-bold">
<?= $totalBarang ?>
</h2>

</div>
</div>

<div class="col-md-3">
<div class="card shadow-sm border-0 rounded-4 p-4">

<h6 class="text-muted">
Barang Baik
</h6>

<h2 class="fw-bold text-success">
<?= $totalBaik ?>
</h2>

</div>
</div>

<div class="col-md-3">
<div class="card shadow-sm border-0 rounded-4 p-4">

<h6 class="text-muted">
Rusak Ringan
</h6>

<h2 class="fw-bold text-warning">
<?= $totalRusakRingan ?>
</h2>

</div>
</div>

<div class="col-md-3">
<div class="card shadow-sm border-0 rounded-4 p-4">

<h6 class="text-muted">
Rusak Berat
</h6>

<h2 class="fw-bold text-danger">
<?= $totalRusakBerat ?>
</h2>

</div>
</div>

</div>

<!-- SUMMARY -->
<div class="row mt-4">

<!-- Inventaris -->
<div class="col-md-6">

<div class="card shadow-sm border-0 rounded-4">

<div class="card-body">

<h5 class="fw-bold mb-4">
Ringkasan Inventaris
</h5>

<div class="row text-center">

<div class="col-4">

<h3 class="fw-bold text-primary">
<?= $totalKategori ?>
</h3>

<small class="text-muted">
Kategori
</small>

</div>

<div class="col-4">

<h3 class="fw-bold text-info">
<?= $totalRuangan ?>
</h3>

<small class="text-muted">
Ruangan
</small>

</div>

<div class="col-4">

<h3 class="fw-bold text-warning">
<?= $totalMaintenance ?>
</h3>

<small class="text-muted">
Maintenance
</small>

</div>

</div>

</div>
</div>

</div>

<!-- Maintenance -->
<div class="col-md-6">

<div class="card shadow-sm border-0 rounded-4">

<div class="card-body">

<h5 class="fw-bold mb-4">
Statistik Maintenance
</h5>

<div class="row text-center">

<div class="col-4">

<h3 class="fw-bold text-warning">
<?= $totalProses ?>
</h3>

<small class="text-muted">
Proses
</small>

</div>

<div class="col-4">

<h3 class="fw-bold text-success">
<?= $totalSelesai ?>
</h3>

<small class="text-muted">
Selesai
</small>

</div>

<div class="col-4">

<h3 class="fw-bold text-primary">
Rp <?= number_format($totalBiaya) ?>
</h3>

<small class="text-muted">
Biaya
</small>

</div>

</div>

</div>
</div>

</div>

</div>

<!-- REPORT -->
<div class="card border-0 shadow-sm rounded-4 mt-4">

<div class="card-body">

<h4 class="fw-bold mb-3">
Report Inventaris
</h4>

<p class="text-muted">
Cetak laporan sistem inventaris
lab komputer.
</p>

<div class="d-flex gap-2 flex-wrap">

<a href="../report/barang_pdf.php"
target="_blank"
class="btn btn-danger">

PDF Barang
</a>

<a href="../report/maintenance_pdf.php"
target="_blank"
class="btn btn-danger">

PDF Maintenance
</a>

<a href="../report/barang_excel.php"
class="btn btn-success">

Excel Barang
</a>

<a href="../report/maintenance_excel.php"
class="btn btn-success">

Excel Maintenance
</a>

</div>

</div>

</div>

<!-- WELCOME -->
<div class="card border-0 shadow-sm mt-4 rounded-4">

<div class="card-body">

<h4 class="fw-bold">
Selamat Datang,
<?= $_SESSION['nama']; ?> 👋
</h4>

<p class="text-muted mb-0">

Selamat datang di Sistem
Inventaris Lab Komputer.

Gunakan menu sidebar
untuk mengelola data.

</p>

</div>

</div>

</div>

<?php include '../template/footer.php'; ?>