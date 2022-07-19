<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/dashboard/" class="brand-link">
    <img src="img/pt_manggala.jpg" alt="Manggala Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><b>Manggala</b></span>
  </a>
  <div class="ml-2">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- Data Master -->
        <?php if ((session()->get('status')  == 'Manager Warehouse') || (session()->get('status')  == 'Manager Marketing')) : ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if (session()->get('status')  == 'Manager Marketing') : ?>
                <li class="nav-item">
                  <a href="/supplier/index" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p>
                      Supplier
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/customer/" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p>
                      Customer
                    </p>
                  </a>
                </li>
              <?php endif ?>
              <?php if (session()->get('status')  == 'Manager Warehouse') : ?>
                <li class="nav-item">
                  <a href="/supir/" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p>
                      Supir
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/kendaraan/" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p>
                      Kendaraan
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/stock/" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p>
                      Barang
                    </p>
                  </a>
                </li>
              <?php endif ?>
            </ul>
          </li>
          <?php if (session()->get('status')  == 'Manager Warehouse') : ?>
            <li class="nav-item">
              <a href="/barang/" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                <p>
                  Sub Barang
                </p>
              </a>
            </li>
          <?php endif ?>
        <?php endif ?>
        <?php if ((session()->get('status')  == 'Boss')) : ?>

          <li class="nav-item">
            <a href="/po/" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                PO
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/bpb/" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                BPB
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/stockbarang/" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Stock
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/so/" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                SO
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dorder/" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                DO
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="/schedulepenerimaan/" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Schedule Penerimaan
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/schedulepengeluaran/" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Schedule Pengeluaran
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
        <?php endif ?>
        <li class="nav-item">
          <?php if (session()->get('status')  != 'Manager Marketing') : ?>
            <a href="/pengadaan/" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Pengadaan
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          <?php endif ?>
          <?php if (session()->get('status')  == 'Manager Marketing') : ?>
            <a href="/pengadaan/list_barang" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Pengadaan
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          <?php endif ?>
        </li>
        <li class="nav-item">
          <?php if (session()->get('status')  != 'Manager Marketing') : ?>
            <a href="/penyimpanan/" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Penyimpanan
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          <?php endif ?>
          <?php if (session()->get('status')  == 'Manager Marketing') : ?>
            <a href="/schedulepenerimaan/" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Penyimpanan
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          <?php endif ?>
        </li>
        <li class="nav-item">
          <?php if (session()->get('status')  != 'Manager Marketing') : ?>
            <a href="/pengeluaran/" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Pengeluaran
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          <?php endif ?>
          <?php if (session()->get('status')  == 'Manager Marketing') : ?>
            <a href="/so/" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Pengeluaran
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          <?php endif ?>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>