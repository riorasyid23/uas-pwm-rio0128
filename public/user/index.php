<?php
include_once '../../include/koneksi.php';
session_start();
include '../../views/layout/clients/header.php';
include '../../views/layout/clients/navbar.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <div class="content pt-5">
    <div class="container">
      <?php include '../../views/layout/clients/main.php' ?>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
 
<footer class="main-footer bg-foot">
    <div class="footertext">
      <b>Copyright &copy; iSmart.id (Rio Al Rasyid-19.01.53.0128) 2022 All Right reserved</b>
    </div>
</footer>

<!-- Main Footer -->
<!-- <footer class="main-footer bg-foot">
  <strong>Copyright &copy; iSmart.id 2022 All rights reserved.</strong>
</footer>
</div> -->
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<script src="../../dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?= baseUrl('/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= baseUrl('/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= baseUrl('/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
</body>

</html>