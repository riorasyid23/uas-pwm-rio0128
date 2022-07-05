<?php
$id = $_GET['id'];
$product = "SELECT * FROM products join (
  select * from image_products
  where id in (
      select min(id) from image_products group by product_id
  )
) as produk
on products.id = produk.product_id WHERE products.id = '$id'";
$results = mysqli_query($koneksi, $product) or die(mysqli_error($koneksi));
$data = mysqli_fetch_assoc($results);
?>
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-5">
        <h3 class="d-inline-block d-sm-none"><?= $data['product'] ?></h3>
        <div class="col-12">
          <img src="<?= image($data['image']) ?>" style="width: 30rem; height: 15rem;
            object-fit: cover;" class="product-image" alt="Product Image">
        </div>
        <div class="col-12 product-image-thumbs">
          <?php
          $image = "SELECT * FROM image_products WHERE product_id = '$id'";
          $images = mysqli_query($koneksi, $image) or die(mysqli_error($koneksi));
          while ($image = mysqli_fetch_assoc($images)) : ?>
            <div class="product-image-thumb rounded">
              <img src="<?= image($image['image']) ?>" class="rounded" style="width: 5rem; height: 5rem;" alt="Product Image">
            </div>
          <?php endwhile ?>
        </div>
      </div>
      <div class="col-12 col-sm-7">
        <h3 class="mb-3"><?= $data['product'] ?></h3>
        <p><?= $data['description'] ?></p>
        <hr>
        <div class="bg-gray py-2 px-3 mt-4">
          <h2 class="mb-0">
            <?= moneyFormat($data['price']) ?>
          </h2>
        </div>

        <div class="mt-4">
          <form action="<?= baseUrl('views/user/cart/add_cart.php') ?>" method="post">
            <button name="cart" value="<?= $data['product_id'] ?>" type="submit" class="btn btn-primary btn-lg btn-flat">
              <i class="fas fa-cart-plus fa-lg mr-2"></i>
              Tambahkan ke keranjang
            </button>
            <!-- <div class="btn btn-default btn-lg btn-flat">
              <i class="fas fa-heart fa-lg mr-2"></i>
              Add to Wishlist
            </div> -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="pb-3"></div>
<!-- /.card-body -->