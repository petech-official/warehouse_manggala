<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index/<?= $id_so['id_so']; ?>"><?= $judul; ?></a>
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
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_so_detail']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_barang">Barang</label>
                                    <input type="hidden" value="<?= $data['id_so']; ?>" name="id_so" id="id_so">
                                    <select class="form-select form-control  <?= ($validation->hasError('id_barang')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="id_barang" name="id_barang">
                                        <?php foreach ($dataBarang as $key => $value) : ?>
                                            <option value="<?= $value['id_barang']; ?>" <?php if ($value['id_barang'] == $data['id_barang']) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                                <?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> <?= $value['lot']; ?> <?= $value['grade']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_barang'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="quantitas">Box</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('quantitas')) ? 'is-invalid' : ''; ?>" id="quantitas" name="quantitas" autofocus value="<?= (old('quantitas')) ? old('quantitas') : $data['quantitas']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('quantitas'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_so">Keteranga SO</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan_so')) ? 'is-invalid' : ''; ?>" id="keterangan_so" name="keterangan_so" autofocus value="<?= (old('keterangan_so')) ? old('keterangan_so') : $data['keterangan_so']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan_so'); ?>
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