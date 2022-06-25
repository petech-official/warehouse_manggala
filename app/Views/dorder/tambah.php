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
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/save">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="tgl_do" name="tgl_do" autofocus value="<?= old('tgl_do'); ?>">
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_do'); ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="so">SO</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('so')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('so'); ?>" name="so" id="so">
                                        <option selected disabled>Pilih SO</option>
                                        <?php foreach ($dataSO as $key => $value) : ?>
                                            <option value="<?= $value['id_so']; ?>"><?= $value['no_so']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('so'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_po">NO PO</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_po')) ? 'is-invalid' : ''; ?>" id="no_po" name="no_po" autofocus value="<?= old('no_po'); ?>" placeholder="Masukan NO PO">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_po'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kendaraan">Kendaraan</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('kendaraan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('kendaraan'); ?>" name="kendaraan" id="kendaraan">
                                        <option selected disabled>Pilih Kendaraan</option>
                                        <?php foreach ($dataMobil as $key => $value) : ?>
                                            <option value="<?= $value['id_kendaraan']; ?>"><?= $value['tipe']; ?> - <?= $value['nopol']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('so'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="supir">Supir</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('supir')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('supir'); ?>" name="supir" id="supir">
                                        <option selected disabled>Pilih Supir</option>
                                        <?php foreach ($dataSupir as $key => $value) : ?>
                                            <option value="<?= $value['id_supir']; ?>"><?= $value['nama_supir']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('supir'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('catatan')) ? 'is-invalid' : ''; ?>" id="catatan" name="catatan" autofocus value="<?= old('catatan'); ?>" placeholder="Masukan catatan">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('catatan'); ?>
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