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
                </div>
                <iframe src="/packing_list/<?= $judul; ?>" style="width:600px; height:500px;" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>