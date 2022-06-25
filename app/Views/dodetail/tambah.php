<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->
<div class="container-fluid"></div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="/<?= $judul; ?>/index/<?= $id_do; ?>"><?= $judul; ?></a>
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
                                <label for="id_barang">Barang</label>
                                <input type="hidden" value="<?= $id_do; ?>" name="id_do" id="id_do">
                                <select class="form-select form-control  <?= ($validation->hasError('id_barang')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="id_barang" id="id_barang">
                                    <option value="" selected disabled>Pilih Barang</option>
                                    <?php foreach ($dataBarang as $key => $value) : ?>
                                        <option value="<?= $value['id_barang']; ?>" } ?>
                                            <?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> <?= $value['lot']; ?> <?= $value['grade']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('id_barang'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="berat_total">Kg</label>
                                <input type="number" class="form-control <?= ($validation->hasError('berat_total')) ? 'is-invalid' : ''; ?>" id="berat_total" name="berat_total" autofocus value="<?= old('berat_total'); ?>" placeholder="Masukan berat">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('berat_total'); ?>
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