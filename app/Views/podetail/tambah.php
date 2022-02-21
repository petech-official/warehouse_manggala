<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index/<?= $id_po ?>"><?= $judul; ?></a>
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
                                    <input type="hidden" value="<?= $id_po_detail; ?>" name="id_po" id="id_po">
                                    <select class="form-select form-control  <?= ($validation->hasError('id_barang')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="id_barang" name="id_barang">
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
                                <div class="form-group">
                                    <label for="quantitas">Box</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('quantitas')) ? 'is-invalid' : ''; ?>" id="quantitas" name="quantitas" autofocus value="<?= old('quantitas'); ?>" placeholder="Masukan jumlah box">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('quantitas');
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_po_detail">Keterangan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan_po_detail')) ? 'is-invalid' : ''; ?>" id="keterangan_po_detail" name="keterangan_po_detail" autofocus value="<?= old('keterangan_po_detail'); ?>" placeholder="Masukan keterangan">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan_po_detail'); ?>
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