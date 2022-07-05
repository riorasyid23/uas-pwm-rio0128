<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Produk</h3>
        <a href="?page=add-products" class="float-right btn-sm btn btn-primary">Tambah Produk</a>
      </div>

      <!-- /.card-header -->
      <div class="card-body">
        <table id="example" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>product</th>
              <th>harga</th>
              <th>gambar</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "select * from products join (
              select * from image_products
              where id in (
                  select min(id) from image_products group by product_id
              )
          ) as most_recent_user_widget
          on products.id = most_recent_user_widget.product_id";
            $no = 1;
            $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
            while ($data = mysqli_fetch_assoc($query)) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td class="text-truncate" style="max-width: 100px;"><?= $data['product'] ?></td>
                <td><?= moneyFormat($data['price']) ?></td>
                <td><img class="img-fluid rounded-lg" width="50" src="<?= image($data['image']) ?>"></td>
                <td class="text-center">
                  <a href="?page=edit-products&id=<?= $data['product_id'] ?>" class="btn-sm btn btn-warning">Edit</a> |
                  <form action="" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $data['product_id'] ?>">
                    <button type="submit" name="delete" onclick="return confirm('yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<?php

if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $sql = "SELECT * FROM image_products WHERE product_id = '$id'";
  $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
  while ($data = mysqli_fetch_assoc($query)) {
    unlink('../../public/assets/products/' . $data['image']);
  }

  $query_delete = "DELETE FROM products WHERE id = '$id'";
  $sql_delete = mysqli_query($koneksi, $query_delete) or die(mysqli_error($koneksi));

  if ($sql_delete) {
?>
    <script type="text/javascript">
      alert('data berhasil dihapus');
      document.location = '?page=product';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('data gagal dihapus');
      document.location = '?page=product';
    </script>
<?php
  }
}
?>