<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/Stock/index"><?= $judul; ?></a>
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
                        <form id="quickForm" method="POST" action="/Stock/update/<?= $data['id_barang']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="jenis">
                                        <?php foreach ($dataJenis as $key => $value) : ?>
                                            <option value="<?= $value['id']; ?>" <?php if ($value['id'] == $data['id_jenis']) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                                <?= $value['jenis']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis'); ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <select class="form-select form-control  <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('keterangan'); ?>" name="keterangan" id="keterangan">
                                                <option selected disabled>Pilih Keterangan</option>
                                                <?php foreach ($dataKeterangan as $key => $value) : ?>
                                                    <option value="<?= $value['id']; ?>" <?php if ($value['id'] == $data['id_keterangan']) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                        <?= $value['keterangan']; ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('keterangan'); ?>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" id="keteranganDetail" name="keteranganDetail" class="form-control <?= ($validation->hasError('keterangan_detail')) ? 'is-invalid' : ''; ?>" id="keterangan_detail" name="keterangan_detail" autofocus value="<?= (old('keterangan_detail')) ? old('keterangan_detail') : $data['keterangan_detail']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lot">lot</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('lot')) ? 'is-invalid' : ''; ?>" id="lot" name="lot" autofocus value="<?= (old('lot')) ? old('lot') : $data['lot']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lot'); ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('grade')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="grade">
                                        <?php foreach ($dataGrade as $key => $value) : ?>
                                            <option value="<?= $value['id']; ?>" <?php if ($value['id'] == $data['id_grade']) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                                <?= $value['grade']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('grade'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="produksi">Produksi</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('produksi')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="produksi">
                                        <?php foreach ($dataProduksi as $key => $value) : ?>
                                            <option value="<?= $value['id']; ?>" <?php if ($value['id'] == $data['produk']) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                                <?= $value['nama']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('produksi'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dus">Dus</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('dus')) ? 'is-invalid' : ''; ?>" id="dus" name="dus" autofocus value="<?= (old('dus')) ? old('dus') : $data['dus']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('dus'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kg">kg</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('kg')) ? 'is-invalid' : ''; ?>" id="kg" name="kg" autofocus value="<?= (old('kg')) ? old('kg') : $data['kg']; ?>">
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