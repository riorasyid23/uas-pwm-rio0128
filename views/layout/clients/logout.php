<?php
session_start();
if (isset($_SESSION['client'])) {

  // menghapus semua sesi
  unset($_SESSION['client']);
  unset($_SESSION['user']);
  unset($_SESSION['id']);
  unset($_SESSION['role']);
  // session_destroy();
?>
  <script type="text/javascript">
    alert('anda berhasil keluar');
    document.location = '../../../index.php';
  </script>
<?php
} else {
  echo "<script type='text/javascript'>
	alert('anda belum login');
	document.location='../../../index.php';
</script>";
}

?>