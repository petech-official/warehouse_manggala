<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Penyimpanan</h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <h4>Bukti Penerimaan Barang (BPB)</h4>
                    <hr>
                    <?php if (session()->get('status')  != 'Manager Marketing') : ?>
                        <a href="/<?= $judul; ?>/tambah" class="btn btn-primary">Tambah Data</a><br><br>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                    <table class="table table-bordered table-striped" id="data-table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>No BPB</th>
                                <th>Tanggal BPB</th>
                                <th>No SJ Supplier</th>
                                <th>Packing List</th>
                                <th>Supir Supplier</th>
                                <th>No Mobil</th>
                                <th>Supplier</th>
                                <th>NO PO</th>
                                <!-- Selesai Disini -->

                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody style="padding: 50px;">
                            <?php
                            $i = 1;
                            foreach ($data as $key => $value) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <!-- Masukan Disini -->
                                    <td> <?= $value['no_bpb']; ?></td>
                                    <td class="tanggal"> <?= $value['tgl_bpb']; ?></td>
                                    <td> <?= $value['no_surat_jalan']; ?></td>
                                    <td>
                                        <form action="/openPDF/index" method="post" target="_blank">
                                            <input type="hidden" id="link" name="link" value="<?= $value['packing_list']; ?>">
                                            <button type="submit" class="btn btn-primary" name="view" id="view" target="_blank"><i class="fas fa-eye"></i></button>
                                        </form>
                                    </td>
                                    <td> <?= $value['supir']; ?></td>
                                    <td> <?= $value['no_mobil']; ?></td>

                                    <td> <?= $value['singkatan']; ?></td>
                                    <td> <?= $value['no_po']; ?></td>
                                    <!-- Selesai Disini -->

                                    <td>
                                        <a href="/<?= $judul; ?>Detail/index/<?= $value['id_bpb']; ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="fas fa-eye"></i></a>
                                        <?php if (session()->get('status')  != 'Manager Marketing') : ?>
                                            <a href="/<?= $judul; ?>/edit/<?= $value['id_bpb']; ?>" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah"><i class="fas fa-pen"></i></a>
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <!-- Button trigger modal -->
                                            <button type="button" href='#modalHapus' onclick="konfirmasiDelete(<?= $value['id_bpb']; ?>)" class="btn btn-danger" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php $i++;
                            endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <!-- Masukan Disini -->
                                <th>No BPB</th>
                                <th>Tanggal BPB</th>
                                <th>No SJ Supplier</th>
                                <th>Packing List</th>
                                <th>Supir Supplier</th>
                                <th>No Mobil</th>
                                <th>Supplier</th>
                                <th>NO PO</th>
                                <!-- Selesai Disini -->

                                <th>Aksi</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?php if (session()->get('status')  == 'Manager Marketing') : ?>
                    <div class="card-footer">
                        <a href="/SchedulePenerimaan/index" class="btn btn-primary">Jadwal Penerimaan (Schedule)</a>
                    </div>
                <?php endif ?>
                <?php if (session()->get('status')  != 'Manager Marketing') : ?>
                    <div class="card-footer">
                        <a href="/Penyimpanan/index" class="btn btn-primary mr-2">Jadwal Penerimaan (Schedule)</a>
                        <a href="/Penyimpanan/cek_stock" class="btn btn-primary">Stock Barang</a>
                    </div>
                <?php endif ?>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<form action="/<?= $judul; ?>/delete" method="POST" class="d-inline">
    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" id="id" name="id">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // delete
    function konfirmasiDelete(id) {
        $('#id').val(id);
    }
</script>

<script>
    $('#view').click(function() {
        var link = $('#link').val();
        console.log(link);
        $.ajax({
            url: "/openPDF/reader",
            type: "POST",
            data: {
                datalink: link
            },
            dataType: "json",
            success: function(data) {
                // let obj = JSON.parse(data)
                console.log("success");
            }
        })
    });
</script>
<?= $this->endSection(); ?>