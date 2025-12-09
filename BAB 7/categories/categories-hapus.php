<?php
include '../koneksi.php';
$id = $_GET['id'];

// Ambil info gambar untuk dihapus dari folder
$sql_img = "SELECT photo FROM tb_categories WHERE id = '$id'";
$res = mysqli_query($koneksi, $sql_img);
$row = mysqli_fetch_assoc($res);

unlink('../img_categories/' . $row['photo']); // Hapus file gambar

// Hapus data DB
$sql = "DELETE FROM tb_categories WHERE id = '$id'";

if(mysqli_query($koneksi, $sql)) {
    echo "<script>alert('Data Dihapus'); window.location='categories.php';</script>";
} else {
    echo "<script>alert('Gagal Hapus'); window.location='categories.php';</script>";
}
?>