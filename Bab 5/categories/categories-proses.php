<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Proses Kategori</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        body { background: #f5f6fa; }
        .card { max-width: 600px; margin: 40px auto; }
        .data-echo {
            background: #f1f1f1;
            border-left: 5px solid var(--primary-color);
            padding: 10px 15px;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
        .data-echo strong { color: var(--primary-color); }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h3>Hasil Input Komoditas</h3>
        </div>
        
        <?php
        // Tugas BAB 5: Menerima data dari formulir
        if(isset($_POST['simpan'])) {
            $categories = $_POST['categories'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            // $photo = $_POST['photo']; // Handling file upload
            
            echo "<p>Data berikut (pura-pura) berhasil disimpan ke database:</p>";
            echo "<div class='data-echo'><strong>Nama:</strong> $categories</div>";
            echo "<div class='data-echo'><strong>Harga:</strong> Rp $price / kg</div>";
            echo "<div class='data-echo'><strong>Deskripsi:</strong> $description</div>";

        } else {
            echo "<p>Tidak ada data yang dikirim.</p>";
        }
        ?>

        <a href="categories.php" class="btn btn-tambah" style="margin-top: 20px;">Kembali ke Daftar</a>
    </div>
</body>
</html>