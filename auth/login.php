<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: ../admin/dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Inventaris Lab Komputer</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            height: 100vh;
            overflow: hidden;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-container {
            height: 100vh;
        }

        .login-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .left-side {
            background: linear-gradient(
                rgba(13,110,253,0.85),
                rgba(102,16,242,0.85)
            ),
            url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 40px;
        }

        .left-side h2 {
            font-weight: bold;
        }

        .right-side {
            padding: 50px;
            background: white;
        }

        .logo-icon {
            font-size: 60px;
            color: #0d6efd;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
        }

        .btn-login {
            border-radius: 12px;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
        }

        .input-group-text {
            border-radius: 12px 0 0 12px;
        }

        @media(max-width:768px){
            .left-side{
                display:none;
            }

            .right-side{
                padding:30px;
            }
        }
    </style>
</head>

<body>

<div class="container login-container d-flex justify-content-center align-items-center">

    <div class="col-lg-9">

        <div class="card login-card">

            <div class="row g-0">

                <!-- Left -->
                <div class="col-md-6 left-side d-flex flex-column justify-content-center">

                    <h2>Sistem Inventaris</h2>
                    <h4>Lab Komputer</h4>

                    <p class="mt-3">
                        Kelola inventaris laboratorium komputer
                        dengan mudah, cepat, dan terstruktur.
                    </p>

                </div>

                <!-- Right -->
                <div class="col-md-6 right-side">

                    <div class="text-center mb-4">
                        <i class="bi bi-pc-display logo-icon"></i>
                        <h3 class="mt-2 fw-bold">
                            Login
                        </h3>
                        <p class="text-muted">
                            Silakan masuk ke akun Anda
                        </p>
                    </div>

                    <form action="proses_login.php" method="POST">

                        <!-- Username -->
                        <div class="mb-3">
                            <label class="form-label">
                                Username
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>

                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    placeholder="Masukkan username"
                                    required
                                >
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label class="form-label">
                                Password
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required
                                >
                            </div>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100 btn-login">

                            <i class="bi bi-box-arrow-in-right"></i>
                            Login
                        </button>

                    </form>

                    <div class="text-center mt-4 text-muted">
                        <small>
                            © 2026 Sistem Inventaris Lab Komputer
                        </small>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>