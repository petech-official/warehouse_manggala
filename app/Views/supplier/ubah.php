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
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_supplier']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label for="nama">Nama Supplier</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $data['nama']; ?>" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="singkatan">Singkatan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('singkatan')) ? 'is-invalid' : ''; ?>" id="singkatan" name="singkatan" autofocus value="<?= (old('singkatan')) ? old('singkatan') : $data['singkatan']; ?>" autocomplete="off">
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
                                        <input type="text" class="form-control" <?= ($validation->hasError('telp')) ? 'is-invalid' : ''; ?>" id="telp" name="telp" autofocus value="<?= (old('telp')) ? old('telp') : $data['telp']; ?>" placeholder="Masukan Telepon" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= (old('alamat')) ? old('alamat') : $data['alamat']; ?>" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lead_time">Waktu Kirim (hari)</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('lead_time')) ? 'is-invalid' : ''; ?>" id="lead_time" name="lead_time" autofocus value="<?= (old('lead_time')) ? old('lead_time') : $data['lead_time']; ?>" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lead_time'); ?>
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