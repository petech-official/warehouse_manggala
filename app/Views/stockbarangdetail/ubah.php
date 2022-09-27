<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index/<?= $data['id_stock']; ?>">Stock Barang Detail</a>
                        <?= $aksi; ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Ubah Data </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_stock_detail']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id_stock" value="<?= $data['id_stock']; ?>">
                                <div class="form-group">
                                    <label for="posisi">Supplier</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('posisi')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('posisi'); ?>" name="posisi" id="posisi">
                                        <option selected disabled>Pilih Posisi</option>
                                        <?php foreach ($dataPenyimpanan as $key => $value) : ?>
                                            <option value="<?= $value['id_penyimpanan']; ?>"><?= $value['posisi_barang']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('posisi'); ?>
                                    </div>
                                </div>
                                <!-- <div class=" form-group">
                                    <label for="posisi">Posisi</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('posisi')) ? 'is-invalid' : ''; ?>" id="posisi" name="posisi" autofocus value="<?= (old('posisi')) ? old('posisi') : $data['posisi']; ?>" autocomplete="off" placeholder="Masukan posisi barang">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('posisi'); ?>
                                    </div>
                                </div> -->
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>