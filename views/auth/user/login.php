<?php
session_start();
include '../../../include/koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND level = 'user'";
$query = mysqli_query($koneksi, $sql);
$cek = mysqli_num_rows($query);

if ($cek > 0) {
  $data = mysqli_fetch_assoc($query);
  $_SESSION['client'] = $username;
  $_SESSION['user'] = $data['name'];
  $_SESSION['id'] = $data['id'];
  $_SESSION['role'] = $data['level'];
  echo "<script>
	alert('Berhasil Login');
  document.location='../../../public/user/index.php';
	</script>";
} else {
  echo "<script>
	alert('username atau password anda salah');
  document.location='index.php';
	</script>";
}


