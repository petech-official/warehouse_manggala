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
                    <h4>Jadwal Pengeluaran Barang <?= date('d-M-Y') ?></h4>
                    <hr>
                    <table class="table table-bordered table-striped" id="data-table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>No SO</th>
                                <th>Nama Barang</th>
                                <th>Lot</th>
                                <th>Status pengeluaran</th>
                                <th>Customer</th>
                                <th>Alamat Kirim</th>
                                <th>Quantity (kg)</th>
                                <!-- Selesai Disini -->

                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        foreach ($data as $key => $value) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <!-- Masukan Disini -->

                                <td><?= $value['no_so']; ?></td>
                                <td><?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> - <?= $value['grade']; ?></td>
                                <td><?= $value['lot']; ?></td>

                                <td><?php
                                    if ($value['status_pengeluaran'] == 0) {
                                    ?>
                                        <span class="badge bg-warning">Belum Terkonfirmasi</span>
                                    <?php } else { ?>
                                        <span class="badge bg-success">Terkonfirmasi</span>
                                    <?php } ?>
                                </td>
                                <td><?= $value['nama_customer']; ?></td>
                                <td><?= $value['alamat']; ?></td>
                                <td class="rupiah"><?= $value['berat_pengeluaran']; ?></td>
                                <!-- Selesai Disini -->

                            </tr>
                        <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>No SO</th>
                                <th>Nama Barang</th>
                                <th>Lot</th>
                                <th>Status pengeluaran</th>
                                <th>Customer</th>
                                <th>Alamat Kirim</th>
                                <th>Quantity (kg)</th>
                                <!-- Selesai Disini -->

                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="/pengeluaran/cek_so" class="btn btn-primary">Penjualan Barang (SO)</a>
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