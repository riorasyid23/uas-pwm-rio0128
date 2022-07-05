<style>
  .imgGallery img {
    padding: 8px;
    max-width: 100px;
  }
</style>

<?php
$id = @$_GET['id'];
$select = "SELECT * FROM products WHERE id = '$id'";
$query_select = mysqli_query($koneksi, $select) or die(mysqli_error($koneksi));
$data = mysqli_fetch_assoc($query_select);
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        Tambah Produk
      </div>
      <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <!-- <div class="imgGallery">
          </div>
          <div class="form-group">
            <label for="chooseFile">Pilih Beberapa gambar</label>
            <div class="custom-file">
              <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple>
              <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
          </div> -->
          <div class="form-group">
            <label for="produk">Nama produk</label>
            <input type="text" required value="<?= $data['product'] ?>" name="produk" placeholder="Nama Produk" id="produk" class="form-control">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" style="height: 500px"><?= $data['description'] ?></textarea>
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input type="number" value="<?= $data['price'] ?>" id="harga" name="harga" placeholder="Harga Product" class="form-control">
            </div>
          </div>
          <button type="submit" name="edit" class="btn btn-primary mt-3">Tambah Produk</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

if (isset($_POST['edit'])) {
  $product = $_POST['produk'];
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];

  $sql = "UPDATE products set product = '$product', description = '$deskripsi', price = '$harga' WHERE id = '$id'";
  $queryTambah = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
  if ($queryTambah) {
?>
    <script>
      alert("Product berhasil diubah.")
      document.location.href = "?page=product";
    </script>

<?php

  }
}
?>