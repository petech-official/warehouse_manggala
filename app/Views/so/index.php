<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pengeluaran</h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <h4>Penjualan Barang (SO)</h4>
                    <hr>
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
                                <th>No SO</th>
                                <th>Tanggal SO</th>
                                <th>Nama Customer</th>
                                <th width="200px">Alamat NPWP</th>
                                <!-- <th width="200px">Alamat Kirim</th> -->
                                <th>Keterangan</th>
                                <th>Status SO</th>
                                <!-- Selesai Disini -->
                                <th width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 50px;">
                            <?php
                            $i = 1;
                            foreach ($data as $key => $value) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <!-- Masukan Disini -->
                                    <td><?= $value['no_so']; ?></td>
                                    <td class="tanggal"><?= $value['tgl_so']; ?></td>
                                    <td><?= $value['nama_customer']; ?></td>
                                    <td><?= $value['alamat_npwp']; ?></td>
                                    <!-- <td><? //= $value['alamat']; 
                                                ?></td> -->
                                    <td><?= $value['keterangan']; ?></td>
                                    <td>
                                        <?php
                                        if ($value['status'] == 0) {
                                        ?>
                                            <span class="badge bg-warning">Berjalan</span>
                                        <?php } else { ?>
                                            <span class="badge bg-success">Selesai</span>
                                        <?php } ?>
                                    </td>
                                    <!-- Selesai Disini -->
                                    <td>
                                        <a href="/<?= $judul; ?>Detail/index/<?= $value['id_so']; ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="fas fa-eye"></i></a>
                                        <a href="/<?= $judul; ?>/edit/<?= $value['id_so']; ?>" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah"><i class="fas fa-pen"></i></a>
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <!-- Button trigger modal -->
                                        <button type="button" href='#modalHapus' onclick="konfirmasiDelete(<?= $value['id_so']; ?>)" class="btn btn-danger" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
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
                                <th>No SO</th>
                                <th>Tanggal SO</th>
                                <th>Nama Customer</th>
                                <th>Alamat NPWP</th>
                                <th>Keterangan</th>
                                <th>Status SO</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <?php if (session()->get('status')  == 'Manager Marketing') : ?>
                    <div class="card-footer">
                        <a href="/schedulepengeluaran/index" class="btn btn-primary">Jadwal Pengeluaran (Schedule)</a>
                    </div>
                <?php endif ?>

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