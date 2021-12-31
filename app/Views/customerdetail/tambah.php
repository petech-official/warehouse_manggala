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
                            <h3 class="card-title">Form Tambah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/save">
                            <div class="card-body">
                                <input type="hidden" id="id_customer" name="id_customer" value="<?= $id_customer; ?>">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= old('alamat'); ?>" placeholder="Masukan alamat">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="waktu">KM</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('km')) ? 'is-invalid' : ''; ?>" id="km" name="km" autofocus value="<?= old('km'); ?>" placeholder="Masukan km">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('km'); ?>
                                    </div>
                                </div>
                                <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Waktu</label>

                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input <?= ($validation->hasError('waktu')) ? 'is-invalid' : ''; ?>" id="waktu" name="waktu" autofocus value="<?= old('waktu'); ?>" placeholder="Masukan waktu" data-target=" #timepicker">
                                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('waktu'); ?>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <input type="hidden" name="id_customer" id="id_customer" value="<?= $id_customer ?>">
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