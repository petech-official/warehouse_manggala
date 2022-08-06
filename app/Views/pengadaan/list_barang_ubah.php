<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/Pengadaan/list_barang/">Proses Pengadaan</a>
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
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update">
                            <div class="card-body">
                                <input type="hidden" name="id_stock" value="<?= $id_stock; ?>">
                                <div class="form-group">
                                    <label for="status_pengadaan">Status pengadaan</label>
                                    <select class="form-select form-control select2bs4  <?= ($validation->hasError('status_pengadaan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('status_pengadaan'); ?>" name="status_pengadaan" id="status_pengadaan">
                                        <option selected disabled>Pilih status </option>
                                        <option value="0" <?php if ($data[0]['status_pengadaan'] == 0) : ?> selected <?php endif ?>>Belum diproses</option>
                                        <option value="1" <?php if ($data[0]['status_pengadaan'] == 1) : ?> selected <?php endif ?>>Sedang diproses</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_pengadaan'); ?>
                                    </div>
                                </div>
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