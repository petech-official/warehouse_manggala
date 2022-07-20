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
                                    <label for="nama">Nama Supplier</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>" placeholder="Masukan nama supplier" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="singkatan">Singkatan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('singkatan')) ? 'is-invalid' : ''; ?>" id="singkatan" name="singkatan" autofocus value="<?= old('singkatan'); ?>" placeholder="Masukan singkatan supplier" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('singkatan'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control <?= ($validation->hasError('telp')) ? 'is-invalid' : ''; ?>" id="telp" name="telp" autofocus value="<?= old('telp'); ?>" placeholder="Masukan no telp" autocomplete="off">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('telp'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= old('alamat'); ?>" placeholder="Masukan alamat" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lead_time">Waktu Kirim (hari)</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('lead_time')) ? 'is-invalid' : ''; ?>" id="lead_time" name="lead_time" autofocus value="<?= old('lead_time'); ?>" placeholder="Masukan waktu kirim (hari)" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lead_time'); ?>
                                    </div>
                                </div>
                            </div>
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