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
                            <h3 class="card-title">Form Ubah Data <?= $judul; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_stock']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?= $data['id_barang']; ?>">

                                <div class="form-group">
                                    <label for="keterangan_stock">Barang</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan_stock')) ? 'is-invalid' : ''; ?>" id="id_barang" name="keterangan_stock" autofocus value="<?= $data['jenis']; ?> <?= $data['ukuran']; ?> <?= $data['keterangan']; ?> <?= $data['lot']; ?> <?= $data['grade']; ?> - <?= $data['singkatan']; ?>" disabled>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan_stock'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_stock">Keterangan Stock</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan_stock')) ? 'is-invalid' : ''; ?>" id="keterangan_stock" name="keterangan_stock" autofocus value="<?= (old('keterangan_stock')) ? old('keterangan_stock') : $data['keterangan_stock']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan_stock'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_stock">Lokasi Stock</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('lokasi_stock')) ? 'is-invalid' : ''; ?>" id="lokasi_stock" name="lokasi_stock" autofocus value="<?= (old('lokasi_stock')) ? old('lokasi_stock') : $data['lokasi_stock']; ?>">
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