<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->
<?php $pieces = explode("-", $data['tgl_so']);
$tanggal = $pieces[2] . '/' . $pieces[1] . '/' . $pieces[0]; ?>


<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index">Penjualan</a>
                        <?= $aksi; ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Ubah Data </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_so']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label>Tanggal SO</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control <?= ($validation->hasError('tgl_so')) ? 'is-invalid' : ''; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="tgl_so" name="tgl_so" value="<?= $tanggal; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_so'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dataCustomer">Customer</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('dataCustomer')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus id="customer" name="customer" disabled>
                                        <?php foreach ($dataCustomer as $key => $value) : ?>
                                            <option value="<?= $value['id_customer']; ?>" <?php if ($value['id_customer'] == $data['id_customer']) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                <?= $value['nama_customer']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('dataCustomer'); ?>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="alamat_kirim">Alamat Kirim</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('alamat_kirim')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="alamat_kirim" id="alamat_kirim">
                                        <? //php foreach ($dataAlamat as $key => $value) : 
                                        ?>
                                            <option value="<? // $value['id_customer']; 
                                                            ?>" <? //php if ($value['id_customer'] == $data['alamat_kirim']) {echo "selected";} 
                                                                ?>>
                                                <? //= $value['alamat']; 
                                                ?>
                                            </option>
                                        <? //php endforeach 
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <? //= $validation->getError('alamat_kirim'); 
                                        ?>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" autofocus value="<?= (old('keterangan')) ? old('keterangan') : $data['keterangan']; ?>" placeholder="Masukan keterangan" autocomplete="off">
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
<script>
    $('#customer').change(function() {
        var customer = $('#customer').val();
        $.ajax({
            url: "/<?= $judul ?>/getAlamat",
            type: "POST",
            data: {
                namaCustomer: customer
            },
            dataType: "json",
            success: function(data) {
                // let obj = JSON.parse(data)
                var baris = '';
                for (let i = 0; i < data.length; i++) {
                    const element = data[i];
                    baris += '<option value="' + element.id + '" >' + element.alamat + '</option>';
                }
                $('#alamat_kirim').html(baris);
            }
        })
    });
</script>
<?= $this->endSection(); ?>