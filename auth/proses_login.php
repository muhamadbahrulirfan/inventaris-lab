<?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM users
    WHERE username='$username'"
);

$user = mysqli_fetch_assoc($query);

if ($user) {

    // if (password_verify(
    //     $password,
    //     $user['password']
    // )) {
    if ($password == $user['password']) {

        $_SESSION['login'] = true;
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['role'] = $user['role'];

        header("Location: ../admin/dashboard.php");
        exit;
    }
}

echo "
<script>
alert('Username atau Password Salah');
window.location='login.php';
</script>
";
?>