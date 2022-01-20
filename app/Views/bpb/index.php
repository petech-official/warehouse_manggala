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
                                <th>NO BPB</th>
                                <th>Tanggal</th>
                                <th>No SJ Supplier</th>
                                <th>Packing List</th>
                                <th>Supir</th>
                                <th>No Mobil</th>
                                <th>Supplier</th>
                                <th>NO PO</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 50px;">
                            <?php
                            $i = 0;
                            foreach ($data as $key => $value) : ?>
                                <tr>
                                    <!-- Masukan Disini -->
                                    <td> <?= $value['no_bpb']; ?></td>
                                    <td class="tanggal"> <?= $value['tgl_bpb']; ?></td>
                                    <td> <?= $value['no_surat_jalan']; ?></td>
                                    <td>
                                        <a class="btn btn-secondary" href="/packing_list/<?= $value['packing_list']; ?>"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    </td>
                                    <td> <?= $value['supir']; ?></td>
                                    <td> <?= $value['no_mobil']; ?></td>

                                    <td> <?= $dataPO[$i]['nama'];
                                            ?></td>
                                    <td> <?= $value['no_po']; ?></td>
                                    <!-- Selesai Disini -->
                                    <td>
                                        <a href="/<?= $judul; ?>Detail/index/<?= $value['id_bpb']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                        <a href="/<?= $judul; ?>/edit/<?= $value['id_bpb']; ?>" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <!-- Button trigger modal -->
                                        <button type="button" href='#modalHapus' onclick="konfirmasiDelete(<?= $value['id_bpb']; ?>)" class="btn btn-danger" data-toggle="modal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php $i++;
                            endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>NO BPB</th>
                                <th>Tanggal</th>
                                <th>No SJ Supplier</th>
                                <th>Packing List</th>
                                <th>Supir</th>
                                <th>No Mobil</th>
                                <th>Supplier</th>
                                <th>NO PO</th>
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