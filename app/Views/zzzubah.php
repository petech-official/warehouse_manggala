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
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label for="zzz">zzz</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('zzz')) ? 'is-invalid' : ''; ?>" id="zzz" name="zzz" autofocus value="<?= (old('zzz')) ? old('zzz') : $data['zzz']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('zzz'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus>
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