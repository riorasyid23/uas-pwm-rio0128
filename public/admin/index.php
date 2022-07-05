<?php
include_once '../../include/koneksi.php';
session_start();
if (!isset($_SESSION['admin'])) {
  header('location: ../../views/auth/admin/index.php');
}
if ($_SESSION['level'] != 'admin') {
  echo "Anda tidak boleh mengakses halaman ini! silahkan login sebagai <a href='../../views/auth/admin/index.php'>admin</a>";
  die();
}

include '../../views/layout/header.php';
include '../../views/layout/navbar.php';
include '../../views/layout/sidebar.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?php include '../../views/layout/main.php' ?>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include '../../views/layout/footer.php'; ?>