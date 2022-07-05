<?php
// mengaktifkan sesi
session_start();
if (isset($_SESSION['admin'])) {

  // menghapus semua sesi
  unset($_SESSION['admin']);
  unset($_SESSION['nama']);
  unset($_SESSION['level']);
?>
  <script type="text/javascript">
    alert('anda berhasil keluar');
    document.location = '../../index.php';
  </script>
<?php
} else {
  echo "<script type='text/javascript'>
	alert('anda belum login');
	document.location='../../index.php';
</script>";
}
