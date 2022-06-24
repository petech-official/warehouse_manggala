<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->
<?php $pieces = explode("-", $data['tgl_bpb']);
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
                        <form action="/openPDF/index" method="post" target="_blank" id="quickForm">
                            <div class="card-body">
                                <input type="hidden" class="form-control" id="link" name="link" value="<?= $data['packing_list']; ?>">
                                <button type="submit" class="btn btn-primary" name="view" id="view" target="_blank"><i class="fas fa-eye"></i> Lihat packing list sebelumnya</button>
                            </div>
                        </form>
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_bpb']; ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label for="dataSupplier">Packing List</label>
                                    <br>
                                    <input class="form-control <?= ($validation->hasError('packing_list')) ? 'is-invalid' : ''; ?>" type="file" id="packing_list" name="packing_list">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('packing_list'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tgl BPB</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="tgl_bpb" name="tgl_bpb" value="<?= $tanggal; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_bpb'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_surat_jalan">No Surat Jalan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_surat_jalan')) ? 'is-invalid' : ''; ?>" id="no_surat_jalan" name="no_surat_jalan" autofocus value="<?= (old('no_surat_jalan')) ? old('no_surat_jalan') : $data['no_surat_jalan']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_surat_jalan'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="supir">Supir</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('supir')) ? 'is-invalid' : ''; ?>" id="supir" name="supir" autofocus value="<?= (old('supir')) ? old('supir') : $data['supir']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('supir'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_mobil">No Mobil</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_mobil')) ? 'is-invalid' : ''; ?>" id="no_mobil" name="no_mobil" autofocus value="<?= (old('no_mobil')) ? old('no_mobil') : $data['no_mobil']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_mobil'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dataPO">PO</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('dataPO')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus id="po" name="po">
                                        <?php foreach ($dataPO as $key => $value) : ?>
                                            <option value="<?= $value['id_po']; ?>" <?php if ($value['id_po'] == $data['no_po']) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                                <?= $value['no_po']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('po'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="id_barang">Barang</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('id_barang')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="barang" id="barang">


                                        <?php foreach ($dataBarang as $key => $value) : ?>
                                            <option value="<?= $value['id_barang']; ?>" <?php if ($value['id_barang'] == $dataIdBarang[0]['id_barang']) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                                <?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> <?= $value['grade']; ?> <?= $value['lot']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_barangbarang'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="berat">Berat</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('berat')) ? 'is-invalid' : ''; ?>" id="berat" name="berat" autofocus value="<?= (old('berat')) ? old('berat') : $data['berat']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('berat'); ?>
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
                    baris += '<option value="' + element.id_barang + '" >' + element.jenis + ' ' + element.ukuran + ' ' + element.keterangan + ' ' + element.grade + ' ' + element.lot + '</option>';
                }
                $('#barang').html(baris);
            }
        })
    });
</script>
<?= $this->endSection(); ?>