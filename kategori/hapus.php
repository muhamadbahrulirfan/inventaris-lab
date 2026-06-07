<?php
include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM data_kategori
    WHERE id_kategori='$id'"
);

header("Location: index.php");
exit;