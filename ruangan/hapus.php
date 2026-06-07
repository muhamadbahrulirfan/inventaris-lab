<?php
include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM data_ruangan
    WHERE id_ruangan='$id'"
);

header("Location: index.php");
exit;