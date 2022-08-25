<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $judul; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- Tambah data -->
        <div class="card-body">
          <h4>Penjualan Barang (SO)</h4>
          <hr>
          <table class="table table-bordered table-striped" id="data-table1">
            <thead>
              <tr>
                <th>No</th>
                <!-- Masukan Disini -->
                <th>No SO</th>
                <th>Tanggal SO</th>
                <th>Nama Customer</th>
                <!-- <th width="200px">Alamat Kirim</th> -->
                <th>Keterangan</th>
                <th>Status SO</th>
                <!-- Selesai Disini -->
                <th width="150px">Aksi</th>
              </tr>
            </thead>
            <tbody style="padding: 50px;">
              <?php
              $i = 1;
              foreach ($data as $key => $value) : ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <!-- Masukan Disini -->
                  <td><?= $value['no_so']; ?></td>
                  <td class="tanggal"><?= $value['tgl_so']; ?></td>
                  <td><?= $value['nama_customer']; ?></td>
                  <!-- <td><? //= $value['alamat']; 
                            ?></td> -->
                  <td><?= $value['keterangan']; ?></td>
                  <td>
                    <?php
                    if ($value['status'] == 0) {
                    ?>
                      <span class="badge bg-warning">Berjalan</span>
                    <?php } else { ?>
                      <span class="badge bg-success">Selesai</span>
                    <?php } ?>
                  </td>
                  <!-- Selesai Disini -->
                  <td>
                    <a href="/Pengeluaran/cek_so_detail/<?= $value['id_so']; ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <!-- Masukan Disini -->
                <th>No SO</th>
                <th>Tanggal SO</th>
                <th>Nama Customer</th>
                <th>Keterangan</th>
                <th>Status SO</th>
                <!-- Selesai Disini -->
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="card-footer">
          <a href="/pengeluaran/index" class="btn btn-primary mr-2">Jadwal Pengeluaran (Schedule)</a>
          <a href="/dorder/index" class="btn btn-primary">Pengiriman (DO)</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>