<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="/<?= $judulMain; ?>/cek_so">Penjualan Barang </a>
            <?= $aksi; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- Tambah data -->
        <div class="card-body">
          <table>
            <tr>
              <th>No SO</th>
              <td>:</td>
              <td><?= $dataMain['no_so'] ?></td>
            </tr>
            <tr>
              <th>Tanggal SO</th>
              <td>:</td>
              <td class="tanggal"><?= $dataMain['tgl_so'] ?></td>
            </tr>
            <tr>
              <th>Nama Customer</th>
              <td>:</td>
              <td><?= $dataMain['nama_customer'] ?></td>
            </tr>
            <tr>
              <th>Alamat NPWP</th>
              <td>:</td>
              <td><?= $dataMain['alamat_npwp'] ?></td>
            </tr>
            <!-- <tr>
                            <th>Alamat Kirim</th>
                            <td>:</td>
                            <td><? //= $dataMain['alamat'] 
                                ?></td>
                        </tr> -->
            <tr>
              <th>Keterangan SO</th>
              <td>:</td>
              <td><?= $dataMain['keterangan'] ?></td>
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
                <th colspan="2">Jumlah Pengeluaran</th>
                <th colspan="2">Hasil Pengeluaran</th>
                <th colspan="2">Sisa Pengeluaran</th>
                <th rowspan="2">Alamat Kirim</th>
                <th rowspan="2">Tanggal Kirim</th>
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
                <td class="rupiah"><?= number_format($value['berat_total'], 2)
                                    ?></td>
                <td class="rupiah"><?= $value['quantitas_mutasi'] ?></td>
                <td class="rupiah"><?= number_format($value['berat_total_mutasi'], 2)
                                    ?></td>
                <td class="rupiah"><?php $q_akhir = $value['quantitas'] - $value['quantitas_mutasi'];
                                    echo $q_akhir ?></td>
                <td class="rupiah"><?php $q_akhir_berat = $value['berat_total'] - $value['berat_total_mutasi'];
                                    echo number_format($q_akhir_berat, 2) ?></td>
                <td><?= $value['alamat'] ?></td>
                <td class="tanggal"><?= $value['tgl_kirim']; ?></td>
                <td><?php
                    if ($value['status_so'] == 0) {
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
                <th>Tanggal Kirim</th>
                <th>Alamat Kirim</th>
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