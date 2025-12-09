<!DOCTYPE html>
<html lang="id">
<head>
    <title>Register Agrisob</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .auth-box { max-width: 400px; margin: 100px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); text-align: center; font-family: 'Poppins', sans-serif; }
        .input-group { margin-bottom: 15px; }
        .input-group input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
        .btn-auth { background: #2f855a; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; width: 100%; }
    </style>
</head>
<body style="background: #f5f6fa;">
    <div class="auth-box">
        <h2 style="color: #2f855a; margin-bottom: 20px;">Register Admin</h2>
        <form action="" method="POST">
            <div class="input-group"><input type="text" name="username" placeholder="Username" required></div>
            <div class="input-group"><input type="email" name="email" placeholder="Email" required></div>
            <div class="input-group"><input type="password" name="password" placeholder="Password" required></div>
            <button type="submit" name="register" class="btn-auth">Daftar</button>
        </form>
        <p style="margin-top: 15px;">Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</body>
</html>

<?php
include 'koneksi.php';
if(isset($_POST['register'])) {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi Password

    $sql = "INSERT INTO tb_admin VALUES (NULL, '$user', '$pass', '$email')";
    if(mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Register Berhasil, Silakan Login'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Gagal Register');</script>";
    }
}
?>