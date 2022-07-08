<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item">
      <a href="/dashboard/index" class="nav-link">
        Dashboard
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
        <?php if (session()->get('status')  == 'Admin') : ?>
          <a href="/user/index" class="nav-link">
            <i class=" fas fa-user"></i>
            User
          </a>
        <?php endif ?>
        <a class="nav-link" href="https://www.manggala-id.com/" target="blank">
          <i class="fas fa-users"></i>
          Profil Perusaahaan
        </a>
        <a class="nav-link" href="/loginAdmin/logout">
          <i class="fas fa-sign-out-alt"></i>
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->