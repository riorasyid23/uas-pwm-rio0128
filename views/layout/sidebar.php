<?php
$page = @$_GET['page'];
if ($page == 'dashboard'  || $page == '') {
  $dashboard = 'active';
} else if ($page == 'product') {
  $product = 'active';
} else if ($page == 'add-products') {
  $product = 'active';
} else if ($page == 'report') {
  $report = 'active';
}
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= baseUrl() ?>" class="brand-link">
    <span class="brand-text font-weight-light">iSmart.id</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">Dasboard</li>
        <li class="nav-item">
          <a href="?page=dashboard" class="nav-link <?= $dashboard ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">Product</li>
        <li class="nav-item">
          <a href="<?= baseUrl('public/admin/?page=product') ?>" class="nav-link <?= $product ?>">
            <i class="nav-icon fas fa-align-justify"></i>
            <p>
              Produk
            </p>
          </a>
        </li>
        <li class="nav-header">Laporan</li>
        <li class="nav-item">
          <a href="?page=report" class="nav-link <?= $report ?>">
            <i class="nav-icon fas fa-book-reader"></i>
            <p>
              Laporan
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>