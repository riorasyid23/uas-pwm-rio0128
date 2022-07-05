<?php
include '../../../include/koneksi.php';
if (isset($_POST['checkout'])) {
  $carts = $_POST['carts'];
  $products = explode(',', $carts);
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $no = $_POST['no'];
  $count = $_POST['count'];

  $order = "INSERT INTO orders (nama, alamat, no, total) VALUES ('$nama', '$alamat', '$no', '$count')";
  $queryOrder = mysqli_query($koneksi, $order) or die(mysqli_error($koneksi));
  $order_id = $koneksi->insert_id;

  foreach ($products as $product) {
    $sql = "UPDATE carts SET status = '1', order_id = '$order_id' WHERE id = '$product'";
    $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
  }
  header("Location: " . baseUrl('public/user/?clients=order'));
}
