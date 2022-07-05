<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Riwayat Pembelian Saya</h3>
      </div>

      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Penerima</th>
              <th>Alamat Penerima</th>
              <th>No Penerima</th>
              <th>Total Pembayaran</th>
              <!-- <th>action</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
            $user = $_SESSION['id'];
            $sql = "SELECT nama, alamat, no, total, user_id, order_id, qty FROM orders RIGHT JOIN carts ON orders.id = carts.order_id WHERE user_id = $user GROUP BY order_id";
            $no = 1;
            $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
            while ($data = mysqli_fetch_assoc($query)) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama'] ?></td>
                <td class="text-truncate" style="max-width: 100px;"><?= $data['alamat'] ?></td>
                <td class="text-truncate" style="max-width: 100px;"><?= $data['no'] ?></td>
                <td><?= moneyFormat($data['total']) ?></td>
                <!-- <td class="text-center">
                  <button data-toggle="modal" data-target="#detail" class="btn btn-success"><i class="fas fa-eye"></i> Detail</button>
                </td> -->
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

<!-- Modal -->
<!-- <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->