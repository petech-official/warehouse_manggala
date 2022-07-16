<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->
<?php $pieces = explode("-", $data['tgl_do']);
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
                            <h3 class="card-title">Form Ubah Data </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_do']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label>Tgl DO</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control <?= ($validation->hasError('tgl_do')) ? 'is-invalid' : ''; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="tgl_do" name="tgl_do" value="<?= $tanggal; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_do'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_po">NO PO</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_po')) ? 'is-invalid' : ''; ?>" id="no_po" name="no_po" autofocus value="<?= (old('no_po')) ? old('no_po') : $data['no_po']; ?>" placeholder="Masukan no po">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_po'); ?>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="so">NO SO</label>
                                    <select class="form-select form-control  <? //= ($validation->hasError('so')) ? 'is-invalid' : ''; 
                                                                                ?>" aria-label="Default select example" autofocus name="so" id="so">
                                        <? //php foreach ($dataSO as $key => $value) : 
                                        ?>
                                            <option value="<? //= $value['id_so']; 
                                                            ?>" <? //php if ($value['id_so'] == $data['id_so']) {echo "selected";} 
                                                                ?>>
                                                <? //= $value['no_so']; 
                                                ?>
                                            </option>
                                        <? //php endforeach 
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <? //= $validation->getError('so'); 
                                        ?>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label for="kendaraan">Kendaraan</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('kendaraan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="kendaraan" id="kendaraan">
                                        <?php foreach ($dataKendaraan as $key => $value) : ?>
                                            <option value="<?= $value['id_kendaraan']; ?>" <?php if ($value['id_kendaraan'] == $data['id_kendaraan']) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                <?= $value['nopol']; ?> - <?= $value['tipe']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kendaraan'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="supir">Supir</label>
                                    <select class="form-select form-control  <?= ($validation->hasError('supir')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="supir" id="supir">
                                        <?php foreach ($dataSupir as $key => $value) : ?>
                                            <option value="<?= $value['id_supir']; ?>" <?php if ($value['id_supir'] == $data['id_supir']) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                                <?= $value['nama_supir']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('so'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('catatan')) ? 'is-invalid' : ''; ?>" id="catatan" name="catatan" autofocus value="<?= (old('catatan')) ? old('catatan') : $data['catatan']; ?>" placeholder="Masukan catatan" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('catatan'); ?>
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

<?= $this->endSection(); ?>