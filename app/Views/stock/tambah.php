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
                            <h3 class="card-title">Form Tambah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/Stock/save">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <select class="form-select form-control select2bs4  <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('jenis'); ?>" name="jenis" id="jenis">
                                        <option selected disabled>Pilih Jenis</option>
                                        <?php foreach ($dataJenis as $key => $value) : ?>
                                            <option value="<?= $value['id_barang_jenis']; ?>"><?= $value['jenis']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ukuran">Ukuran</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('ukuran')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('ukuran'); ?>" name="ukuran" id="ukuran">
                                        <option selected disabled>Pilih Ukuran</option>
                                        <?php foreach ($dataUkuran as $key => $value) : ?>
                                            <option value="<?= $value['id_barang_ukuran']; ?>"><?= $value['ukuran']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('ukuran'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('keterangan'); ?>" name="keterangan" id="keterangan">
                                        <option selected disabled>Pilih Keterangan</option>
                                        <?php foreach ($dataKeterangan as $key => $value) : ?>
                                            <option value="<?= $value['id_barang_keterangan']; ?>"><?= $value['keterangan']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lot">Lot</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('lot')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('lot'); ?>" name="lot" id="lot">
                                        <option selected disabled>Pilih lot</option>
                                        <?php foreach ($dataLot as $key => $value) : ?>
                                            <option value="<?= $value['id_barang_lot']; ?>"><?= $value['lot']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lot'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('grade')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('grade'); ?>" name="grade" id="grade">
                                        <option selected disabled>Pilih Grade</option>
                                        <?php foreach ($dataGrade as $key => $value) : ?>
                                            <option value="<?= $value['id_barang_grade']; ?>"><?= $value['grade']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('grade'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="produksi">Supplier</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('produksi')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('produksi'); ?>" name="produksi" id="produksi">
                                        <option selected disabled>Pilih supplier</option>
                                        <?php foreach ($dataProduksi as $key => $value) : ?>
                                            <option value="<?= $value['id_supplier']; ?>"><?= $value['nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('produksi'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_box">Jenis Box</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('jenis_box')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('jenis_box'); ?>" name="jenis_box" id="jenis_box">
                                        <option selected disabled>Pilih jenis box</option>
                                        <option value="Standar">Standar</option>
                                        <option value="Small">Small</option>
                                        <option value="Jumbo">Jumbo</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_box'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="berat">Berat (kg)</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('berat')) ? 'is-invalid' : ''; ?>" id="berat" name="berat" autofocus value="<?= old('berat'); ?>" placeholder="Masukan berat" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('berat'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="max_berat">Max Berat (kg)</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('max_berat')) ? 'is-invalid' : ''; ?>" id="max_berat" name="max_berat" autofocus value="<?= old('max_berat'); ?>" placeholder="Masukan max berat" autocomplete="off">
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
<script>
    // CEK grade
    $('#').change(function() {
        var grade = $('#grade').val();
        if (grade == 1) {
            $('#berat').removeAttr('readonly');
            $('#berat').focus();
        } else
        if (grade != 1) {
            $('#berat').val('');
            $('#berat').attr("readonly", true);
        }
    });
</script>
<?= $this->endSection(); ?>