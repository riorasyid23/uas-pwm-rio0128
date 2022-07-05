<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Laporan Penjualan</h3>
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
            $sql = "SELECT nama, alamat, no, total, user_id, order_id, qty FROM orders RIGHT JOIN carts ON orders.id = carts.order_id GROUP BY order_id";
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