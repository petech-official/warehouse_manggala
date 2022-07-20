<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item">
      <a href="/dashboard/index" class="nav-link">
        Halaman Utama
      </a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-th-large"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        <?php if (session()->get('status')  == 'Manager Warehouse') : ?>
          <div class="dropdown-divider"></div>
          <a href="/user/index" class="dropdown-item">
            Admin
          </a>
        <?php endif ?>

        <div class="dropdown-divider"></div>
        <a href="https://www.manggala-id.com/" target="blank" class="dropdown-item">
          Tentang Perusahaan
        </a>

        <div class="dropdown-divider"></div>
        <a href="/loginAdmin/logout" class="dropdown-item">
          Keluar
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->