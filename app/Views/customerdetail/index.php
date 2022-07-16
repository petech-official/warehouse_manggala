<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><a href="/<?= $judulMain; ?>/index"><?= $judulMain; ?></a>
                        <?= $aksi; ?> <?= $dataMain['nama_customer'] ?></h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Nama Customer</th>
                            <td>:</td>
                            <td><?= $dataMain['nama_customer'] ?></td>
                        </tr>
                        <tr>
                            <th>No Telp</th>
                            <td>:</td>
                            <td><?= $dataMain['telp'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat NPWP</th>
                            <td>:</td>
                            <td><?= $dataMain['alamat_npwp'] ?></td>
                        </tr>
                    </table>
                    <hr>
                    <a href="/<?= $judul; ?>/tambah/<?= $dataMain['id_customer'] ?>" class="btn btn-primary">Tambah Alamat</a><br><br>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif ?>
                    <table class="table table-bordered table-striped" id="data-table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>Alamat Kirim</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 50px;">
                            <?php
                            $i = 1;
                            foreach ($data as $key => $value) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <!-- Masukan Disini -->
                                    <td><?= $value['alamat'] ?></td>
                                    <!-- Selesai Disini -->
                                    <td>
                                        <a href="/<?= $judul; ?>/edit/<?= $value['id_customer_detail']; ?>" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah"><i class="fas fa-pen"></i></a>
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <!-- Button trigger modal -->
                                        <button type="button" href='#modalHapus' onclick="konfirmasiDelete(<?= $value['id_customer_detail']; ?>,<?= $value['id_customer'] ?>)" class="btn btn-danger" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>Alamat Kirim</th>
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
                    <input type="hidden" id="id_customer" name="id_customer">
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
    function konfirmasiDelete(id, id_customer) {
        $('#id').val(id);
        $('#id_customer').val(id_customer);
    }
</script>

<?= $this->endSection(); ?>