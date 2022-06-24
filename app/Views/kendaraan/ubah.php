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
                            <h3 class="card-title">Form Ubah Data </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_kendaraan']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?= $data['id_kendaraan']; ?>">
                                <div class="form-group">
                                    <label for="nopol">No Kendaraan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nopol')) ? 'is-invalid' : ''; ?>" id="nopol" name="nopol" autofocus value="<?= (old('nopol')) ? old('nopol') : $data['nopol']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nopol'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tipe">Tipe</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('tipe')) ? 'is-invalid' : ''; ?>" id="tipe" name="tipe" autofocus value="<?= (old('tipe')) ? old('tipe') : $data['tipe']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tipe'); ?>
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