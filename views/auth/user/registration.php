<?php
session_start();
include '../../../include/koneksi.php';
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users (name, username,level,password) VALUES ('$name','$username','user','$password')";
$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

$select = "SELECT * FROM users WHERE id = '$koneksi->insert_id'";
$result =  mysqli_query($koneksi, $select) or die(mysqli_error($koneksi));
$cek = mysqli_num_rows($result);

// $data = mysqli_fetch_assoc($result);
if ($cek > 0) {
  $data = mysqli_fetch_assoc($result);
  $_SESSION['client'] = $username;
  $_SESSION['id'] = $data['id'];
  $_SESSION['user'] = $data['name'];
  $_SESSION['role'] = $data['level'];
  echo "<script>
	alert('Berhasil register');
  document.location='../../../public/user/index.php';
	</script>";
} else {
  echo "<script>
  	alert('username atau password anda salah');
    document.location='../../../public/admin/index.php';
  	</script>";
}
