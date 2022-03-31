<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
      <ul class="app-menu">
            <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home</span></a>
            </li>
            <?php if (isset($_SESSION['login']['role_akses'])) { ?>
                  <li><a class="app-menu__item" href="index.php?data_jabatan"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Data Jabatan</span></a>
                  </li>
                  <li><a class="app-menu__item" href="index.php?data_pegawai"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Data Data Karyawan</span></a>
                  </li>
            <?php } ?>
            <li><a class="app-menu__item" href="index.php?data_laporan"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Data Laporan Gaji</span></a>
            </li>
      </ul>
</aside>