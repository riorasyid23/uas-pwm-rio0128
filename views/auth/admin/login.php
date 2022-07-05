<?php
session_start();
include '../../../include/koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND level = 'admin'";
$query = mysqli_query($koneksi, $sql);
$cek = mysqli_num_rows($query);

if ($cek > 0) {
  $data = mysqli_fetch_assoc($query);
  $_SESSION['admin'] = $username;
  $_SESSION['nama'] = $data['name'];
  $_SESSION['level'] = $data['level'];
  if ($_SESSION['level'] == 'admin') {
    header('location: ../../../public/admin/index.php');
  } elseif ($_SESSION['level'] == 'user') {
    header('location: ../../../public/user/index.php');
  }
} else {
  echo "<script>
	alert('username atau password anda salah');
  document.location='index.php';
	</script>";
}
