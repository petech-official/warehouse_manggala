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
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/updateJenis/<?= $data['id']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label for="grade">Jenis</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" id="jenis" name="jenis" autofocus value="<?= (old('jenis')) ? old('jenis') : $data['jenis']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis'); ?>
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