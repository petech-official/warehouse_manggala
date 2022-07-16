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
                            <h3 class="card-title">Form Ubah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_customer']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label for="nama">Nama Customer</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_customer')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama_customer')) ? old('nama_customer') : $data['nama_customer']; ?>" placeholder="Masukan nama customer" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_customer'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control <?= ($validation->hasError('telp')) ? 'is-invalid' : ''; ?>" id="telp" name="telp" autofocus value="<?= (old('telp')) ? old('telp') : $data['telp']; ?>" placeholder="Masukan no telepon" autocomplete="off">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('telp'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat NPWP</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= (old('alamat')) ? old('alamat') : $data['alamat_npwp']; ?>" placeholder="Masukan alamat npwp" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
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