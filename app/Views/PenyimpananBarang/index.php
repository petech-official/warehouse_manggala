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
                    <a href="/<?= $judul; ?>/tambah" class="btn btn-primary">Tambah Data</a><br><br>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif ?>
                    <table class="table table-bordered table-striped" id="data-table1">
                        <thead>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>No</th>
                                <th>Posisi</th>
                                <th>Nama Barang</th>
                                <th>Max Berat</th>
                                <th>Disimpan</th>
                                <th>Status</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 50px;">
                            <?php
                            $i = 1;
                            foreach ($data as $key => $value) : ?>
                                <tr>
                                    <!-- Masukan Disini -->
                                    <td><?= $i++ ?></td>
                                    <td><?= $value['posisi_barang']; ?></td>
                                    <td><?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> - <?= $value['grade']; ?> - <?= $value['lot']; ?></td>
                                    <td class="rupiah"><?= $value['berat_penyimpanan']; ?></td>
                                    <td class=""><?= $value['disimpan']; ?></td>
                                    <td>
                                        <?php
                                        if ($value['status_penyimpanan'] == 1) {
                                        ?>
                                            <span class="badge bg-danger">Penuh</span>
                                        <?php } else { ?>
                                            <span class="badge bg-success">Tersedia</span>
                                        <?php } ?>
                                    </td>
                                    <!-- Selesai Disini -->
                                    <td>
                                        <!-- hapus jika perlu -->

                                        <!-- end hapus -->
                                        <?php
                                        if ($value['disimpan'] == 0) { ?>
                                            <a href="/<?= $judul; ?>/edit/<?= $value['id_penyimpanan']; ?>" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                        <?php } ?>

                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <!-- Button trigger modal -->
                                        <button type="button" href='#modalHapus' onclick="konfirmasiDelete(<?= $value['id_penyimpanan']; ?>)" class="btn btn-danger" data-toggle="modal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>No</th>
                                <th>Posisi</th>
                                <th>Nama Barang</th>
                                <th>Berat</th>
                                <th>Disimpan</th>
                                <th>Status</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
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