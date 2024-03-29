<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $judul; ?> 2 September 2021</h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <a href="/Stock/tambah" class="btn btn-primary">Tambah Data</a><br><br>
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
                                <th>Nama Barang</th>
                                <th>Supplier</th>
                                <th>Jenis Box</th>
                                <th>Berat (Kg)</th>
                                <th>Max Berat (Kg)</th>
                                <th>Penyimpanan Barang</th>
                                <th>Posisi</th>
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
                                    <td><?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> <?= $value['lot']; ?> <?= $value['grade']; ?></td>
                                    <td><?= $value['singkatan']; ?></td>
                                    <td><?= $value['jenis_box']; ?></td>
                                    <td class="rupiah"><?= $value['berat']; ?></td>
                                    <td class="rupiah"><?= $value['max_berat']; ?></td>
                                    <td><?= $value['penyimpanan_barang']; ?></td>
                                    <td>
                                        <?php if ($value['posisi'] == 1) {
                                            echo "Jalur Panjang";
                                        } elseif ($value['posisi'] == 2) {
                                            echo "Jalur Pendek";
                                        } elseif ($value['posisi'] == 3) {
                                            echo "Jalur Tengah";
                                        } else {
                                            echo "Area Bongkar Muat";
                                        } ?>

                                    </td>
                                    <!-- Selesai Disini -->

                                    <td>
                                        <a href="/Stock/edit/<?= $value['id_barang']; ?>" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah"><i class="fas fa-pen"></i></a>
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <!-- Button trigger modal -->
                                        <button type="button" href='#modalHapus' onclick="konfirmasiDelete(<?= $value['id_barang']; ?>)" class="btn btn-danger" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
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
                                <th>Nama Barang</th>
                                <th>Supplier</th>
                                <th>Jenis Box</th>
                                <th>Berat (Kg)</th>
                                <th>Max Berat (Kg)</th>
                                <th>Penyimpanan Barang</th>
                                <th>Posisi</th>
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
<form action="/Stock/delete" method="POST" class="d-inline">
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
                    <button type="button" data-dismiss="modal" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
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