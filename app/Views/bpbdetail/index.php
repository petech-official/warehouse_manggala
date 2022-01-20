<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><a href="/<?= $judulMain; ?>/index"><?= $judulMain; ?></a>
                        <?= $aksi; ?> <?= $dataMain['no_bpb'] ?></h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <table>
                        <tr>
                            <th>No BPB</th>
                            <td>:</td>
                            <td><?= $dataMain['no_bpb'] ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>:</td>
                            <td><?= $dataMain['tgl_bpb'] ?></td>
                        </tr>
                        <tr>
                            <th>No SJ Supplier</th>
                            <td>:</td>
                            <td><?= $dataMain['no_surat_jalan'] ?></td>
                        </tr>
                        <tr>
                            <th>No Mobil</th>
                            <td>:</td>
                            <td><?= $dataMain['no_mobil'] ?></td>
                        </tr>
                        <tr>
                            <th>Supplier</th>
                            <td>:</td>
                            <td><?= $dataPO[0]['nama']; ?></td>
                        </tr>
                        <tr>
                            <th>No PO</th>
                            <td>:</td>
                            <td><?= $dataMain['no_po'] ?></td>
                        </tr>

                    </table>
                    <hr>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif ?>
                    <table class="table table-bordered table-striped" id="data-table1">
                        <thead>
                            <tr>
                                <!-- Masukan Disini -->
                                <th rowspan="2">Nama Barang</th>
                                <th rowspan="2">Lot</th>
                                <th colspan="2">Quantity</th>
                                <!-- Selesai Disini -->
                            </tr>
                            <tr>
                                <th>Box</th>
                                <th>Kg</th>
                            </tr>
                        </thead>
                        <tbody>


                            <td><?= $data[0]['jenis']; ?> <?= $data[0]['ukuran']; ?> <?= $data[0]['keterangan']; ?> - <?= $data[0]['grade']; ?></td>
                            </td>
                            <td><?= $data[0]['lot']; ?></td>
                            <td class="rupiah"><?= $dataMain['quantitas'] ?></td>
                            <td class="rupiah"><?= number_format($dataMain['berat'], 2)
                                                ?></td>
                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>Nama Barang</th>
                                <th>Lot</th>
                                <th>Box</th>
                                <th>Kg </th>
                                <!-- Selesai Disini -->
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