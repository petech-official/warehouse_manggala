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
                        <form id="quickForm" method="POST" action="/Stock/save">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('jenis'); ?>" name="jenis" id="jenis">
                                        <option selected disabled>Pilih jenis</option>
                                        <?php foreach ($dataJenis as $key => $value) : ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['jenis']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lot">LOT</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('lot')) ? 'is-invalid' : ''; ?>" id="lot" name="lot" autofocus value="<?= old('lot'); ?>" placeholder="Masukan lot">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lot'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <select class="form-select form-control  <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('keterangan'); ?>" name="keterangan" id="keterangan">
                                                <option selected disabled>Pilih Keterangan</option>
                                                <?php foreach ($dataKeterangan as $key => $value) : ?>
                                                    <option value="<?= $value['id']; ?>"><?= $value['keterangan']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('keterangan'); ?>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" id="keteranganDetail" name="keteranganDetail" class="form-control <?= ($validation->hasError('keteranganDetail')) ? 'is-invalid' : ''; ?>" id="keteranganDetail" name="keteranganDetail" autofocus value="<?= old('keteranganDetail'); ?>" placeholder="Masukan detail">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('grade')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('grade'); ?>" name="grade" id="grade">
                                        <option selected disabled>Pilih Grade</option>
                                        <?php foreach ($dataGrade as $key => $value) : ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['grade']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('grade'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="produksi">Produksi</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('produksi')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('produksi'); ?>" name="produksi" id="produksi">
                                        <option selected disabled>Pilih produksi</option>
                                        <?php foreach ($dataProduksi as $key => $value) : ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('produksi'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kg">Jumlah dus</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('dus')) ? 'is-invalid' : ''; ?>" id="dus" name="dus" autofocus value="<?= old('dus'); ?>" placeholder="Masukan jumlah dus">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('dus'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kg">Jumlah KG</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('kg')) ? 'is-invalid' : ''; ?>" id="kg" name="kg" autofocus value="<?= old('kg'); ?>" placeholder="Masukan jumlah kg">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kg'); ?>
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