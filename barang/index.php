<?php
include '../template/header.php';
include '../config/koneksi.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM data_barang
    ORDER BY id_barang DESC"
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
                    Data Barang
                </h4>
                <small class="text-muted">
                    Kelola kategori barang inventaris
                    </small>
                    </div>
                <a href="tambah.php"
                   class="btn btn-primary">

                    <i class="bi bi-plus-circle"></i>
                    Tambah Barang
                </a>

            </div>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Merk</th>
                            <th>Jumlah</th>
                            <th>Kode Kategori</th>
                            <th>Kode Ruangan</th>
                            <th>Tahun Beli</th>
                            <th>Kondisi</th>
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
                            <?= $row['nama_barang'] ?>
                        </td>

                        <td>
                            <?= $row['merk'] ?>
                        </td>

                        <td>
                            <?= $row['jumlah'] ?>
                        </td>

                        <td>
                            <?= $row['id_kategori'] ?>
                        </td>

                        <td>
                            <?= $row['id_ruangan'] ?>
                        </td>

                        <td>
                            <?= $row['tahun_beli'] ?>
                        </td>

                        <td>
                            <?= ucfirst($row['kondisi']) ?>
                        </td>

                        <td>

                            <a href="edit.php?id=<?= $row['id_barang'] ?>"
                               class="btn btn-warning btn-sm">

                                Edit
                            </a>

                            <a href="hapus.php?id=<?= $row['id_barang'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data?')">

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