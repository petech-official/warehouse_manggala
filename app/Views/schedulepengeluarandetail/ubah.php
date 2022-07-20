<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index/<?= $id_schedule_pengeluaran; ?>"><?= $judul; ?></a>
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
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_schedule_pengeluaran']; ?>">
                            <div class="card-body">

                                <div class="form-group">
                                    <input type="hidden" value="<?= $id_schedule_pengeluaran_detail; ?>" name="id_schedule_pengeluaran" id="id_schedule_pengeluaran">
                                    <label for="cpor">SO</label>
                                    <select class="form-select form-control select2bs4  <?= ($validation->hasError('so')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('so'); ?>" name="so" id="so">
                                        <option selected disabled>Pilih SO</option>
                                        <?php foreach ($dataSO as $key => $value) : ?>
                                            <option value="<?= $value['id_so']; ?>" <?php if ($value['id_so'] == $data['id_so']) {
                                                                                        echo "selected";
                                                                                    } ?>><?= $value['no_so']; ?></option>
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
                                            <option value="<?= $value['id_customer']; ?>" <?php if ($value['id_customer'] == $data['id_customer']) {
                                                                                                echo "selected";
                                                                                            } ?>><?= $value['nama_customer']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('customer'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="id_customer_detail">Alamat Kirim</label>
                                    <select class="form-select form-control select2bs4  <?= ($validation->hasError('id_customer_detail')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('id_customer_detail'); ?>" name="id_customer_detail" id="id_customer_detail">
                                        <?php foreach ($dataCustomerDetail as $key => $value) :
                                        ?>
                                            <option value="<?= $value['id_customer_detail'];
                                                            ?>" <?php if ($value['id_customer_detail'] == $data['id_customer_detail']) {
                                                                    echo "selected";
                                                                }
                                                                ?>>
                                                <td><?= $value['alamat']; ?></td>
                                            </option>
                                        <?php endforeach
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_customer_detail'); ?>
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
                                    <label for="berat_pengeluaran">Berat (kg)</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('berat_pengeluaran')) ? 'is-invalid' : ''; ?>" id="berat_pengeluaran" name="berat_pengeluaran" value="<?= (old('berat_pengeluaran')) ? old('berat_pengeluaran') : $data['berat_pengeluaran']; ?>" autocomplete="off" placeholder="Masukan berat pengeluaran (kg)">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('berat_pengeluaran'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tipe">Status pengeluaran</label>
                                    <select class="form-select form-control select2bs4  <?= ($validation->hasError('status_pengeluaran')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus value="<?= old('status_pengeluaran'); ?>" name="status_pengeluaran" id="status_pengeluaran">
                                        <option selected disabled>Pilih status pengeluaran</option>
                                        <option value="1" <?php $status = "1";
                                                            if ($status == $data['status_pengeluaran']) {
                                                                echo "selected";
                                                            } ?>>Terkonfirmasi</option>
                                        <option value="0" <?php $status = "0";
                                                            if ($status == $data['status_pengeluaran']) {
                                                                echo "selected";
                                                            } ?>>Belum Terkonfirmasi</option>
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
                $('#id_customer_detail').html(baris);
            }
        })
    });
</script>
<?= $this->endSection(); ?>