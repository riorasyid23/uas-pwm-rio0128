<footer class="main-footer bg-foot">
    <div class="footertext">
      <b>Copyright &copy; iSmart.id (Rio Al Rasyid-19.01.53.0128) 2022 All Right reserved</b>
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= baseUrl('plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= baseUrl('/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= baseUrl('/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= baseUrl('/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= baseUrl('/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= baseUrl('/') ?>dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?= baseUrl('/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= baseUrl('/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= baseUrl('/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= baseUrl('/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= baseUrl('/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= baseUrl('/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= baseUrl('/') ?>plugins/jszip/jszip.min.js"></script> -->
<script src="<?= baseUrl('/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= baseUrl('/') ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= baseUrl('/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= baseUrl('/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<!-- Page Script -->

<!-- <div class="row">
  <div class="col-12 col-md-4">
    l
  </div>
  <div class="col-12 col-md-4">
    B
  </div>
  <div class="col-12 col-md-4">
    r
  </div>
</div> -->
<script>
  $(function() {
    $('#deskripsi').summernote()
    let table = $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "lengthChange": true,
      dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });
    $("#example").DataTable({
      "responsive": true,
      "autoWidth": false
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  table.buttons().container()
    .appendTo('#example_wrapper .col-md-6:eq(0)');
</script>
</body>

</html>