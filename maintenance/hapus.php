<?php
include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM data_maintenance
    WHERE id_maintenance='$id'"
);

header("Location: index.php");
exit;