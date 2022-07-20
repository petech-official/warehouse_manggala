<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <!-- <h3 class="card-title"><? //= $judul; 
                                      ?></h3> -->
          <h3 class="card-title"><a href="/penyimpanan/cek_stock">Stock Barang</a>/ Stock Barang detail </h3>
        </div>
        <!-- /.card-header -->
        <!-- Tambah data -->
        <div class="card-body">
          <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif ?>
          <table>
            <tr>
              <th>Nama</th>
              <td>:</td>
              <td><?= $dataMain['jenis']; ?> <?= $dataMain['ukuran']; ?> <?= $dataMain['keterangan']; ?> - <?= $dataMain['grade']; ?></td>
            </tr>
            <tr>
              <th>Ukuran Box</th>
              <td>:</td>
              <td><?= $dataMain['jenis_box'] ?></td>
            </tr>
          </table>
          <br>
          <table class="table table-bordered table-striped" id="data-table1">
            <thead>
              <tr>
                <!-- Masukan Disini -->
                <th>Tanggal Masuk</th>
                <th>Berat (Kg)</th>
                <th>Posisi</th>
                <!-- Selesai Disini -->
                <?php if (session()->get('status')  != 'Manager Marketing') : ?>
                  <th>Aksi</th>
                <?php endif ?>
              </tr>
            </thead>
            <tbody style="padding: 50px;">
              <?php
              $i = 1;
              foreach ($data as $key => $value) : ?>
                <tr>
                  <!-- Masukan Disini -->
                  <td class="tanggal"><?= $value['tgl_masuk']; ?></td>
                  <td><?= $value['berat_detail']; ?></td>
                  <td><?= $value['posisi'];
                      ?></td>
                  <!-- Selesai Disini -->
                  <?php if (session()->get('status')  != 'Manager Marketing') : ?>
                    <td>
                      <a href="/<?= $judul; ?>/edit/<?= $value['id_stock_detail']; ?>" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah"><i class="fas fa-pen"></i></a>
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <!-- Button trigger modal -->
                    </td>
                  <?php endif ?>
                </tr>
              <?php endforeach ?>
            </tbody>
            <tfoot>
              <tr>
                <!-- Masukan Disini -->
                <th>Tanggal Masuk</th>
                <th>Berat (Kg)</th>
                <th>Posisi</th>
                <!-- Selesai Disini -->
                <?php if (session()->get('status')  != 'Manager Marketing') : ?>
                  <th>Aksi</th>
                <?php endif ?>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<form action="/<?= $judul; ?>/delete" method="POST" class="d-inline">
  <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin akan menghapus data ini ?
          <input type="hidden" id="id" name="id">
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  // delete
  function konfirmasiDelete(id) {
    $('#id').val(id);
  }
</script>

<?= $this->endSection(); ?>