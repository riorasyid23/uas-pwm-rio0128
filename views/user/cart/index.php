<?php
$user = $_SESSION['id'];
$sql = "SELECT carts.id as cart_id,carts.product_id ,user_id,qty,status,product,description, price,image FROM carts LEFT JOIN products on carts.product_id = products.id join (
      select * from image_products
      where id in (
          select min(id) from image_products group by product_id
      )
  ) as produk
  on products.id = produk.product_id where carts.user_id = '$user' AND carts.status = '0'";
$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
if (mysqli_num_rows($query) < 1) : ?>
  <div class="alert alert-warning">
    <i class="fas fa-exclamation-triangle"></i>
    Keranjang belanja kosong
  </div>
<?php else : ?>
  <div class="row">
    <div class="col-12 col-md-6">
      <?php
      while ($data = mysqli_fetch_assoc($query)) : ?>
        <p class="d-none carts"><?= $data['cart_id'] ?></p>
        <div class="info-box">
          <span class="info-box-icon bg-success">
            <img src="<?= image($data['image']) ?>" class="rounded shadow" style="width: 6rem; height: 6rem;" alt="image produk">
          </span>
          <div class="info-box-content">
            <span class="info-box-text font-weight-bold d-inline-block text-truncate" style="max-width: 400px;"><?= $data['product'] ?></span>
            <span class="info-box-text my-2">
              <form action="" method="post" class="d-inline">
                <input type="hidden" class="produk" value="<?= $data['product_id'] ?>" name="id">
                <button class="btn btn-warning py-0" name="sub">-</button>
                <?= $data['qty'] ?>
                <button class="btn btn-primary py-0" name="add">+</button>
                <button class="btn btn-danger float-right btn-sm" name="delete"><i class="fas fa-trash"></i></button>
              </form>
            </span>
            <span class="total d-none"><?= $data['price'] * $data['qty'] ?></span>
            <span class="info-box-number text-danger"><?= moneyFormat($data['price'] * $data['qty']) ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
      <?php endwhile; ?>
    </div>
    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-body">
          <form action="<?= baseUrl('views/user/cart/checkout.php') ?>" method="POST">
            <div class="form-group">
              <label for="nama">Nama Penerima</label>
              <input type="text" class="form-control" required name="nama" id="nama" placeholder="Nama Penerima">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat Penerima</label>
              <input type="text" class="form-control" required name="alamat" id="alamat" placeholder="Alamat Penerima">
            </div>
            <div class="form-group">
              <label for="no">No hp</label>
              <input type="number" class="form-control" required name="no" id="no" placeholder="No hp">
            </div>
            <div class="form-group">
              <label for="bayar">total Bayar</label>
              <input type="hidden" id="carts" name="carts" multiple>
              <input type="hidden" id="count" name="count">
              <span class="text-danger form-control font-weight-bold" id="bayar"></span>
            </div>
            <button class="btn btn-primary" name="checkout">Checkout</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>

<script>
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }

  let carts = document.querySelectorAll('.carts');

  let data = []
  carts.forEach(function(item) {
    data.push(item.innerHTML)
  })
  document.getElementById('carts').value = data;

  let harga = document.querySelectorAll('.total');
  let bayar = document.getElementById('bayar');
  let total = 0;
  harga.forEach(function(el) {
    total += parseInt(el.innerHTML);
  });
  document.getElementById('count').value = total;
  bayar.innerHTML = formatRupiah(`${total}`, 'Rp. ');
</script>

<?php
if (isset($_POST['add'])) {
  $id = $_POST['id'];
  $user = $_SESSION['id'];
  $sql = "SELECT * FROM carts WHERE product_id = '$id' AND user_id = '$user'";
  $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
  $data = mysqli_fetch_assoc($query);
  $qty = $data['qty'] + 1;
  $sql = "UPDATE carts SET qty = '$qty' WHERE product_id = '$id' AND user_id = '$user'";
  $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
  echo "<script>window.location='" . baseUrl('public/user/?clients=cart') . "'</script>";
}

if (isset($_POST['sub'])) {
  $id = $_POST['id'];
  $user = $_SESSION['id'];
  $sql = "SELECT * FROM carts WHERE product_id = '$id' AND user_id = '$user'";
  $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
  $data = mysqli_fetch_assoc($query);
  $qty = $data['qty'];
  if ($qty > 1) {
    $qty = $qty - 1;
    $sql = "UPDATE carts SET qty = '$qty' WHERE product_id = '$id' AND user_id = '$user'";
    $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    echo "<script>window.location='" . baseUrl('public/user/?clients=cart') . "'</script>";
  }
}

if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $user = $_SESSION['id'];
  $sql = "DELETE FROM carts WHERE product_id = '$id' AND user_id = '$user'";
  $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
  echo "<script>window.location='" . baseUrl('public/user/?clients=cart') . "'</script>";
}

?>