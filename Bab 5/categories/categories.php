<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="../assets/logo.png" />
  <link rel="stylesheet" href="../css/admin.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Agrisob Admin | Categories</title>
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxs-dashboard'></i>
      <span class="logo_name">Agrisob</span>
    </div>
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
          <h3>Data Komoditas</h3>
          <a href="categories-entry.php" class="btn btn-tambah"><i class='bx bx-plus'></i>Tambah Data</a>
        </div>
        
        <div class="item-list" id="commodity-list">
          <p>Memuat data komoditas...</p>
        </div>

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

    document.addEventListener('DOMContentLoaded', function() {
      const itemList = document.getElementById('commodity-list');
      
      fetch('../data/commodities.json') 
        .then(response => { 
          if (!response.ok) { throw new Error('Gagal memuat data'); }
          return response.json(); 
        })
        .then(data => {
          itemList.innerHTML = ''; 
          data.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.className = 'item';
            itemElement.innerHTML = `
              <div class="item-img"><img src="${item.image}" alt="${item.name}"></div>
              <div class="item-details">
                <h5>${item.name}</h5>
                <p>${item.description}</p>
                <p class="price">${item.price}</p>
              </div>
              <div class="action-buttons">
                <button class="btn-edit" onclick="editCategory('${item.name}')"><i class='bx bxs-pencil'></i>Edit</button>
                <button class="btn-delete" onclick="deleteCategory('${item.name}')"><i class='bx bxs-trash'></i>Hapus</button>
              </div>
            `;
            itemList.appendChild(itemElement);
          });
          
          setupMouseEvents(); 
        })
        .catch(error => {
          console.error('Error:', error);
          itemList.innerHTML = '<p>Gagal memuat data komoditas.</p>';
        });
    });

    function editCategory(name) {
      alert(`Anda akan mengedit data: ${name}\n(PopUp Box - Alert)`);
      window.location.href = `categories-entry.php?edit=${name}`;
    }

    function deleteCategory(name) {
      let isConfirmed = confirm(`Apakah Anda yakin ingin menghapus ${name}?\n(PopUp Box - Confirm)`);
      if (isConfirmed) {
        alert(`${name} berhasil dihapus! (Data tidak benar-benar terhapus)`);
      } else {
        alert("Penghapusan dibatalkan.");
      }
    }

    function setupMouseEvents() {
      const items = document.querySelectorAll('.item');
      items.forEach(item => {
        item.addEventListener('mouseover', function() { this.classList.add('item-hover'); });
        item.addEventListener('mouseout', function() { this.classList.remove('item-hover'); });
      });
    }
  </script>
</body>
</html>