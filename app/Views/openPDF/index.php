<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $judul; ?></h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <iframe src="/openPdf/reader" width=" 100%" height="700px"></iframe>
                    <!-- <iframe src="/packing_list/<?= $judul; ?>" width=" 100%" height="700px"></iframe> -->
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>