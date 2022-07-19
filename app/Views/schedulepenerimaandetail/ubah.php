<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index/<?= $id_schedule_penerimaan; ?>"><?= $judul; ?></a>
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
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_schedule_penerimaan']; ?>">
                            <div class="card-body">

                                <div class="form-group">
                                    <input type="hidden" value="<?= $id_schedule_penerimaan_detail; ?>" name="id_schedule_penerimaan" id="id_schedule_penerimaan">
                                    <label for="cpor">PO</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('po')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('po'); ?>" name="po" id="po">
                                        <option selected disabled>Pilih PO</option>
                                        <?php foreach ($dataPO as $key => $value) : ?>
                                            <option value="<?= $value['id_po']; ?>" <?php if ($value['id_po'] == $data['id_po']) {
                                                                                        echo "selected";
                                                                                    } ?>><?= $value['no_po']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('po'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('supplier')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('supplier'); ?>" name="supplier" id="supplier">
                                        <option selected disabled>Pilih Supplier</option>
                                        <?php foreach ($dataSupplier as $key => $value) : ?>
                                            <option value="<?= $value['id_supplier']; ?>" <?php if ($value['id_supplier'] == $data['id_supplier']) {
                                                                                                echo "selected";
                                                                                            } ?>><?= $value['nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('supplier'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_barang">Barang</label>
                                    <select class="form-select form-control select2bs4  <?= ($validation->hasError('id_barang')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('id_barang'); ?>" name="id_barang" id="id_barang">
                                        <?php foreach ($dataBarang as $key => $value) :
                                        ?>
                                            <option value="<?= $value['id_barang'];
                                                            ?>" <?php if ($value['id_barang'] == $data['id_barang']) {
                                                                    echo "selected";
                                                                }
                                                                ?>>
                                                <td><?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> <?= $value['lot']; ?> <?= $value['grade']; ?></td>
                                            </option>
                                        <?php endforeach
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_barang'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="berat_penerimaan">Berat (kg)</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('berat_penerimaan')) ? 'is-invalid' : ''; ?>" id="berat_penerimaan" name="berat_penerimaan" value="<?= (old('berat_penerimaan')) ? old('berat_penerimaan') : $data['berat_penerimaan']; ?>" autocomplete="off" placeholder="Masukan berat penerimaan (kg)">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('berat_penerimaan'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tipe">Status Penerimaan</label>
                                    <select class="form-select form-control select2bs4  <?= ($validation->hasError('status_penerimaan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('status_penerimaan'); ?>" name="status_penerimaan" id="status_penerimaan">
                                        <option selected disabled>Pilih status penerimaan</option>
                                        <option value="1" <?php $status = "1";
                                                            if ($status == $data['status_penerimaan']) {
                                                                echo "selected";
                                                            } ?>>Terkonfirmasi</option>
                                        <option value="0" <?php $status = "0";
                                                            if ($status == $data['status_penerimaan']) {
                                                                echo "selected";
                                                            } ?>>Belum Terkonfirmasi</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_penerimaan'); ?>
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
    $('#supplier').change(function() {
        var supplier = $('#supplier').val();
        console.log(supplier);
        $.ajax({
            url: "/<?= $judul ?>/getBarang",
            type: "POST",
            data: {
                namaSupplier: supplier
            },
            dataType: "json",
            success: function(data) {
                // let obj = JSON.parse(data)
                var baris = '';
                for (let i = 0; i < data.length; i++) {
                    const element = data[i];
                    baris += '<option value="' + element.id_barang + '" >' + element.jenis + ' ' + element.ukuran + ' ' + element.keterangan + ' ' + element.lot + ' ' + element.grade + '</option>';
                }
                $('#id_barang').html(baris);
            }
        })
    });
</script>
<?= $this->endSection(); ?>