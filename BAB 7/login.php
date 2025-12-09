<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM tb_admin WHERE username = '$user'";
    $result = mysqli_query($koneksi, $sql);

    if(mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        if(password_verify($pass, $data['password'])) {
            $_SESSION['log'] = true;
            $_SESSION['user'] = $user;
            echo "<script>alert('Login Berhasil'); window.location='admin.php';</script>";
        } else {
            echo "<script>alert('Password Salah');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login Agrisob</title>
    <style>
        body { background: #2f855a; font-family: 'Poppins', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 40px; border-radius: 10px; width: 350px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.2); }
        .login-card h2 { color: #333; margin-bottom: 20px; }
        .input-field { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .btn-submit { width: 100%; padding: 12px; background: #2f855a; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .btn-submit:hover { background: #276f49; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Login Admin</h2>
        <form action="" method="POST">
            <input type="text" name="username" class="input-field" placeholder="Username" required>
            <input type="password" name="password" class="input-field" placeholder="Password" required>
            <button type="submit" name="login" class="btn-submit">Masuk</button>
        </form>
        <p style="margin-top: 15px; font-size: 14px;">Belum punya akun? <a href="register.php">Daftar</a></p>
    </div>
</body>
</html>