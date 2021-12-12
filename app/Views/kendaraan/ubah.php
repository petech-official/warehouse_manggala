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
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                <div class="form-group">
                                    <label for="nopol">No Polisi</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nopol')) ? 'is-invalid' : ''; ?>" id="nopol" name="nopol" autofocus value="<?= (old('nopol')) ? old('nopol') : $data['nopol']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nopol'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="km">KM</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('km')) ? 'is-invalid' : ''; ?>" id="km" name="km" autofocus value="<?= (old('km')) ? old('km') : $data['km']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('km'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="status" id="status">
                                        <?php foreach ($status as $key => $value) : ?>
                                            <option value="<?= $value['status']; ?>" <?php if ($value['status'] == $data['status']) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                                <?= $value['status']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" autofocus value="<?= (old('keterangan')) ? old('keterangan') : $data['keterangan']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan'); ?>
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