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
                            <h3 class="card-title">Form Ubah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_so_detail']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" value="<?= $data['id_so']; ?>" name="id_so" id="id_so">
                                    <!-- <label for="id_barang">Barang</label>

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
                                    </div> -->
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_so">Alamat Kirim</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('keterangan_so')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="keterangan_so" id="keterangan_so">
                                        <option value="" selected disabled>Pilih Alamat</option>
                                        <?php foreach ($dataAlamat as $key => $value) : ?>
                                            <option value="<?= $value['id_customer_detail']; ?>" <?php if ($value['id_customer_detail'] == $data['keterangan_so']) {
                                                                                                        echo "selected";
                                                                                                    } ?>>
                                                <?= $value['alamat']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
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