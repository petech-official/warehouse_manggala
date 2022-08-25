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
          <h4>Pengadaan Barang (PO)</h4>
          <hr>
          <table class="table table-bordered table-striped" id="data-table1">
            <thead>
              <tr>
                <th>No</th>
                <!-- Masukan Disini -->
                <th>No PO</th>
                <th>Tanggal PO</th>
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
                <th>Keterangan</th>
                <th>Status PO</th>
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
                  <td><?= $value['no_po']; ?></td>
                  <td class="tanggal"><?= $value['tgl_po']; ?></td>
                  <td><?= $value['nama']; ?></td>
                  <td><?= $value['alamat']; ?></td>
                  <td><?= $value['keterangan_po']; ?></td>
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
                    <a href="/Pengadaan/cek_po_detail/<?= $value['id_po']; ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <!-- Masukan Disini -->
                <th>No PO</th>
                <th>Tgl PO</th>
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
                <th>Keterangan</th>
                <th>Status PO</th>
                <!-- Selesai Disini -->
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="card-footer">
          <a href="/<?= $judul; ?>/list_barang" class="btn btn-primary mr-2">Daftar Kebutuhan Barang</a>
          <a href="/<?= $judul; ?>/cek_overload" class="btn btn-primary">Kontrol Barang</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>