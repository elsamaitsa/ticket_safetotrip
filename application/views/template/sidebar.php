<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin - Wisata</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= base_url() ?>Main" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p class="font-14">Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder-open"></i>
            <p class="font-14">
              Master Data
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url() ?>Type" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p class="font-14">Type Ticket</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Group" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p class="font-14">Group Days</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Jadwal" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p class="font-14">Jadwal</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Layanan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p class="font-14">Layanan Ticket</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p class="font-14">
              Ticketing
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url() ?>Ticket" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p class="font-14">Reference Ticket</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Booking" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p class="font-14">Booking</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>T_Ticket" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p class="font-14">Transaksi Ticket</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>Login/logout" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
            <p class="font-14">Logout</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>