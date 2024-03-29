<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index/<?= $id_po ?>">Pengadaan barang detail</a>
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
                                    <select class="form-select form-control select2bs4  <?= ($validation->hasError('id_barang')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="id_barang" id="id_barang">
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
                                    <label for="berat_total">Berat (kg)</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('berat_total')) ? 'is-invalid' : ''; ?>" id="berat_total" name="berat_total" autofocus value="<?= old('berat_total'); ?>" placeholder="Masukan berat" min="0" oninput="validity.valid||(value='');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('berat_total'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_po_detail">Keterangan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan_po_detail')) ? 'is-invalid' : ''; ?>" id="keterangan_po_detail" name="keterangan_po_detail" autofocus value="<?= old('keterangan_po_detail'); ?>" placeholder="Masukan keterangan detail" autocomplete="off">
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

<script>
    $('#id_barang').change(function() {
        var idBarang = $('#id_barang').val();
        console.log(idBarang);
        $.ajax({
            url: "/PODetail/getBeratMax",
            type: "POST",
            data: {
                IdBarang: idBarang
            },
            dataType: "json",
            success: function(data) {
                document.getElementById("berat_total").value = data
                // pembatasan max
                document.getElementById("berat_total").max = data;
            }
        })
    });
</script>

<?= $this->endSection(); ?>