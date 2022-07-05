<style>
  .imgGallery img {
    padding: 8px;
    max-width: 100px;
  }
</style>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        Tambah Produk
      </div>
      <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="imgGallery">
            <!-- image preview -->
          </div>
          <div class="form-group">
            <label for="chooseFile">Pilih Beberapa gambar</label>
            <div class="custom-file">
              <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple>
              <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
          </div>
          <div class="form-group">
            <label for="produk">Nama produk</label>
            <input type="text" required name="produk" placeholder="Nama Produk" id="produk" class="form-control">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" style="height: 500px"></textarea>
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input type="number" id="harga" name="harga" placeholder="Harga Product" class="form-control">
            </div>
          </div>
          <button type="submit" name="add" class="btn btn-primary mt-3">Tambah Produk</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // code
    $(function() {
      // Multiple images preview with JavaScript
      var multiImgPreview = function(input, imgPreviewPlaceholder) {
        if (input.files) {
          var filesAmount = input.files.length;
          for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
              $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
            }
            reader.readAsDataURL(input.files[i]);
          }
        }
      };
      $('#chooseFile').on('change', function() {
        multiImgPreview(this, 'div.imgGallery');
      });
    });
  });
</script>

<?php

if (isset($_POST['add'])) {
  $product = $_POST['produk'];
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];

  $queryTambah = mysqli_query($koneksi, "INSERT INTO products (product, description, price)
  VALUES ('$product','$deskripsi','$harga');") or die(mysqli_error($koneksi));
  $product_id = $koneksi->insert_id;


  $uploadsDir = "../assets/products/";
  $allowedFileType = array('jpg', 'png', 'jpeg');

  // Velidate if files exist
  if (!empty(array_filter($_FILES['fileUpload']['name']))) {

    // Loop through file items
    foreach ($_FILES['fileUpload']['name'] as $id => $val) {
      // Get file name
      $fileName        = $_FILES['fileUpload']['name'][$id];
      $extension       = explode('.', $fileName);
      $name            = md5($fileName . date('Y-m-d H:i:s:u')) . '.' . end($extension);

      // Get files upload path
      $tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
      $targetFilePath  = $uploadsDir . $name;
      $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
      $uploadDate      = date('Y-m-d H:i:s');
      $uploadOk = 1;
      if (in_array($fileType, $allowedFileType)) {
        if (move_uploaded_file($tempLocation, $targetFilePath)) {

          $sqlVal = "('" . $name . "', $product_id)";
        } else {
?>
          <script>
            alert("File coud not be uploaded.")
          </script>

        <?php

        }
      } else {
        ?>
        <script>
          alert("Only .jpg, .jpeg and .png file formats allowed.")
        </script>

        <?php

      }
      // Add into MySQL database
      if (!empty($sqlVal)) {
        $insert = mysqli_query($koneksi, "INSERT INTO image_products (image, product_id) VALUES $sqlVal");

        if ($insert) {
        ?>
          <script>
            alert("Product berhasil ditambahkan.")
            document.location.href = "?page=product";
          </script>

        <?php

        } else {
        ?>
          <script>
            alert("Files coudn't be uploaded due to database error.")
          </script>

    <?php

        }
      }
    }
  } else {
    // Error
    ?>
    <script>
      alert("Please select a file to upload.")
    </script>

<?php

  }
}
?>