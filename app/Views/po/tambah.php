<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index">Pengadaan</a>
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
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/save" enctype="multipart/form-data">
                            <div class="card-body">
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label>Tanggal PO</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control <?= ($validation->hasError('tgl_po')) ? 'is-invalid' : ''; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="tgl_po" name="tgl_po" autofocus value="<?= old('tgl_po'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_po'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('supplier')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('supplier'); ?>" name="supplier" id="supplier">
                                        <option selected disabled>Pilih Supplier</option>
                                        <?php foreach ($dataSupplier as $key => $value) : ?>
                                            <option value="<?= $value['id_supplier']; ?>"><?= $value['nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('supplier'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" autofocus value="<?= old('keterangan'); ?>" placeholder="Masukan keterangan" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan'); ?>
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
<div class="row">
    <div class="col">
        <table>
            <tr>
                <td></td>
            </tr>
        </table>
    </div>
</div>
<script>
</script>

<?= $this->endSection(); ?>