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
                                    <label for="zzz">zzz</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('zzz')) ? 'is-invalid' : ''; ?>" id="zzz" name="zzz" autofocus value="<?= old('zzz'); ?>" placeholder="Masukan zzz">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('zzz'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="zzz">zzz</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('zzz')) ? 'is-invalid' : ''; ?>" id="zzz" name="zzz" autofocus value="<?= old('zzz'); ?>" placeholder="Masukan zzz">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('zzz'); ?>
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
<script>
    <?= $this->endSection(); ?>