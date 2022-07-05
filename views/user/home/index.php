<div class="row">
  <?php
  $sql = "select * from products join (
    select * from image_products
    where id in (
        select min(id) from image_products group by product_id
    )
) as produk
on products.id = produk.product_id";
  $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
  while ($data = mysqli_fetch_assoc($query)) : ?>
    <div class="col-12 col-md-3">
      <a href="<?= baseUrl('public/user/?clients=produk&id=' . $data['product_id'] . '') ?>" class="card text-decoration-none text-dark">
        <img src="<?= image($data['image']) ?>" class="card-img-top rounded-top" alt="image-produk" style="height: 15rem; object-fit: cover;">
        <div class="card-body">
          <h4 class="font-weight-bold d-inline-block text-truncate" style="max-width: 200px;"><?= $data['product'] ?></h4>
          <!-- <div class="col-2 text-truncate"><?= $data['description'] ?></div> -->
          <h5 class=" text-danger font-weight-bold"><?= moneyFormat($data['price']) ?></h5>
        </div>
      </a>
    </div>
  <?php endwhile ?>
</div>