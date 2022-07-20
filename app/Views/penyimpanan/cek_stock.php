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
                    <!-- <a href="/<?= $judul; ?>/tambah" class="btn btn-primary">Tambah Data</a><br><br> -->
                    <h4>Stock Barang <?= date('d - M - Y'); ?></h4>
                    <br>
                    <table class="table table-bordered table-striped" id="data-table1">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <!-- Masukan Disini -->
                                <th rowspan="2">Nama Barang</th>
                                <th rowspan="2">Lot</th>

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
                            foreach ($dataStock as $key => $value) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <!-- Masukan Disini -->
                                    <td><?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> - <?= $value['grade']; ?></td>
                                    <td><?= $value['lot']; ?></td>
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
                                        <a href="/<?= $judul; ?>/cek_stock_detail/<?= $value['id_stock']; ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="fas fa-eye"></i></a>
                                        <!-- <a href="/<?= $judul; ?>/edit/<? //= $value['id_stock']; 
                                                                            ?>" class="btn btn-success"><i class="fas fa-pen"></i></a> -->
                                        <?= csrf_field(); ?>

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

                <div class="card-footer">
                    <a href="/bpb/index" class="btn btn-primary">Bukti Penerimaan Barang (BPB)</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>