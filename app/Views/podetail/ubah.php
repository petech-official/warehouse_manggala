<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index/<?= $id_po['id_po']; ?>">Pengadaan barang detail</a>
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
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_po_detail']; ?>">
                            <div class="card-body">
                                <input type="hidden" value="<?= $data['id_po']; ?>" name="id_po" id="id_po">
                                <!-- <div class="form-group">
                                    <label for="id_barang">Barang</label>
                                    
                                    <select class="form-select form-control select2bs4  <?= ($validation->hasError('id_barang')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="id_barang" name="id_barang">
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
                                </div> -->
                                <div class="form-group">
                                    <label for="keterangan_po_detail">Keterangan PO Detail</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan_po_detail')) ? 'is-invalid' : ''; ?>" id="keterangan_po_detail" name="keterangan_po_detail" autofocus value="<?= (old('keterangan_po_detail')) ? old('keterangan_po_detail') : $data['keterangan_po_detail']; ?>" placeholder="Masukan keterangan detail" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan_po_detail'); ?>
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