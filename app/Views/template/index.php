<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT Manggala | Warehouse</title>
  <base href="<?= base_url('assets'); ?>/">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- jQuery -->
  <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url('assets'); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="img/pt_manggala.jpg" alt="AdminLTELogo" height="60" width="60">
    </div>



    <!-- Navbar -->
    <?= $this->include('template/navbar'); ?>



    <!-- Main Sidebar Container -->
    <?= $this->include('template/sidebar'); ?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?= $this->include('template/content_header'); ?>
      <!-- /.content-header -->


      <!-- Main content -->
      <section class="content">
        <?= $this->renderSection('content'); ?>
      </section>
      <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->

    <!-- content Footer -->
    <?= $this->include('template/footer'); ?>
    <!-- /.coontent footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-light">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->



  </div>
  <!-- ./wrapper -->



  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url('assets'); ?>/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url('assets'); ?>/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url('assets'); ?>/plugins/jqvmap/jquery.vmap.min.js"></script> -->
  <script src="<?= base_url('assets'); ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url('assets'); ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url('assets'); ?>/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url('assets'); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url('assets'); ?>/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url('assets'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets'); ?>/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets'); ?>/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="<?= base_url('assets'); ?>/dist/js/pages/dashboard.js"></script> -->

  <!-- InputMask -->
  <script src="<?= base_url('assets'); ?>/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>



  <!-- DataTables  &  plugins -->
  <script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/pdfobject/pdfobject.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>
  <script>
    $(function() {
      $("#data-table1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#data-table1_wrapper .col-md-6:eq(0)');
      $('#data-table2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,

      });
      $('.data-table1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,

      });
      $('.select2').select2()
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    });
  </script>

  <script>
    //Timepicker
    $('#timepicker').datetimepicker({
      use24hours: true,
      format: 'HH:mm'
    })
  </script>
  <script>
    //validasi upload file
    function validasiFile() {
      var inputFile = document.getElementById('file');
      var pathFile = inputFile.value;
      var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      if (!ekstensiOk.exec(pathFile)) {
        alert('Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png');
        inputFile.value = '';
        return false;
      } else {
        return true;
      }
    }

    function validasiFile2() {
      var inputFile = document.getElementById('file2');
      var pathFile = inputFile.value;
      var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      if (!ekstensiOk.exec(pathFile)) {
        alert('Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png');
        inputFile.value = '';
        return false;
      } else {
        return true;
      }
    }
    //end validasi upload file	    

    $.fn.digits = function() {
      return this.each(function() {
        $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $(this).val($(this).val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
      })
    }

    $.fn.tanggal = function() {
      return this.each(function() {
        var tanggal = $(this).text().split('-');
        var bulan = ['-', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var xbulan = tanggal[1];
        //var bulan = bulan[xbulan.replace('0','')];
        if (tanggal[1] >= 10) {
          var bulan = bulan[xbulan];
        } else {
          var bulan = bulan[xbulan.replace('0', '')];
        }
        $(this).text(tanggal[2] + ' ' + bulan + ' ' + tanggal[0]);
      })
    }
    $.fn.tanggal_waktu = function() {
      return this.each(function() {
        var waktu = $(this).text().split(' ');
        var tanggal = waktu[0].split('-');
        var bulan = ['-', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var xbulan = tanggal[1];
        //var bulan = bulan[xbulan.replace('0','')];
        if (tanggal[1] >= 10) {
          var bulan = bulan[xbulan];
        } else {
          var bulan = bulan[xbulan.replace('0', '')];
        }
        $(this).text(tanggal[2] + ' ' + bulan + ' ' + tanggal[0] + ', ' + waktu[1]);
      })
    }

    $(document).ready(function() {
      $('.rupiah').digits();
      $('.tanggal').tanggal();
      $('.tanggal_waktu').tanggal_waktu();

    });

    $('.rupiah').on('keyup', function() {
      var diajukan = $(this).val();
      diajukan = parseInt(diajukan.replace(/[^0-9]/g, ''), 10);
      if (isNaN(diajukan)) {
        var diajukan = 0;
      }
      $(this).val(Number(diajukan).toLocaleString('id'));
    });

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    $('[data-mask]').inputmask()
  </script>
</body>

</html>