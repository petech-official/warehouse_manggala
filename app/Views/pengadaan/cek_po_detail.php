<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <a href="/pengadaan/cek_po">Pengadan Barang </a>/ Detail Data
          </h3>
        </div>
        <!-- /.card-header -->
        <!-- Tambah data -->
        <div class="card-body">
          <table>
            <tr>
              <th>No PO</th>
              <td>:</td>
              <td><?= $dataMain['no_po'] ?></td>
            </tr>
            <tr>
              <th>Tanggal PO</th>
              <td>:</td>
              <td class="tanggal"><?= $dataMain['tgl_po'] ?></td>
            </tr>
            <tr>
              <th>Nama Supplier</th>
              <td>:</td>
              <td><?= $dataMain['nama'] ?></td>
            </tr>
            <tr>
              <th>Alamat Supplier</th>
              <td>:</td>
              <td><?= $dataMain['alamat'] ?></td>
            </tr>

          </table>
          <hr>

          <table class="table table-bordered table-striped" id="data-table1">
            <thead>
              <tr>
                <th rowspan="2">No</th>
                <!-- Masukan Disini -->
                <th rowspan="2">Nama Barang</th>
                <th rowspan="2">Lot</th>
                <th colspan="2">Jumlah Pengadaan</th>
                <th colspan="2">Hasil Pengadaan</th>
                <th colspan="2">Sisa Pengadaan</th>
                <th rowspan="2">Keterangan</th>
                <th rowspan="2">Status</th>
                <!-- Selesai Disini -->
              </tr>
              <tr>
                <th>Box</th>
                <th>Kg</th>
                <th>Box</th>
                <th>Kg</th>
                <th>Box</th>
                <th>Kg</th>
              </tr>
            </thead>
            <?php
            $i = 1;
            foreach ($data as $key => $value) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <!-- Masukan Disini -->
                <td><?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> - <?= $value['grade']; ?></td>
                <td><?= $value['lot']; ?></td>
                <td class="rupiah"><?= $value['quantitas'] ?></td>
                <td class="rupiah"><?= $value['berat_total']
                                    ?></td>
                <td class="rupiah"><?= $value['quantitas_mutasi'] ?></td>
                <td class="rupiah"><?= $value['berat_total_mutasi']
                                    ?></td>
                <td class="rupiah"><?php $q_akhir = $value['quantitas'] - $value['quantitas_mutasi'];
                                    echo $q_akhir ?></td>
                <td class="rupiah"><?php $q_akhir_berat = $value['berat_total'] - $value['berat_total_mutasi'];
                                    echo $q_akhir_berat ?></td>



                <td><?= $value['keterangan_po_detail'] ?></td>
                <td><?php
                    if ($value['status_po'] == 0) {
                    ?>
                    <span class="badge bg-warning">Berjalan</span>
                  <?php } else { ?>
                    <span class="badge bg-success">Selesai</span>
                  <?php } ?>
                </td>
                <!-- Selesai Disini -->
              </tr>
            <?php endforeach ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <!-- Masukan Disini -->
                <th>Nama Barang</th>
                <th>Lot</th>
                <th>Box</th>
                <th>Kg </th>
                <th>Box</th>
                <th>Kg </th>
                <th>Box</th>
                <th>Kg </th>
                <th>Keterangan</th>
                <th>Status</th>
                <!-- Selesai Disini -->
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>