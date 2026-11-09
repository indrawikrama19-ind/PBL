<?php
// login.php
session_start();

$error_message = '';

// Data dummy (ganti email/password sesuai kebutuhan)
$dummy_users = [
    [
        'email' => 'mahasiswa@pnj.ac.id',
        'password' => '123456',
        'nama' => 'Mahasiswa PKL'
    ],
    [
        'email' => 'admin@pnj.ac.id',
        'password' => 'admin123',
        'nama' => 'Admin PKL'
    ]
];

// Proses saat form dionklik / di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_email = $_POST['email'] ?? '';
    $input_password = $_POST['password'] ?? '';

    $login_success = false;

    // Cek inputan ke data dummy
    foreach ($dummy_users as $user) {
        if ($user['email'] === $input_email && $user['password'] === $input_password) {
            $login_success = true;
            $_SESSION['user'] = $user['nama'];
            break;
        }
    }

    if ($login_success) {
        // Jika login berhasil, redirect ke halaman dashboard/index
        header('Location: dashboard_mhsw.php');
        exit;
    } else {
        $error_message = 'Email atau password salah!';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container">
            <!-- Panel Kiri (Hero / Banner) -->
            <div class="hero-section">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <h1>WELCOME TO PKL SYSTEM</h1>
                    <h2>Start Your Internship Journey</h2>
                    <p>A centralized platform to manage internship applications, approvals, monitoring, and reporting. One System, Every PKL Process.</p>
                </div>
            </div>

            <!-- Panel Kanan (Form Login) -->
            <div class="form-section">
                <div class="card-form">
                    <h2>Welcome Back</h2>
                    <p class="subtitle">Sign in to continue to your PKL dashboard.</p>

                    <form action="login.php" method="POST">
                        <div class="input-group">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>

                        <div class="input-group">
                            <input type="password" id="password" name="password" placeholder="Password" required>
                            <i class="fa-regular fa-eye toggle-password" id="togglePassword"></i>
                        </div>

                        <div class="form-options">
                            <label class="remember-me">
                                <input type="checkbox" name="remember">
                                <span>Remember me</span>
                            </label>
                            <a href="#" class="forgot-pass">Forgot Password?</a>
                        </div>

                        <button type="submit" class="btn-submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>