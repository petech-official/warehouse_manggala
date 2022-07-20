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
                            <h3 class="card-title">Form Tambah Data <?= $judul; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/save">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_supir">Nama Supir</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_supir')) ? 'is-invalid' : ''; ?>" id="nama_supir" name="nama_supir" autofocus value="<?= old('nama_supir'); ?>" placeholder="Masukan nama supir" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_supir'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control <?= ($validation->hasError('telp_supir')) ? 'is-invalid' : ''; ?>" id="telp_supir" name="telp_supir" autofocus value="<?= old('telp_supir'); ?>" placeholder="Masukan no telepon" autocomplete="off">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('telp_supir'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" id="status" name="status" autofocus value="Ada" placeholder="Masukan status">
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>