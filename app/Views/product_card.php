<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Cards | Spotify Inventory</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Spotify Font -->
  <link href="https://fonts.googleapis.com/css2?family=Circular+Std:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

    /* Navbar - Spotify Style */
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

    /* Header */
    .content-header {
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

    .page-subtitle {
      color: var(--spotify-text-gray);
      font-size: 14px;
      font-weight: 500;
      letter-spacing: 0.5px;
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

    /* Product Cards - Spotify Style */
    .spotify-card {
      background: linear-gradient(135deg, var(--spotify-card-bg), rgba(24, 24, 24, 0.6));
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 16px;
      overflow: hidden;
      transition: all 0.3s ease;
      height: 100%;
      position: relative;
    }

    .spotify-card:hover {
      transform: translateY(-8px);
      border-color: rgba(29, 185, 84, 0.3);
      box-shadow: 
        0 12px 24px rgba(0, 0, 0, 0.5),
        0 0 0 1px rgba(29, 185, 84, 0.2);
    }

    .spotify-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--spotify-green), #1ed760);
      opacity: 0.8;
    }

    .price-badge {
      background: linear-gradient(135deg, var(--spotify-green), #1aa34a);
      color: var(--spotify-black);
      font-weight: 800;
      font-size: 14px;
      padding: 6px 12px;
      border-radius: 20px;
      border: 2px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 2px 8px rgba(29, 185, 84, 0.3);
    }

    .product-name {
      font-size: 18px;
      font-weight: 700;
      color: var(--spotify-white);
      margin-bottom: 8px;
      line-height: 1.3;
    }

    .product-description {
      color: var(--spotify-text-gray);
      font-size: 14px;
      line-height: 1.5;
      min-height: 42px;
      margin-bottom: 20px;
    }

    /* Barcode Section */
    .barcode-container {
      background: rgba(0, 0, 0, 0.4);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      padding: 16px;
      margin: 20px 0;
      text-align: center;
    }

    .barcode-image {
      max-width: 100%;
      height: auto;
      filter: invert(1);
    }

    .product-id {
      color: var(--spotify-text-gray);
      font-size: 12px;
      letter-spacing: 1px;
      margin-top: 8px;
      font-family: 'Courier New', monospace;
    }

    /* Action Buttons */
    .card-actions {
      display: flex;
      gap: 12px;
      margin-top: 20px;
    }

    .btn-spotify {
      flex: 1;
      background: linear-gradient(135deg, var(--spotify-green), #1aa34a);
      border: none;
      border-radius: 50px;
      color: var(--spotify-black);
      font-weight: 700;
      font-size: 14px;
      padding: 10px;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      text-decoration: none;
    }

    .btn-spotify:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(29, 185, 84, 0.4);
      color: var(--spotify-black);
    }

    .btn-spotify.delete {
      background: linear-gradient(135deg, #ff6b6b, #ff5252);
    }

    .btn-spotify.delete:hover {
      box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
    }

    /* Empty State */
    .empty-state {
      background: rgba(24, 24, 24, 0.8);
      border: 2px dashed rgba(255, 255, 255, 0.1);
      border-radius: 16px;
      padding: 40px 20px;
      text-align: center;
    }

    .empty-state i {
      font-size: 48px;
      color: var(--spotify-text-gray);
      margin-bottom: 16px;
    }

    .empty-state h4 {
      color: var(--spotify-text-gray);
      font-weight: 600;
      margin-bottom: 8px;
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
    }

    @media (max-width: 768px) {
      .page-title {
        font-size: 24px;
      }
    }

    /* Grid Layout */
    .row.g-4 {
      --bs-gutter-x: 1.5rem;
      --bs-gutter-y: 1.5rem;
    }

    /* Animation for cards */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .spotify-card {
      animation: fadeInUp 0.5s ease forwards;
    }

    /* Stagger animation for cards */
    .col-12:nth-child(1) .spotify-card { animation-delay: 0.1s; }
    .col-12:nth-child(2) .spotify-card { animation-delay: 0.2s; }
    .col-12:nth-child(3) .spotify-card { animation-delay: 0.3s; }
    .col-12:nth-child(4) .spotify-card { animation-delay: 0.4s; }
    .col-12:nth-child(5) .spotify-card { animation-delay: 0.5s; }
    .col-12:nth-child(6) .spotify-card { animation-delay: 0.6s; }
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
      <a class="nav-item" href="<?= base_url('/dashboard') ?>">
        <i class="bi bi-table"></i>
        <span>Products Table</span>
      </a>

      <a class="nav-item active" href="<?= base_url('products/card') ?>">
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
      <a class="nav-item" href="<?= base_url('/dashboard') ?>">
        <i class="bi bi-table"></i>
        <span>Products Table</span>
      </a>

      <a class="nav-item active" href="<?= base_url('products/card') ?>">
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
      <div class="content-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
          <div>
            <h1 class="page-title">Product Cards</h1>
            <div class="page-subtitle">
              <i class="bi bi-music-note-list"></i>
              Total Products: <span class="text-success"><?= esc($totalProducts ?? 0) ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Product Cards Grid -->
      <div class="row g-4">
        <?php if (!empty($products) && is_array($products)): ?>
          <?php foreach ($products as $p): ?>
            <?php
              $barcodeText = 'PROD' . str_pad((string)($p['id'] ?? ''), 5, '0', STR_PAD_LEFT);
              $barcodeUrl = 'https://bwipjs-api.metafloor.com/?bcid=code39'
                . '&text=' . urlencode($barcodeText)
                . '&scale=3'
                . '&height=10'
                . '&includetext'
                . '&textsize=14'
                . '&textxalign=center'
                . '&paddingwidth=8'
                . '&paddingheight=10';
            ?>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
              <div class="spotify-card p-4 h-100">
                <!-- Price Badge -->
                <div class="d-flex justify-content-between align-items-start mb-3">
                  <div class="product-name"><?= esc($p['product_name'] ?? '') ?></div>
                  <span class="price-badge">
                    ₱ <?= number_format((float)($p['price'] ?? 0), 2) ?>
                  </span>
                </div>

                <!-- Description -->
                <div class="product-description">
                  <?= esc($p['description'] ?? 'No description available') ?>
                </div>

                <!-- Barcode -->
                <div class="barcode-container">
                  <img
                    src="<?= esc($barcodeUrl) ?>"
                    alt="Barcode for product <?= esc($barcodeText) ?>"
                    class="barcode-image img-fluid"
                    loading="lazy"
                  >
                  <div class="product-id">ID: <?= esc($barcodeText) ?></div>
                </div>

                <!-- Action Buttons -->
                <div class="card-actions">
                  <a href="<?= base_url('products/edit/' . $p['id']) ?>" class="btn-spotify">
                    <i class="bi bi-pencil"></i> Edit
                  </a>
                  <a href="<?= base_url('products/delete/' . $p['id']) ?>"
                     class="btn-spotify delete"
                     onclick="return confirm('Are you sure you want to delete this product?');">
                    <i class="bi bi-trash"></i> Delete
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12">
            <div class="empty-state">
              <i class="bi bi-music-note-beamed"></i>
              <h4>No products found</h4>
              <p class="text-muted">Add some products to see them displayed here</p>
              <a href="<?= base_url('product/productForm') ?>" class="btn-spotify mt-3">
                <i class="bi bi-plus-circle"></i> Add First Product
              </a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const mobileMenu = document.getElementById('mobileMenu');
      const toggle = document.getElementById('mobileToggle');
      
      // Toggle mobile menu
      if (toggle) {
        toggle.addEventListener('click', () => {
          mobileMenu.classList.toggle('show');
          toggle.innerHTML = mobileMenu.classList.contains('show') 
            ? '<i class="bi bi-x-lg"></i>' 
            : '<i class="bi bi-list"></i>';
        });
      }

      // Close mobile menu when clicking outside
      document.addEventListener('click', function (event) {
        const isMobile = window.innerWidth <= 991.98;
        if (isMobile && !mobileMenu.contains(event.target) && !toggle.contains(event.target)) {
          mobileMenu.classList.remove('show');
          toggle.innerHTML = '<i class="bi bi-list"></i>';
        }
      });

      // Card hover effects
      const cards = document.querySelectorAll('.spotify-card');
      cards.forEach(card => {
        card.addEventListener('mouseenter', function () {
          this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function () {
          this.style.transform = 'translateY(0) scale(1)';
        });
      });

      // Add loading state to buttons
      const buttons = document.querySelectorAll('.btn-spotify');
      buttons.forEach(button => {
        button.addEventListener('click', function (e) {
          if (this.classList.contains('delete')) {
            if (!confirm('Are you sure you want to delete this product?')) {
              e.preventDefault();
              return;
            }
          }
          
          // Add loading spinner
          const originalHTML = this.innerHTML;
          this.innerHTML = '<i class="bi bi-arrow-clockwise spin"></i> Loading...';
          this.disabled = true;
          
          // Revert after 2 seconds (in case page doesn't navigate)
          setTimeout(() => {
            this.innerHTML = originalHTML;
            this.disabled = false;
          }, 2000);
        });
      });

      // Add CSS for spinner
      const style = document.createElement('style');
      style.textContent = `
        @keyframes spin {
          from { transform: rotate(0deg); }
          to { transform: rotate(360deg); }
        }
        .spin {
          animation: spin 1s linear infinite;
          display: inline-block;
        }
      `;
      document.head.appendChild(style);
    });
  </script>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>