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
                                    <label for="nopol">No Kendaraan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nopol')) ? 'is-invalid' : ''; ?>" id="nopol" name="nopol" autofocus value="<?= old('nopol'); ?>" placeholder="Masukan no kendaraan" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nopol'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tipe">Tipe Kendaraan</label>
                                    <select class="form-select form-control select2bs4  <?= ($validation->hasError('tipe')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('tipe'); ?>" name="tipe" id="tipe">
                                        <option selected disabled>Pilih tipe kendaraan</option>
                                        <option value="Double">Double</option>
                                        <option value="Engkel">Engkel</option>
                                        <option value="Losbak">Losbak</option>
                                        <option value="SS">SS</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" id="status" name="status" autofocus value="Ada" placeholder="Masukan status">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status'); ?>
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