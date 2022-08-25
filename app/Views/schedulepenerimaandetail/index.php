<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><a href="/Penyimpanan/index/">Jadwal Penerimaan</a>
                        <?= $aksi; ?> </h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Jadwal Penerimaan</th>
                            <td>:</td>
                            <td class="tanggal"><?= $tanggal; ?></td>
                        </tr>
                    </table>
                    <hr>
                    <table class="table table-bordered table-striped" id="data-table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>No Po</th>
                                <th>Nama Barang</th>
                                <th>Lot</th>
                                <th>Status Penerimaan</th>
                                <th>Supplier</th>
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

                                <td><?= $value['no_po']; ?></td>
                                <td><?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> - <?= $value['grade']; ?></td>
                                <td><?= $value['lot']; ?></td>

                                <td><?php
                                    if ($value['status_penerimaan'] == 0) {
                                    ?>
                                        <span class="badge bg-warning">Belum Terkonfirmasi</span>
                                    <?php } else { ?>
                                        <span class="badge bg-success">Terkonfirmasi</span>
                                    <?php } ?>
                                </td>
                                <td><?= $value['nama']; ?></td>
                                <td class="rupiah"><?= $value['berat_penerimaan']; ?></td>
                                <!-- Selesai Disini -->

                            </tr>
                        <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>No Po</th>
                                <th>Nama Barang</th>
                                <th>Lot</th>
                                <th>Status Penerimaan</th>
                                <th>Supplier</th>
                                <th>Quantity (kg)</th>
                                <!-- Selesai Disini -->
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>