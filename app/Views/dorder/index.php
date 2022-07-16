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
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>No DO</th>
                                <th>Tanggal DO</th>
                                <th>NO SO</th>
                                <th>NO PO</th>
                                <th>Customer</th>
                                <th width="180px">Catatan</th>
                                <!-- <th width="180px">Alamat Kirim</th> -->
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
                                    <td><?= $value['no_do']; ?></td>
                                    <td class="tanggal"><?= $value['tgl_do']; ?></td>
                                    <td><?= $value['no_so']; ?></td>
                                    <td><?= $value['no_po']; ?></td>
                                    <td><?= $value['nama_customer']; ?></td>
                                    <td><?= $value['catatan']; ?></td>
                                    <!-- <td><? //= $value['alamat']; 
                                                ?></td> -->
                                    <!-- Selesai Disini -->
                                    <td>
                                        <!-- hapus jika perlu -->
                                        <a href="/DODetail/index/<?= $value['id_do']; ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="fas fa-eye"></i></a>
                                        <!-- end hapus -->
                                        <a href="/<?= $judul; ?>/edit/<?= $value['id_do']; ?>" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah"><i class="fas fa-pen"></i></a>
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <!-- Button trigger modal -->
                                        <button type="button" href='#modalHapus' onclick="konfirmasiDelete(<?= $value['id_do']; ?>)" class="btn btn-danger" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
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
                                <th>No DO</th>
                                <th>Tanggal DO</th>
                                <th>NO SO</th>
                                <th>NO PO</th>
                                <th>Customer</th>
                                <th>Catatan</th>
                                <!-- <th>Catatan Kirim</th> -->
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