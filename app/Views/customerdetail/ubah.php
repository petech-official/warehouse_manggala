<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index/<?= $id_customer; ?>"><?= $judul; ?></a>
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
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id_customer" value="<?= $data['id_customer'] ?>">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= (old('alamat')) ? old('alamat') : $data['alamat']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="km">Km</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('km')) ? 'is-invalid' : ''; ?>" id="km" name="km" autofocus value="<?= (old('km')) ? old('km') : $data['km']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('km'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="waktu">waktu</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('waktu')) ? 'is-invalid' : ''; ?>" id="waktu" name="waktu" autofocus value="<?= (old('waktu')) ? old('waktu') : $data['waktu']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('waktu'); ?>
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