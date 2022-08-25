<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index">Jadwal pengeluaran</a>
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
                                    <label>Tanggal Pengeluaran</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control <?= ($validation->hasError('tgl_pengeluaran')) ? 'is-invalid' : ''; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="tgl_pengeluaran" name="tgl_pengeluaran" autofocus value="<?= old('tgl_pengeluaran'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_pengeluaran'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="so">SO</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('so')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('so'); ?>" name="so" id="so">
                                        <option selected disabled>Pilih SO</option>
                                        <?php foreach ($dataSO as $key => $value) : ?>
                                            <option value="<?= $value['id_so']; ?>"><?= $value['no_so']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('so'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="customer">Customer</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('customer')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('customer'); ?>" name="customer" id="customer">
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
                                    <label for="alamat_kirim">Alamat kirim</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('alamat_kirim')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('alamat_kirim'); ?>" name="alamat_kirim" id="alamat_kirim">

                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_kirim'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_barang">Barang</label>
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('id_barang')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="id_barang" id="id_barang">
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
                                    <label for="berat_pengeluaran">Berat (kg)</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('berat_pengeluaran')) ? 'is-invalid' : ''; ?>" id="berat_pengeluaran" name="berat_pengeluaran" autofocus value="<?= old('berat_pengeluaran'); ?>" placeholder="Masukan berat" min="0" oninput="validity.valid||(value='');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('berat_pengeluaran'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tipe">Status pengeluaran</label>
                                    <select class="form-select form-control select2bs4  <?= ($validation->hasError('status_pengeluaran')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('status_pengeluaran'); ?>" name="status_pengeluaran" id="status_pengeluaran">
                                        <option selected disabled>Pilih status pengeluaran</option>
                                        <option value="1">Terkonfirmasi</option>
                                        <option value="0">Belum Terkonfirmasi</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_pengeluaran'); ?>
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
        console.log(customer);
        $.ajax({
            url: "/SO/getAlamat",
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