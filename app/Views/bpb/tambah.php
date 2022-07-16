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
                        <form id="quickForm" method="POST" enctype="multipart/form-data" action="/<?= $judul; ?>/save">
                            <div class="card-body">
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label>Tanggal BPB</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control  <?= ($validation->hasError('tgl_bpb')) ? 'is-invalid' : ''; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="tgl_bpb" name="tgl_bpb" autofocus value="<?= old('tgl_bpb'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_bpb'); ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="no_surat_jalan">No Surat Jalan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_surat_jalan')) ? 'is-invalid' : ''; ?>" id="no_surat_jalan" name="no_surat_jalan" autofocus value="<?= old('no_surat_jalan'); ?>" placeholder="Masukan no surat jalan" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_surat_jalan'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="packing_list" class="col-sm-2 col-form-label">Packing List</label>
                                    <input class="form-control <?= ($validation->hasError('packing_list')) ? 'is-invalid' : ''; ?>" type="file" id="packing_list" name="packing_list">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('packing_list'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="supir">Supir Supplier</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('supir')) ? 'is-invalid' : ''; ?>" id="supir" name="supir" autofocus value="<?= old('supir'); ?>" placeholder="Masukan nama supir" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('supir'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_mobil">No Kendaraan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_mobil')) ? 'is-invalid' : ''; ?>" id="no_mobil" name="no_mobil" autofocus value="<?= old('no_mobil'); ?>" placeholder="Masukan no kendaraan" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_mobil'); ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="cpor">PO</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('po')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('po'); ?>" name="po" id="po">
                                        <option selected disabled>Pilih PO</option>
                                        <?php foreach ($dataPO as $key => $value) : ?>
                                            <option value="<?= $value['id_po']; ?>"><?= $value['no_po']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('po'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="barang">Pilih Barang</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('barang')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('barang'); ?>" name="barang" id="barang">
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('barang'); ?>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="quantitas">Box</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('quantitas')) ? 'is-invalid' : ''; ?>" id="quantitas" name="quantitas" autofocus value="<?= old('quantitas'); ?>" placeholder="Masukan box">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('quantitas'); ?>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="berat_total">Berat (kg)</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('berat_total')) ? 'is-invalid' : ''; ?>" id="berat_total" name="berat_total" autofocus value="<?= old('berat_total'); ?>" placeholder="Masukan berat">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('berat_total'); ?>
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

<script>
    $('#po').change(function() {
        var po = $('#po').val();
        console.log(po);
        $.ajax({
            url: "/<?= $judul ?>/getPO",
            type: "POST",
            data: {
                namaPO: po
            },
            dataType: "json",
            success: function(data) {
                // let obj = JSON.parse(data)
                var baris = '';
                for (let i = 0; i < data.length; i++) {
                    const element = data[i];
                    baris += '<option value="' + element.id_po_detail + '" >' + element.jenis + ' ' + element.ukuran + ' ' + element.keterangan + ' ' + element.grade + ' ' + element.lot + '</option>';
                }
                $('#barang').html(baris);
            }
        })
    });
</script>

<?= $this->endSection(); ?>