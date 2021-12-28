<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">                    
                    <h3 class="card-title"><a href="/<?= $judulMain; ?>/index"><?= $judulMain; ?></a>
                        <?= $aksi; ?> <?= $dataMain[0]['no_so'] ?></h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <table>
                        <tr>
                            <th>No SO</th>
                            <td>:</td>
                            <td><?= $dataMain[0]['no_so'] ?></td>
                        </tr>
                        <tr>
                            <th>TGL SO</th>
                            <td>:</td>
                            <td class="tanggal"><?= $dataMain[0]['tgl_so'] ?></td>
                        </tr>
                        <tr>
                            <th>Nama Customer</th>
                            <td>:</td>
                            <td><?= $dataMain[0]['nama'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat NPWP</th>
                            <td>:</td>
                            <td><?= $dataMain[0]['alamat_npwp'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Kirim</th>
                            <td>:</td>
                            <td><?= $dataMain[0]['alamat'] ?></td>
                        </tr>
                    </table>
                    <hr>
                    <!-- <a href="/<?= $judul; ?>/tambah/<?= $dataMain[0]['id_so'] ?>" class="btn btn-primary">Tambah Alamat</a><br><br>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif ?> -->
                    <table class="table table-bordered table-striped" id="data-table1">
                        <thead>
                            <tr>
                                <!-- Masukan Disini -->
                                <th rowspan="2">Nama Barang</th>
                                <th rowspan="2">Lot</th>                                
                                <th colspan="2">Quantity</th>                                
                                <th rowspan="2">Keterangan</th>
                                <!-- Selesai Disini -->
                                <th rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th>Box</th>
                                <th>Kg</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 50px;">
                            <?php
                            $i = 1;
                            foreach ($data as $key => $value) : ?>
                                <tr>
                                    <!-- Masukan Disini -->
                                    <td><?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> - <?= $value['grade']; ?></td>
                                    <td><?= $value['lot']; ?></td>
                                    <td class="rupiah"><?= $value['quantitas'] ?></td>
                                    <td class="rupiah"><?= number_format($value['berat_total'],2) ?></td>
                                    <td><?= $value['keterangan_so'] ?></td>
                                    <!-- Selesai Disini -->
                                    <td>
                                        <a href="/<?= $judul; ?>/edit/<?= $value['id']; ?>" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <!-- Button trigger modal -->
                                        <button type="button" href='#modalHapus' onclick="konfirmasiDelete(<?= $value['id']; ?>,<?= $value['id_so'] ?>)" class="btn btn-danger" data-toggle="modal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>Nama Barang</th>
                                <th>Lot</th>
                                <th>Box</th>
                                <th>Berat </th>
                                <th>Keterangan</th>
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
                    <input type="hidden" id="id_so" name="id_so">
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
    function konfirmasiDelete(id, id_so) {
        $('#id').val(id);
        $('#id_so').val(id_so);
    }
</script>

<?= $this->endSection(); ?>