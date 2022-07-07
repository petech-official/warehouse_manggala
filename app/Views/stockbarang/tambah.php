<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index"><?= $judul; ?></a>
                        <?= $aksi; ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/save">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_barang">Barang</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('id_barang')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="id_barang" name="id_barang">
                                        <option value="" selected disabled>Pilih Barang</option>
                                        <?php foreach ($dataBarang as $key => $value) : ?>
                                            <option value="<?= $value['id_barang']; ?>" } ?>
                                                <?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> <?= $value['lot']; ?> <?= $value['grade']; ?> - <?= $value['singkatan']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_barang'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_stock">Keterangan Stock</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan_stock')) ? 'is-invalid' : ''; ?>" id="keterangan_stock" name="keterangan_stock" autofocus value="<?= old('keterangan_stock'); ?>" placeholder="Masukan keterangan stock">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan_stock'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_stock">Lokasi Stock</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('lokasi_stock')) ? 'is-invalid' : ''; ?>" id="lokasi_stock" name="lokasi_stock" autofocus value="<?= old('lokasi_stock'); ?>" placeholder="Masukan lokasi stock">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lokasi_stock'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>