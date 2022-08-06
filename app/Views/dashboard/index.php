<?php session() ?>
<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= count($dataPO); ?> Pengadaan </h3>

                    <p>Berjalan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/PO/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= count($dataSO); ?> Penjualan</h3>

                    <p>Berjalan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/SO/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $data_count ?> Barang</h3>

                    <p>Perlu Pengadaan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/Pengadaan/list_barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</div>


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
                                    <!-- Selesai Disini -->
                                    <td>
                                        <a href="/StockBarangDetail/index/<?= $value['id_stock']; ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="fas fa-eye"></i></a>
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

<script>
    // delete
    function konfirmasiDelete(id) {
        $('#id').val(id);
    }
</script>

<?= $this->endSection(); ?>