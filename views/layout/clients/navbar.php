<!-- Navbar -->
<nav class="main-header navbar navbar-expand new-nav">
  <div class="container">
    <a href="<?= baseUrl() ?>" class="navbar-brand">
      <span class="brand-logo">iSmart.id</span>
    </a>


    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav-item">
        <a class="nav-link cart-logo" href="<?= baseUrl('public/user/?clients=cart') ?>" role="button"><i class="fas fa-cart-plus"></i><span class="badge badge-primary navbar-badge">
            <?php
            if (isset($_SESSION['client'])) {
              $id = $_SESSION['id'];
              $sql = "SELECT SUM(qty) AS total FROM carts where user_id = '$id' AND status = '0'";
              $query = mysqli_query($koneksi, $sql);
              $row = mysqli_fetch_assoc($query);
              $total = $row['total'];
              if ($total == 0) {
                echo "0";
              } else {
                echo $total;
              }
            } else {
              echo "0";
            }
            ?></span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link profile-icon" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php if (isset($_SESSION['role'])) : ?>
            <?php if ($_SESSION['role'] == 'user') : ?>
              <span class="dropdown-item dropdown-header">Halo, <?= $_SESSION['user'] ?></span>
              <div class="dropdown-divider"></div>
              <a href="<?= baseUrl('public/user/?clients=order') ?>" class="dropdown-item">
                <i class="fas fa-shopping-bag"></i> Pembelian Saya
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= baseUrl('views/layout/clients/logout.php') ?>" class="dropdown-item">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            <?php endif ?>
          <?php else : ?>
            <span class="dropdown-item dropdown-header">Anda belum login!</span>
            <a href="<?= baseUrl('views/auth/user/register.php') ?>" class="dropdown-item">
              <i class="fas fa-sign-in-alt"></i> Register
            </a>
            <a href="<?= baseUrl('views/auth/user/index.php') ?>" class="dropdown-item">
              <i class="fas fa-sign-out-alt"></i> Login
            </a>
          <?php endif ?>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!-- /.navbar -->