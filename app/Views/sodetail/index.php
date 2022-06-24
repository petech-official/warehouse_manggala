<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><a href="/<?= $judulMain; ?>/index"><?= $judulMain; ?></a>
                        <?= $aksi; ?> <?= $dataMain['no_so'] ?></h3>
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
                            <th>TGL SO</th>
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
                        <tr>
                            <th>Alamat Kirim</th>
                            <td>:</td>
                            <td><?= $dataMain['alamat'] ?></td>
                        </tr>
                        <tr>
                            <th>Keterangan SO</th>
                            <td>:</td>
                            <td><?= $dataMain['keterangan'] ?></td>
                        </tr>
                    </table>
                    <hr>
                    <a href="/<?= $judul; ?>/tambah/<?= $dataMain['id_so'] ?>" class="btn btn-primary">Tambah Barang</a><br><br>
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
                                <th colspan="2">Saldo Awal</th>
                                <th colspan="2">Mutasi</th>
                                <th colspan="2">Saldo Akhir</th>
                                <th rowspan="2">Keterangan</th>
                                <th rowspan="2">Status</th>
                                <!-- Selesai Disini -->
                                <th rowspan="2">Aksi</th>
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



                                <td><?= $value['keterangan_so'] ?></td>
                                <td><?php
                                    if ($value['status_so'] == 0) {
                                    ?>
                                        <span class="badge bg-warning">Berjalan</span>
                                    <?php } else { ?>
                                        <span class="badge bg-success">Selesai</span>
                                    <?php } ?>
                                </td>
                                <!-- Selesai Disini -->
                                <td>
                                    <a href="/<?= $judul; ?>/edit/<?= $value['id_so_detail']; ?>" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <!-- Button trigger modal -->
                                    <button type="button" href='#modalHapus' onclick="konfirmasiDelete(<?= $value['id_so_detail']; ?>,<?= $value['id_so'] ?>)" class="btn btn-danger" data-toggle="modal">
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
                                <th>Kg </th>
                                <th>Box</th>
                                <th>Kg </th>
                                <th>Box</th>
                                <th>Kg </th>
                                <th>Keterangan</th>
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