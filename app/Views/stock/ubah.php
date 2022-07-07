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
                            <h3 class="card-title">Form Ubah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/Stock/update/<?= $data['id_barang']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id">

                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="jenis">
                                        <?php foreach ($dataJenis as $key => $value) : ?>
                                            <option value="<?= $value['id_barang_jenis']; ?>" <?php if ($value['id_barang_jenis'] == $data['id_jenis']) {
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
                                    <label for="ukuran">Ukuran</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('ukuran')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="ukuran">
                                        <?php foreach ($dataUkuran as $key => $value) : ?>
                                            <option value="<?= $value['id_barang_ukuran']; ?>" <?php if ($value['id_barang_ukuran'] == $data['id_ukuran']) {
                                                                                                    echo "selected";
                                                                                                } ?>>
                                                <?= $value['ukuran']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('ukuran'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="keterangan">
                                        <?php foreach ($dataKeterangan as $key => $value) : ?>
                                            <option value="<?= $value['id_barang_keterangan']; ?>" <?php if ($value['id_barang_keterangan'] == $data['id_keterangan']) {
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

                                <div class="form-group">
                                    <label for="lot">Lot</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('lot')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="lot">
                                        <?php foreach ($dataLot as $key => $value) : ?>
                                            <option value="<?= $value['id_barang_lot']; ?>" <?php if ($value['id_barang_lot'] == $data['id_lot']) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                <?= $value['lot']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lot'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('grade')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="grade">
                                        <?php foreach ($dataGrade as $key => $value) : ?>
                                            <option value="<?= $value['id_barang_grade']; ?>" <?php if ($value['id_barang_grade'] == $data['id_grade']) {
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
                                    <label for="produksi">Supplier</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('produksi')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="produksi">
                                        <?php foreach ($dataProduksi as $key => $value) : ?>
                                            <option value="<?= $value['id_supplier']; ?>" <?php if ($value['id_supplier'] == $data['id_supplier']) {
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
                                    <label for="berat">Berat (kg)</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('berat')) ? 'is-invalid' : ''; ?>" id="berat" name="berat" value="<?= (old('berat')) ? old('berat') : $data['berat']; ?>" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('berat'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="max_berat">Max Berat (kg)</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('max_berat')) ? 'is-invalid' : ''; ?>" id="max_berat" name="max_berat" value="<?= (old('max_berat')) ? old('max_berat') : $data['max_berat']; ?>" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('max_berat'); ?>
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