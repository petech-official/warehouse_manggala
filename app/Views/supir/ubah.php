<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul ?>/index"><?= $judul; ?></a>
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
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_supir']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label for="nama_supir">Nama Supir</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_supir')) ? 'is-invalid' : ''; ?>" id="nama_supir" name="nama_supir" autofocus value="<?= (old('nama_supir')) ? old('nama_supir') : $data['nama_supir']; ?>" placeholder="Masukan nama supir">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_supir'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Telepon Supir</label></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control <?= ($validation->hasError('telp_supir')) ? 'is-invalid' : ''; ?>" id="telp_supir" name="telp_supir" autofocus value="<?= (old('telp_supir')) ? old('telp_supir') : $data['telp_supir']; ?>" placeholder="Masukan no telepon">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('telp_supir'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
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
<?= $this->endSection(); ?>