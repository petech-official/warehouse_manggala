<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Stock Barang</h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <!-- <a href="/<?= $judul; ?>/tambah" class="btn btn-primary">Tambah Data</a><br><br> -->
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif ?>
                    <table class="table table-bordered table-striped" id="data-table1">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <!-- Masukan Disini -->
                                <th rowspan="2">Nama Barang</th>
                                <th rowspan="2">Lot</th>
                                <th rowspan="2">Supplier</th>
                                <th rowspan="2">Jenis Box</th>

                                <th colspan="3">Stock</th>
                                <th rowspan="2">ROP</th>
                                <th rowspan="2">Status Pengadaan</th>

                                <!-- Selesai Disini -->
                                <th rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th>Box</th>
                                <th>Kg</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 50px;">
                            <?php
                            $i = 1;
                            foreach ($data as $key => $value) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <!-- Masukan Disini -->
                                    <td><?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> - <?= $value['grade']; ?></td>
                                    <td><?= $value['lot']; ?></td>
                                    <td><?= $value['singkatan']; ?></td>
                                    <td><?= $value['jenis_box']; ?></td>
                                    <td class="rupiah"><?= $value['box'] ?></td>
                                    <td class="rupiah"><?= $value['berat_total'] ?></td>
                                    <td><?= $value['berat']; ?></td>


                                    <td class="rupiah"><?= $value['rop']; ?></td>
                                    <td><?php if ($value['berat_total'] < $value['rop']) { ?>

                                            <span class="badge bg-warning">Perlu Pengadaan</span>
                                        <?php } else { ?>

                                            <span class="badge bg-primary">Tidak Perlu Pengadaan</span>
                                        <?php } ?>
                                    </td>

                                    <!-- Selesai Disini -->
                                    <td>
                                        <a href="/<?= $judul; ?>Detail/index/<?= $value['id_stock']; ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="fas fa-eye"></i></a>
                                        <!-- <a href="/<?= $judul; ?>/edit/<? //= $value['id_stock']; 
                                                                            ?>" class="btn btn-success"><i class="fas fa-pen"></i></a> -->
                                        <?= csrf_field(); ?>
                                        <?php if (session()->get('status')  != 'Manager Marketing') : ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <!-- Button trigger modal -->
                                            <button type="button" href='#modalHapus' onclick="konfirmasiDelete(<?= $value['id_stock']; ?>)" class="btn btn-danger" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>Nama Barang</th>
                                <th>Lot</th>
                                <th>Supplier</th>
                                <th>Jenis Box</th>
                                <th>Box</th>
                                <th>Kg</th>
                                <th>Keterangan</th>
                                <th>ROP</th>
                                <th>Status Pengadaan</th>

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