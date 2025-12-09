<?php
include '../koneksi.php';

// --- PROSES SIMPAN (CREATE) ---
if(isset($_POST['simpan'])) {
    $categories = $_POST['categories'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    
    // Upload Foto
    $nama_foto = $_FILES['photo']['name'];
    $source = $_FILES['photo']['tmp_name'];
    $folder = '../img_categories/';
    
    if($nama_foto != '') {
        move_uploaded_file($source, $folder . $nama_foto);
        
        // PERBAIKAN DI SINI (URUTANNYA DISESUAIKAN DENGAN TABEL DATABASE)
        // Urutan: NULL(id), categories, price, description, photo
        $sql = "INSERT INTO tb_categories VALUES (NULL, '$categories', '$price', '$description', '$nama_foto')";
        
        if(mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Data Berhasil Disimpan'); window.location='categories.php';</script>";
        } else {
            echo "<script>alert('Gagal Menyimpan: " . mysqli_error($koneksi) . "'); window.location='categories-entry.php';</script>";
        }
    } else {
        echo "<script>alert('Foto Tidak Boleh Kosong'); window.location='categories-entry.php';</script>";
    }
}

// --- PROSES EDIT (UPDATE) ---
elseif(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $categories = $_POST['categories'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $foto_lama = $_POST['foto_lama'];

    // Cek apakah user ganti foto?
    if($_FILES['photo']['name'] != '') {
        $nama_foto = $_FILES['photo']['name'];
        $source = $_FILES['photo']['tmp_name'];
        $folder = '../img_categories/';

        // Hapus foto lama & upload baru
        if(file_exists($folder . $foto_lama)){
            unlink($folder . $foto_lama);
        }
        move_uploaded_file($source, $folder . $nama_foto);

        // Update dengan foto baru
        $sql = "UPDATE tb_categories SET categories='$categories', price='$price', description='$description', photo='$nama_foto' WHERE id='$id'";
    } else {
        // Update tanpa ganti foto
        $sql = "UPDATE tb_categories SET categories='$categories', price='$price', description='$description' WHERE id='$id'";
    }

    if(mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Data Berhasil Diubah'); window.location='categories.php';</script>";
    } else {
        echo "<script>alert('Gagal Mengubah Data: " . mysqli_error($koneksi) . "'); window.location='categories-edit.php?id=$id';</script>";
    }
}
?>