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
                                <th>Tanggal Pengeluaran</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        foreach ($data as $key => $value) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <!-- Masukan Disini -->

                                <td class="tanggal"><?= $value['tgl_pengeluaran']; ?></td>
                                <!-- Selesai Disini -->
                                <td>
                                    <a href="/SchedulePengeluaranDetail/index/<?= $value['tgl_pengeluaran']; ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>Tanggal Pengeluaran</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="/Pengeluaran/cek_so" class="btn btn-primary">Penjualan Barang (SO)</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>