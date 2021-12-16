<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif ?>
    <div class="row">
        <!-- DATA JENIS -->
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Keterangan <?= $judul; ?></h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <a href="/<?= $judul; ?>/tambahKeterangan" class="btn btn-primary">Tambah Data Keterangan</a><br><br>

                    <table class="table table-bordered table-striped data-table1">
                        <thead>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>Keterangan</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 50px;">
                            <?php
                            $i = 1;
                            foreach ($dataKeterangan as $key => $value) : ?>
                                <tr>
                                    <!-- Masukan Disini -->
                                    <td><?= $value['keterangan']; ?></td>
                                    <!-- Selesai Disini -->
                                    <td>
                                        <a href="/<?= $judul; ?>/edit/<?= $value['id']; ?>" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <!-- Button trigger modal -->
                                        <button type="button" href='#modalHapusKeterangan' onclick="konfirmasiDeleteKeterangan(<?= $value['id']; ?>)" class="btn btn-danger" data-toggle="modal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>Keterangan</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>


            <!-- DATA GRADE -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Grade <?= $judul; ?></h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <a href="/<?= $judul; ?>/tambahGrade" class="btn btn-primary">Tambah Data Grade</a><br><br>

                    <table class="table table-bordered table-striped data-table1">
                        <thead>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>Grade</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 50px;">
                            <?php
                            $i = 1;
                            foreach ($dataGrade as $key => $value) : ?>
                                <tr>
                                    <!-- Masukan Disini -->
                                    <td><?= $value['grade']; ?></td>
                                    <!-- Selesai Disini -->
                                    <td>
                                        <a href="/<?= $judul; ?>/edit/<?= $value['id']; ?>" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <!-- Button trigger modal -->
                                        <button type="button" href='#modalHapusGrade' onclick="konfirmasiDeleteGrade(<?= $value['id']; ?>)" class="btn btn-danger" data-toggle="modal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>Grade</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- DATA Jenis -->

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Jenis <?= $judul; ?></h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <a href="/<?= $judul; ?>/tambahJenis" class="btn btn-primary">Tambah Data Jenis</a><br><br>

                    <table class="table table-bordered table-striped data-table1">
                        <thead>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>Jenis</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 50px;">
                            <?php
                            $i = 1;
                            foreach ($dataJenis as $key => $value) : ?>
                                <tr>
                                    <!-- Masukan Disini -->
                                    <td><?= $value['jenis']; ?></td>
                                    <!-- Selesai Disini -->
                                    <td>
                                        <a href="/<?= $judul; ?>/edit/<?= $value['id']; ?>" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <!-- Button trigger modal -->
                                        <button type="button" href='#modalHapusJenis' onclick="konfirmasiDeleteJenis(<?= $value['id']; ?>)" class="btn btn-danger" data-toggle="modal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- Masukan Disini -->
                                <th>Jenis</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>


        </div>

    </div>
</div>

<!-- Modal Delete-->
<!-- Delete Keterangan -->
<form action="/barang/deleteKeterangan" method="POST" class="d-inline">
    <div class="modal fade" id="modalHapusKeterangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data ini ?
                    <input type="text" id="idKeterangan" name="idKeterangan">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Delete Jenis -->
<form action="/barang/deleteJenis" method="POST" class="d-inline">
    <div class="modal fade" id="modalHapusJenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data ini ?
                    <input type="text" id="idJenis" name="idJenis">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Delete Grade -->
<form action="/barang/deleteGrade" method="POST" class="d-inline">
    <div class="modal fade" id="modalHapusGrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data ini ?
                    <input type="hidden" id="idGrade" name="idGrade">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // delete
    function konfirmasiDeleteJenis(idJenis) {
        $('#idJenis').val(idJenis);
    }

    function konfirmasiDeleteKeterangan(idKeterangan) {
        $('#idKeterangan').val(idKeterangan);
    }

    function konfirmasiDeleteGrade(idGrade) {
        $('#idGrade').val(idGrade);
    }
</script>

<?= $this->endSection(); ?>