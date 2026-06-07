<?php
include '../template/header.php';
include '../config/koneksi.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM users
    ORDER BY id_users DESC"
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
                        Data Users
                    </h4>
                </div>

            </div>
   
            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
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
                            <?= $row['name'] ?>
                        </td>

                        <td>
                            <?= $row['jk'] ?>
                        </td>

                        <td>
                            <?= $row['username'] ?>
                        </td>
                        <td>
                            <?= $row['email'] ?>
                        </td>

                        <td>

                            <?php
                            if($row['role'] == 'admin'){
                                echo '<span class="badge bg-danger">Admin</span>';
                            }elseif($row['role'] == 'teknisi'){
                                echo '<span class="badge bg-warning text-dark">Teknisi</span>';
                            }else{
                                echo '<span class="badge bg-primary">Dosen</span>';
                            }
                            ?>

                        </td>

                        <td>

                            <?php
                            if($row['status'] == 'aktif'){
                                echo '<span class="badge bg-success">Aktif</span>';
                            }else{
                                echo '<span class="badge bg-secondary">Nonaktif</span>';
                            }
                            ?>

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