<?php
include '../../../include/koneksi.php';
session_start();
$id = $_POST['cart'];
if (isset($_POST['cart'])) {
  if (isset($_SESSION['role'])) {
    $user = $_SESSION['id'];
    $product_id = $_POST['cart'];

    $query = mysqli_query($koneksi, "SELECT * FROM carts WHERE product_id = '$product_id' AND user_id = '$user' AND status = '0' ");

    if ($query->num_rows > 0) {
      $data = mysqli_fetch_assoc($query);
      $qty = $data['qty'] + 1;
      $sql = "UPDATE carts SET qty = '$qty' WHERE product_id = '$id' AND user_id = '$user' ";
      $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    } else {
      $sql = "INSERT INTO carts (product_id,user_id,qty,status) VALUES ('$product_id', '$user', '1','0')";
      $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    }
    header("Location: " . baseUrl('public/user/?clients=cart'));
  } else {
?>
    <script>
      alert('anda belum login, silahkan login untuk menambahkan ke keranjang');
      document.location.href = "<?= baseUrl('public/user/?clients=produk&id=' . $id . '') ?>";
    </script>
<?php
  }
}
?>