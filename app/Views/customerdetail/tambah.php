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
                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <!-- time Picker -->                                    
                                    <input type="text" class="form-control <?= ($validation->hasError('waktu')) ? 'is-invalid' : ''; ?>" id="waktu" name="waktu" autofocus value="<?= old('waktu'); ?>" placeholder="Masukan waktu">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('waktu'); ?>
                                    </div>
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
<script>
    $('#input_starttime').pickatime({
// 12 or 24 hour
    twelvehour: false,
});
</script>
    <?= $this->endSection(); ?>