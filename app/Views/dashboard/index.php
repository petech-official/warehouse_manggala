<?php session() ?>
<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= count($dataPO); ?> Purchase Order </h3>

                    <p>Berjalan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/po/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= count($dataSO); ?> Sales Order</h3>

                    <p>Berjalan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/so/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Kebutuhan Barang</h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="data-table1">
                        <thead>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>Nama Barang</th>
                                <th>Supplier</th>
                                <th>Berat (Kg)</th>

                            </tr>
                        </thead>
                        <tbody style="padding: 50px;">
                            <?php
                            $i = 1;
                            foreach ($data as $key => $value) : ?>
                                <tr>
                                    <!-- Masukan Disini -->

                                    <td><?= $value['jenis']; ?> <?= $value['ukuran']; ?> <?= $value['keterangan']; ?> <?= $value['lot']; ?> <?= $value['grade']; ?></td>
                                    <td><?= $value['singkatan']; ?></td>
                                    <td><?php
                                        $kebutuhan = $value['max_berat'] - $value['berat_total'];
                                        echo $kebutuhan ?></td>
                                    <!-- <td>
                                        <? //php getpengeluaran($value['id_barang']) 
                                        ?>
                                        <? //= $value['berat_do']; 
                                        ?>
                                        <?php
                                        // $pengeluaran3hari = ($data_pengeluaran[0]['berat_do'] + $data_pengeluaran[1]['berat_do'] + $data_pengeluaran[2]['berat_do']);
                                        // echo $pengeluaran3hari;
                                        ?>
                                        <input type="hidden" name="id_barang" id value="<?= $value['id_barang']; ?>">
                                    </td> -->

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>Nama Barang</th>
                                <th>Supplier</th>
                                <th>Berat (Kg)</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var customer = $('#customer').val();
    console.log(customer);
    $.ajax({
        url: "/Dashboard/Pengeluaran",
        type: "POST",
        data: {
            namaCustomer: customer
        },
        dataType: "json",
        // success: function(data) {
        //     // let obj = JSON.parse(data)
        //     var baris = '';
        //     for (let i = 0; i < data.length; i++) {
        //         const element = data[i];
        //         baris += '<option value="' + element.id_customer_detail + '" >' + element.alamat + '</option>';
        //     }
        //     $('#alamat_kirim').html(baris);
        // }
    });
</script>
<?= $this->endSection(); ?>