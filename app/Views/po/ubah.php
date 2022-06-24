<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->
<?php $pieces = explode("-", $data['tgl_po']);
$tanggal = $pieces[2] . '/' . $pieces[1] . '/' . $pieces[0]; ?>


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
                            <h3 class="card-title">Form Ubah Data <?= $judul; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_po']; ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label>Tgl PO</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="tgl_po" name="tgl_po" value="<?= $tanggal; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dataSupplier">Supplier</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('dataSupplier')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus id="supplier" name="supplier">
                                        <?php foreach ($dataSupplier as $key => $value) : ?>
                                            <option value="<?= $value['id_supplier']; ?>" <?php if ($value['id_supplier'] == $data['id_supplier']) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                <?= $value['nama']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('dataSupplier'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_po">Keterangan PO</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan_po')) ? 'is-invalid' : ''; ?>" id="keterangan_po" name="keterangan_po" autofocus value="<?= (old('keterangan_po')) ? old('keterangan_po') : $data['keterangan_po']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan_po'); ?>
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