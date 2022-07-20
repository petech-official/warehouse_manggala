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
          <h4>Daftar Kebutuhan Barang</h4>
          <hr>
          <table class="table table-bordered table-striped" id="data-table1">
            <thead>
              <tr>
                <th>No</th>
                <!-- Masukan Disini -->
                <th>Nama Barang</th>

                <th>Berat (Kg)</th>
                <th>Supplier</th>
              </tr>
            </thead>

            <tbody style="padding: 50px;">
              <?php
              foreach ($dataSupplier as $key => $data) {
                $i = 1; ?>
                <!-- apff -->

                <?php foreach ($dataStock as $key => $value) { ?>
                  <tr>

                    <?php

                    if ($data['id_supplier'] == $value['id_supplier']) { ?>
                      <td><?= $i++; ?></td>
                      <!-- Masukan Disini -->

                      <td><?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> <?= $value['lot']; ?> <?= $value['grade']; ?></td>
                      <td class="rupiah"><?php
                                          $kebutuhan = $value['max_berat'] - $value['berat_total'];
                                          echo $kebutuhan ?></td>
                      <td>
                        <?= $value['singkatan']; ?>
                      </td>
                    <?php } ?>
                  </tr>
                <?php } ?>

                <tr>
                  <th>No</th>
                  <!-- Masukan Disini -->
                  <th>Nama Barang</th>

                  <th>Berat (Kg)</th>
                  <th>Supplier</th>
                </tr>

              <?php             } ?>
              <!--  -->

              <!--  -->
            </tbody>
          </table>
        </div>
        <?php if (session()->get('status')  != 'Manager Marketing') : ?>
          <div class="card-footer">
            <a href="/pengadaan/index" class="btn btn-primary mr-2">Stock Barang</a>
            <a href="/<?= $judul; ?>/cek_po" class="btn btn-primary">Pengadaan Barang (PO)</a>
          </div>
        <?php endif ?>
        <?php if (session()->get('status')  == 'Manager Marketing') : ?>
          <div class="card-footer">
            <a href="/po/index" class="btn btn-primary">Pengadaan Barang (PO)</a>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>