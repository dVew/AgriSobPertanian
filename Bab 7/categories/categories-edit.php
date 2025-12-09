<?php
include '../koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM tb_categories WHERE id = '$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/admin.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <title>Edit Categories</title>
</head>
<body>
    <div class="home-content" style="margin-left:240px; padding:20px;">
        <div class="card">
            <h3>Edit Komoditas</h3>
            <form class="form-grid" action="categories-proses.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <input type="hidden" name="foto_lama" value="<?php echo $data['photo']; ?>">

                <div class="form-group">
                    <label>Nama Komoditas</label>
                    <input class="input" type="text" name="categories" value="<?php echo $data['categories']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input class="input" type="number" name="price" value="<?php echo $data['price']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input class="input" type="text" name="description" value="<?php echo $data['description']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Foto Saat Ini</label><br>
                    <img src="../img_categories/<?php echo $data['photo']; ?>" width="100px" style="margin-bottom:10px;">
                    <input type="file" name="photo" />
                </div>
                <button type="submit" class="btn btn-simpan" name="edit">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</body>
</html>