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
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label>Tanggal SO</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="tgl_so" name="tgl_so">
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_so'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="customer">Customer</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('customer')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('customer'); ?>" name="customer" id="customer">
                                        <option selected disabled>Pilih customer</option>
                                        <?php foreach ($dataCustomer as $key => $value) : ?>
                                            <option value="<?= $value['id_customer']; ?>"><?= $value['nama_customer']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('customer'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_kirim">Alamat Kirim</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('alamat_kirim')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('alamat_kirim'); ?>" name="alamat_kirim" id="alamat_kirim">

                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_kirim'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" autofocus value="<?= old('keterangan'); ?>" placeholder="Masukan keterangan">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan'); ?>
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
    $('#customer').change(function() {
        var customer = $('#customer').val();
        console.log(customer);
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
                    baris += '<option value="' + element.id_customer_detail + '" >' + element.alamat + '</option>';
                }
                $('#alamat_kirim').html(baris);
            }
        })
    });
</script>

<?= $this->endSection(); ?>