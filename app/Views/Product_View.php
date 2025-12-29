<!-- app/Views/product_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product List | Spotify Inventory</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Spotify Font -->
  <link href="https://fonts.googleapis.com/css2?family=Circular+Std:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <style>
    :root {
      --spotify-black: #000000;
      --spotify-dark: #121212;
      --spotify-gray: #181818;
      --spotify-light-gray: #282828;
      --spotify-green: #1DB954;
      --spotify-white: #FFFFFF;
      --spotify-text-gray: #B3B3B3;
      --spotify-card-bg: rgba(24, 24, 24, 0.8);
      --navbar-h: 70px;
    }

    body {
      background: linear-gradient(180deg, var(--spotify-black) 0%, var(--spotify-dark) 100%) !important;
      color: var(--spotify-white) !important;
      font-family: 'Circular Std', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      min-height: 100vh;
      margin: 0;
      padding: 0;
      padding-top: var(--navbar-h);
    }

    /* ========= Spotify Navbar ========= */
    .spotify-navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: var(--navbar-h);
      background: linear-gradient(180deg, var(--spotify-black) 0%, var(--spotify-dark) 40%);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      padding: 0 30px;
      z-index: 1030;
      display: flex;
      align-items: center;
      gap: 30px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .spotify-logo {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 16px;
      border-radius: 12px;
      background: linear-gradient(135deg, rgba(29, 185, 84, 0.15), rgba(29, 185, 84, 0.05));
      border: 1px solid rgba(29, 185, 84, 0.2);
      text-decoration: none;
    }

    .spotify-logo i {
      color: var(--spotify-green);
      font-size: 28px;
      filter: drop-shadow(0 2px 4px rgba(29, 185, 84, 0.3));
    }

    .logo-text {
      font-weight: 800;
      font-size: 20px;
      letter-spacing: -0.5px;
      background: linear-gradient(45deg, var(--spotify-white), var(--spotify-green));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      line-height: 1.2;
    }

    .logo-subtext {
      font-size: 11px;
      color: var(--spotify-text-gray);
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .spotify-nav {
      display: flex;
      flex-direction: row;
      gap: 10px;
      flex: 1;
    }

    .nav-item {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 10px 18px;
      border-radius: 25px;
      text-decoration: none;
      color: var(--spotify-text-gray);
      transition: all 0.2s ease;
      border: 1px solid transparent;
      white-space: nowrap;
      font-size: 14px;
      font-weight: 600;
    }

    .nav-item i {
      font-size: 18px;
    }

    .nav-item:hover {
      background: rgba(255, 255, 255, 0.05);
      color: var(--spotify-white);
      border-color: rgba(255, 255, 255, 0.1);
      transform: translateY(-2px);
    }

    .nav-item.active {
      background: rgba(29, 185, 84, 0.1);
      color: var(--spotify-white);
      border-color: rgba(29, 185, 84, 0.3);
      font-weight: 700;
    }

    .nav-item.active i {
      color: var(--spotify-green);
      filter: drop-shadow(0 0 8px rgba(29, 185, 84, 0.4));
    }

    .navbar-spacer {
      flex: 1;
    }

    .logout-section {
      display: flex;
      align-items: center;
    }

    .logout-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 10px 18px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: 700;
      font-size: 14px;
      color: #ff6b6b;
      background: rgba(255, 107, 107, 0.1);
      border: 1px solid rgba(255, 107, 107, 0.2);
      transition: all 0.3s ease;
    }

    .logout-btn:hover {
      background: rgba(255, 107, 107, 0.2);
      color: #ff5252;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(255, 107, 107, 0.2);
    }

    /* Main Content */
    .spotify-content {
      padding: 30px;
      min-height: calc(100vh - var(--navbar-h));
    }

    /* Mobile Toggle */
    .mobile-toggle {
      display: none;
      background: var(--spotify-green);
      border: none;
      border-radius: 8px;
      width: 40px;
      height: 40px;
      align-items: center;
      justify-content: center;
      color: var(--spotify-black);
      font-weight: 800;
      transition: all 0.3s ease;
    }

    .mobile-toggle:hover {
      transform: scale(1.05);
      background: #1ed760;
    }

    .mobile-menu {
      display: none;
      position: fixed;
      top: var(--navbar-h);
      left: 0;
      right: 0;
      background: linear-gradient(180deg, var(--spotify-black) 0%, var(--spotify-dark) 40%);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      padding: 20px;
      z-index: 1020;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .mobile-menu.show {
      display: block;
    }

    .mobile-menu .spotify-nav {
      flex-direction: column;
    }

    .mobile-menu .logout-section {
      margin-top: 15px;
      padding-top: 15px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* ========= Header Styles ========= */
    .page-header {
      margin-bottom: 30px;
      padding-bottom: 20px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .page-title {
      font-size: 32px;
      font-weight: 800;
      margin: 0;
      background: linear-gradient(45deg, var(--spotify-white), var(--spotify-green));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .stats-card {
      background: linear-gradient(135deg, var(--spotify-card-bg), rgba(24, 24, 24, 0.6));
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 16px;
      padding: 20px;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .stats-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--spotify-green), #1ed760);
      opacity: 0.8;
    }

    .stats-card:hover {
      transform: translateY(-4px);
      border-color: rgba(29, 185, 84, 0.3);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    }

    .stats-number {
      font-size: 32px;
      font-weight: 800;
      color: var(--spotify-green);
      margin: 0;
      line-height: 1;
    }

    .stats-label {
      color: var(--spotify-text-gray);
      font-size: 14px;
      font-weight: 600;
      letter-spacing: 0.5px;
      margin-top: 4px;
    }

    /* Search Bar */
    .spotify-search {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 50px;
      padding: 0;
      overflow: hidden;
    }

    .spotify-search input {
      background: transparent;
      border: none;
      color: var(--spotify-white);
      padding: 12px 20px;
      font-size: 14px;
      width: 100%;
    }

    .spotify-search input:focus {
      outline: none;
      box-shadow: none;
    }

    .spotify-search input::placeholder {
      color: var(--spotify-text-gray);
    }

    .search-btn {
      background: var(--spotify-green);
      border: none;
      color: var(--spotify-black);
      padding: 0 20px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .search-btn:hover {
      background: #1ed760;
    }

    .clear-btn {
      background: transparent;
      border: none;
      color: var(--spotify-text-gray);
      padding: 0 15px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .clear-btn:hover {
      color: var(--spotify-white);
    }

    /* Action Button */
    .btn-spotify {
      background: linear-gradient(135deg, var(--spotify-green), #1aa34a);
      border: none;
      border-radius: 50px;
      color: var(--spotify-black);
      font-weight: 700;
      font-size: 14px;
      padding: 12px 24px;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-spotify:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(29, 185, 84, 0.4);
      color: var(--spotify-black);
    }

    /* Alerts */
    .spotify-alert {
      background: rgba(24, 24, 24, 0.9);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      color: var(--spotify-white);
      padding: 16px 20px;
      margin-bottom: 20px;
      animation: slideIn 0.3s ease;
    }

    .alert-success {
      border-left: 4px solid var(--spotify-green);
      background: rgba(29, 185, 84, 0.1);
    }

    .alert-danger {
      border-left: 4px solid #ff6b6b;
      background: rgba(255, 107, 107, 0.1);
    }

    .alert-warning {
      border-left: 4px solid #ffd166;
      background: rgba(255, 209, 102, 0.1);
    }

    .alert-info {
      border-left: 4px solid #118ab2;
      background: rgba(17, 138, 178, 0.1);
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Table Styles */
    .spotify-table-container {
      background: linear-gradient(135deg, var(--spotify-card-bg), rgba(24, 24, 24, 0.6));
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 16px;
      overflow: hidden;
      margin-top: 20px;
    }

    .spotify-table {
      width: 100%;
      color: var(--spotify-white);
      border-collapse: separate;
      border-spacing: 0;
    }

    .spotify-table thead {
      background: rgba(40, 40, 40, 0.9);
    }

    .spotify-table th {
      padding: 16px;
      text-align: left;
      font-weight: 700;
      color: var(--spotify-text-gray);
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      text-transform: uppercase;
      font-size: 12px;
      letter-spacing: 1px;
    }

    .spotify-table td {
      padding: 16px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      vertical-align: middle;
    }

    .spotify-table tbody tr {
      transition: all 0.2s ease;
    }

    .spotify-table tbody tr:hover {
      background: rgba(29, 185, 84, 0.05);
      transform: translateX(4px);
    }

    .price-cell {
      font-weight: 700;
      color: var(--spotify-green);
    }

    .date-cell {
      color: var(--spotify-text-gray);
      font-size: 13px;
    }

    /* Action Buttons */
    .action-buttons {
      display: flex;
      gap: 8px;
    }

    .btn-table {
      padding: 6px 12px;
      font-size: 12px;
      font-weight: 700;
      border-radius: 20px;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 4px;
      text-decoration: none;
    }

    .btn-edit {
      background: linear-gradient(135deg, var(--spotify-green), #1aa34a);
      color: var(--spotify-black);
    }

    .btn-delete {
      background: linear-gradient(135deg, #ff6b6b, #ff5252);
      color: white;
    }

    .btn-table:hover {
      transform: translateY(-2px);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    /* Pagination */
    .spotify-pagination {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin-top: 20px;
    }

    .page-link {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      color: var(--spotify-text-gray);
      padding: 8px 16px;
      border-radius: 20px;
      text-decoration: none;
      transition: all 0.3s ease;
      font-weight: 600;
      font-size: 14px;
    }

    .page-link:hover {
      background: rgba(29, 185, 84, 0.2);
      color: var(--spotify-white);
      border-color: rgba(29, 185, 84, 0.3);
    }

    .page-link.active {
      background: linear-gradient(135deg, var(--spotify-green), #1aa34a);
      color: var(--spotify-black);
      border-color: var(--spotify-green);
    }

    .page-link.disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 40px 20px;
      color: var(--spotify-text-gray);
    }

    .empty-state i {
      font-size: 48px;
      margin-bottom: 16px;
      opacity: 0.5;
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
      .spotify-navbar {
        padding: 0 20px;
      }

      .spotify-nav,
      .logout-section {
        display: none;
      }

      .mobile-toggle {
        display: flex;
      }

      .spotify-content {
        padding: 20px;
      }

      .spotify-table {
        display: block;
        overflow-x: auto;
      }

      .action-buttons {
        flex-direction: column;
        gap: 4px;
      }
    }

    @media (max-width: 768px) {
      .page-title {
        font-size: 24px;
      }

      .stats-card {
        margin-bottom: 15px;
      }
    }
  </style>
</head>

<body>

  <!-- Spotify Navbar -->
  <nav class="spotify-navbar">
    <a href="<?= base_url('/dashboard') ?>" class="spotify-logo">
      <i class="bi bi-spotify"></i>
      <div>
        <div class="logo-text">Inventory</div>
        <div class="logo-subtext">Product Management</div>
      </div>
    </a>

    <div class="spotify-nav">
      <a class="nav-item active" href="<?= base_url('/dashboard') ?>">
        <i class="bi bi-table"></i>
        <span>Products Table</span>
      </a>

      <a class="nav-item" href="<?= base_url('products/cards') ?>">
        <i class="bi bi-grid-3x3-gap-fill"></i>
        <span>Product Cards</span>
      </a>

      <a class="nav-item" href="<?= base_url('product/productForm') ?>">
        <i class="bi bi-plus-circle-fill"></i>
        <span>Add Product</span>
      </a>
    </div>

    <div class="navbar-spacer"></div>

    <div class="logout-section">
      <a href="<?= base_url('/logout') ?>"
         class="logout-btn"
         onclick="return confirm('Are you sure you want to logout?');">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
      </a>
    </div>

    <button class="mobile-toggle" type="button" id="mobileToggle">
      <i class="bi bi-list"></i>
    </button>
  </nav>

  <!-- Mobile Menu -->
  <div class="mobile-menu" id="mobileMenu">
    <nav class="spotify-nav">
      <a class="nav-item active" href="<?= base_url('/dashboard') ?>">
        <i class="bi bi-table"></i>
        <span>Products Table</span>
      </a>

      <a class="nav-item" href="<?= base_url('products/cards') ?>">
        <i class="bi bi-grid-3x3-gap-fill"></i>
        <span>Product Cards</span>
      </a>

      <a class="nav-item" href="<?= base_url('product/productForm') ?>">
        <i class="bi bi-plus-circle-fill"></i>
        <span>Add Product</span>
      </a>
    </nav>

    <div class="logout-section">
      <a href="<?= base_url('/logout') ?>"
         class="logout-btn"
         onclick="return confirm('Are you sure you want to logout?');">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
      </a>
    </div>
  </div>

  <!-- Main Content -->
  <main class="spotify-content">
    <div class="container-fluid">
      
      <!-- Header -->
      <div class="page-header">
        <h1 class="page-title">Product List</h1>
      </div>

      <!-- Stats & Search Row -->
      <div class="row mb-4">
        <!-- Total Products Card -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="stats-card">
            <div class="d-flex align-items-center">
              <div class="me-3">
                <i class="bi bi-box" style="font-size: 2rem; color: var(--spotify-green);"></i>
              </div>
              <div>
                <h3 class="stats-number"><?= $totalProducts ?></h3>
                <p class="stats-label">Total Products</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Search Bar -->
        <div class="col-lg-5 col-md-6 mb-4">
          <div class="spotify-search d-flex align-items-center">
            <input type="text" 
                   class="form-control border-0" 
                   placeholder="Search products..." 
                   id="searchInput">
            <button class="clear-btn" type="button" id="clearBtn" title="Clear search">
              <i class="bi bi-x"></i>
            </button>
            <button class="search-btn" type="button" id="searchBtn">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </div>

        <!-- Add Product Button -->
        <div class="col-lg-3 col-md-12 mb-4 text-lg-end">
          <a href="<?= base_url('product/productForm') ?>" class="btn-spotify">
            <i class="bi bi-plus-circle"></i> Add Product
          </a>
        </div>
      </div>

      <!-- Flash Messages -->
      <?php if (session()->has('message')): ?>
        <div class="spotify-alert alert-success alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle-fill me-2"></i>
          <?= session('message') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1);"></button>
        </div>
      <?php endif; ?>

      <?php if (session()->has('error')): ?>
        <div class="spotify-alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-circle-fill me-2"></i>
          <?= session('error') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1);"></button>
        </div>
      <?php endif; ?>

      <?php if (session()->has('warning')): ?>
        <div class="spotify-alert alert-warning alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>
          <?= session('warning') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1);"></button>
        </div>
      <?php endif; ?>

      <?php if (session()->has('info')): ?>
        <div class="spotify-alert alert-info alert-dismissible fade show" role="alert">
          <i class="bi bi-info-circle-fill me-2"></i>
          <?= session('info') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1);"></button>
        </div>
      <?php endif; ?>

      <!-- Product Table -->
      <div class="spotify-table-container">
        <div class="table-responsive">
          <table class="spotify-table">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price (₱)</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($products) && is_array($products)): ?>
                <?php foreach ($products as $product): ?>
                  <tr>
                    <td><?= esc($product['product_name']) ?></td>
                    <td><?= esc($product['description']) ?></td>
                    <td class="price-cell">₱ <?= number_format($product['price'], 2) ?></td>
                    <td class="date-cell"><?= date('M d, Y', strtotime($product['created_at'])) ?></td>
                    <td class="date-cell"><?= date('M d, Y', strtotime($product['updated_at'])) ?></td>
                    <td>
                      <div class="action-buttons">
                        <a href="<?= base_url('products/edit/' . $product['id']) ?>" class="btn-table btn-edit">
                          <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="<?= base_url('products/delete/' . $product['id']) ?>" 
                           class="btn-table btn-delete"
                           onclick="return confirm('Are you sure you want to delete this product?');">
                          <i class="bi bi-trash"></i> Delete
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6" class="empty-state">
                    <i class="bi bi-music-note-beamed"></i>
                    <p>No products found</p>
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Pagination -->
      <?php if ($totalPages > 1): ?>
        <div class="mt-4">
          <div class="spotify-pagination">
            <?php if ($currentPage > 1): ?>
              <a href="<?= base_url('?page=' . ($currentPage - 1)) ?>" class="page-link">
                <i class="bi bi-chevron-left"></i>
              </a>
            <?php else: ?>
              <span class="page-link disabled">
                <i class="bi bi-chevron-left"></i>
              </span>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
              <?php if ($i == $currentPage): ?>
                <span class="page-link active"><?= $i ?></span>
              <?php else: ?>
                <a href="<?= base_url('?page=' . $i) ?>" class="page-link"><?= $i ?></a>
              <?php endif; ?>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
              <a href="<?= base_url('?page=' . ($currentPage + 1)) ?>" class="page-link">
                <i class="bi bi-chevron-right"></i>
              </a>
            <?php else: ?>
              <span class="page-link disabled">
                <i class="bi bi-chevron-right"></i>
              </span>
            <?php endif; ?>
          </div>

          <div class="text-center mt-3">
            <p style="color: var(--spotify-text-gray); font-size: 14px;">
              Showing <?= (($currentPage - 1) * $perPage) + 1 ?> to 
              <?= min($currentPage * $perPage, $totalProducts) ?> of 
              <?= $totalProducts ?> products
            </p>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Mobile menu toggle
      const mobileMenu = document.getElementById('mobileMenu');
      const toggle = document.getElementById('mobileToggle');
      
      if (toggle) {
        toggle.addEventListener('click', () => {
          mobileMenu.classList.toggle('show');
          toggle.innerHTML = mobileMenu.classList.contains('show') 
            ? '<i class="bi bi-x-lg"></i>' 
            : '<i class="bi bi-list"></i>';
        });
      }

      // Search functionality
      const searchInput = document.getElementById('searchInput');
      const searchBtn = document.getElementById('searchBtn');
      const clearBtn = document.getElementById('clearBtn');
      const tableRows = document.querySelectorAll('tbody tr');
      const noProductsRow = document.querySelector('tbody tr td[colspan]');
      let originalNoProductsMessage = '';

      if (noProductsRow) {
        originalNoProductsMessage = noProductsRow.innerHTML;
      }

      function performSearch() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        let visibleRows = 0;

        tableRows.forEach(row => {
          if (row.querySelector('td[colspan]')) return;

          const cells = row.querySelectorAll('td');
          let rowText = '';
          cells.forEach((cell, index) => {
            if (index < 3) { // Search only in name, description, price
              rowText += cell.textContent.toLowerCase() + ' ';
            }
          });

          if (searchTerm === '' || rowText.includes(searchTerm)) {
            row.style.display = '';
            visibleRows++;
          } else {
            row.style.display = 'none';
          }
        });

        if (searchTerm !== '' && visibleRows === 0) {
          if (noProductsRow) {
            noProductsRow.innerHTML = '<i class="bi bi-search"></i><p>No products found matching your search.</p>';
            noProductsRow.parentElement.style.display = '';
          }
        } else if (searchTerm === '' || visibleRows > 0) {
          if (noProductsRow) {
            if (searchTerm === '') noProductsRow.innerHTML = originalNoProductsMessage;
            if (visibleRows > 0) noProductsRow.parentElement.style.display = 'none';
          }
        }
      }

      function clearSearch() {
        searchInput.value = '';
        performSearch();
        searchInput.focus();
      }

      searchBtn.addEventListener('click', performSearch);
      clearBtn.addEventListener('click', clearSearch);
      searchInput.addEventListener('input', performSearch);

      searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
          e.preventDefault();
          performSearch();
        }
      });

      // Table row hover effect
      const tableRowsAll = document.querySelectorAll('.spotify-table tbody tr');
      tableRowsAll.forEach(row => {
        row.addEventListener('mouseenter', function() {
          this.style.transform = 'translateX(4px)';
        });
        
        row.addEventListener('mouseleave', function() {
          this.style.transform = 'translateX(0)';
        });
      });

      // Auto-dismiss alerts after 5 seconds
      const alerts = document.querySelectorAll('.spotify-alert');
      alerts.forEach(alert => {
        setTimeout(() => {
          const bsAlert = new bootstrap.Alert(alert);
          bsAlert.close();
        }, 5000);
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>