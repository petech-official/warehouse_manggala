<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><a href="/Pengeluaran/index/">Pengeluaran</a>
                        <?= $aksi; ?> </h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Tanggal Schedule pengeluaran</th>
                            <td>:</td>
                            <td class="tanggal"><?= $tanggal ?></td>
                        </tr>
                    </table>
                    <hr>
                    <table class="table table-bordered table-striped" id="data-table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>No so</th>
                                <th>Customer</th>
                                <th>Alamat Kirim</th>
                                <th>Nama Barang</th>
                                <th>Lot</th>
                                <th>Status pengeluaran</th>
                                <th>Stock (kg)</th>
                                <th>Out (kg)</th>
                                <th>Penyimpanan Barang</th>
                                <th>Aksi</th>
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
                                <td><?= $value['nama_customer']; ?></td>
                                <td><?= $value['alamat']; ?></td>
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
                                <td class="rupiah"><?= $value['berat_total']; ?></td>
                                <td class="rupiah"><?= $value['berat_pengeluaran']; ?></td>
                                <td><?= $value['penyimpanan_barang']; ?></td>
                                <td><a href="/StockBarangDetail/index/<?= $value['id_stock']; ?>" target="blank" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="fas fa-eye"></i></a></td>

                                <!-- Selesai Disini -->

                            </tr>
                        <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>No so</th>
                                <th>Customer</th>
                                <th>Alamat Kirim</th>
                                <th>Nama Barang</th>
                                <th>Lot</th>
                                <th>Status pengeluaran</th>
                                <th>Stock (kg)</th>
                                <th>Out (kg)</th>
                                <th>Penyimpanan Barang</th>
                                <th>Aksi</th>
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