<?php $session = session() ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <?php $aksiKosong = '' ?>
        <h1 class="m-0">PT. MANGGALA INDOPRATAMA
        </h1>
        <p><?= ucwords($session->get('status')); ?> : <?= $session->get('username'); ?></p>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>