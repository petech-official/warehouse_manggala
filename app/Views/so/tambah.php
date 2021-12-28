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
                                <div class="form-group">
                                    <label for="noso">No SO</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('noso')) ? 'is-invalid' : ''; ?>" id="noso" name="noso" autofocus value="<?= old('noso'); ?>" placeholder="Masukan noso">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('noso'); ?>
                                    </div>
                                </div>
                                 <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                <label>Date masks:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="datemask">
                                </div>
                                
                                <div class="form-group">
                                    <label for="customer">customer</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('customer')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('customer'); ?>" name="customer" id="customer">
                                        <option selected disabled>Pilih customer</option>
                                        <?php foreach ($dataCustomer as $key => $value) : ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
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