<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Lab Komputer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            background: #f4f6f9;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            background: #0f172a;
            position: fixed;
            color: white;
        }

        .sidebar-brand {
            padding: 25px;
            font-size: 22px;
            font-weight: bold;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        .sidebar-menu {
            padding: 20px 15px;
        }

        .sidebar-menu a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 8px;
            transition: .3s;
        }

        .sidebar-menu a:hover {
            background: #2563eb;
            color: white;
        }

        .content {
            margin-left: 260px;
            padding: 30px;
        }

        .topbar {
            background: white;
            border-radius: 16px;
            padding: 15px 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
            margin-bottom: 30px;
        }

        .card-stat {
            border: none;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,.08);
            transition: .3s;
        }

        .card-stat:hover {
            transform: translateY(-5px);
        }

        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
        }
    </style>
</head>
<body>