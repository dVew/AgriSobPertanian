<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="../assets/logo.png" />
  <link rel="stylesheet" href="../css/admin.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Agrisob Admin | Categories Entry</title>
</head>

<body>
  <div class="sidebar">
    <div class="logo-details"><i class='bx bxs-dashboard'></i><span class="logo_name">Agrisob</span></div>
    <ul class="nav-links">
      <li><a href="../admin.php"><i class="bx bx-grid-alt"></i><span class="links_name">Dashboard</span></a></li>
      <li><a href="categories.php" class="active"><i class="bx bx-box"></i><span class="links_name">Categories</span></a></li>
      <li><a href="../transactions/transactions.php"><i class="bx bx-list-ul"></i><span class="links_name">Transaction</span></a></li>
      <li><a href="../login.php"><i class="bx bx-log-out"></i><span class="links_name">Log out</span></a></li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button"><i class="bx bx-menu sidebarBtn"></i></div>
      <div class="profile-details"><span class="admin_name" id="admin-name">Agrisob Admin</span></div>
    </nav>
    <div class="home-content">
      <div class="card">
        <div class="card-header">
            <h3 id="form-title">Input Komoditas Baru</h3>
        </div>
        
        <form class="form-grid" action="categories-proses.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="categories">Nama Komoditas</label>
            <input class="input" type="text" name="categories" id="categories" placeholder="Contoh: Padi IR64" />
            <div id="category-validation" class="validation-message"></div>
          </div>
          <div class="form-group">
            <label for="price">Harga (per kg)</label>
            <input class="input" type="number" name="price" id="price" placeholder="Contoh: 12000" />
          </div>
          <div class="form-group">
            <label for="description">Deskripsi</label>
            <input class="input" type="text" name="description" id="description" placeholder="Deskripsi singkat komoditas" />
          </div>
          <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" />
          </div>
          <button type="submit" class="btn btn-simpan" name="simpan"><i class='bx bxs-save'></i>Simpan</button>
        </form>

      </div>
    </div>
  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = () => sidebar.classList.toggle("active");

    const adminNameElement = document.getElementById('admin-name');
    document.addEventListener('DOMContentLoaded', () => {
      let savedName = localStorage.getItem('agrisobAdminName');
      if (savedName) {
        adminNameElement.textContent = savedName;
      }
    });

    // Event 'onchange'
    const categoryInput = document.getElementById('categories');
    const validationMessage = document.getElementById('category-validation');
    categoryInput.addEventListener('change', function() {
      let inputValue = categoryInput.value;
      if(inputValue.length < 3 && inputValue.length > 0) {
        validationMessage.textContent = 'Nama komoditas terlalu pendek.';
      } else if (inputValue.length > 3) {
        validationMessage.textContent = 'Nama komoditas valid. (onchange)';
      } else {
        validationMessage.textContent = '';
      }
    });

    // Cek Edit Mode 
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const editName = urlParams.get('edit');
        if (editName) {
            document.getElementById('form-title').textContent = `Edit Komoditas: ${editName}`;
            document.getElementById('categories').value = editName;
        }
    });

  </script>
</body>
</html>