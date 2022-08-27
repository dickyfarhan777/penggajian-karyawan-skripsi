<?php
session_start();
include "./config/koneksi.php";
include "./utils/function.php";

if (!$_SESSION['login']) {
  echo "<script>alert('Anda belum login')</script>";
  header("location:login/index.php?pesan=input");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <!-- Twitter meta-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="@pratikborsadiya">
  <meta property="twitter:creator" content="@pratikborsadiya">
  <!-- Open Graph Meta-->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Vali Admin">
  <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
  <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
  <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
  <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <title>Penggajian</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="asstes/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
  <!-- Navbar-->
  <?php include "./pages/templates/header/index.php" ?>
  <!-- Sidebar menu-->
  <?php include "./pages/templates/sidebar/index.php" ?>
  <?php
  if (isset($_GET['data_jabatan'])) {
    include "./pages/data_jabatan/index.php";
  } else if (isset($_GET['hapus_jabatan'])) {
    include "./pages/data_jabatan/hapus.php";
  } else if (isset($_GET['ubah_jabatan'])) {
    include "./pages/data_jabatan/ubah.php";
  } else if (isset($_GET['data_pegawai'])) {
    include "./pages/data_pegawai/index.php";
  } else if (isset($_GET['print_jabatan'])) {
    include "./pages/data_jabatan/print.php";
  } else if (isset($_GET['hapus_pegawai'])) {
    include "./pages/data_pegawai/hapus.php";
  } else if (isset($_GET['ubah_pegawai'])) {
    include "./pages/data_pegawai/ubah.php";
  } else if (isset($_GET['print'])) {
    include "./pages/data_pegawai/print.php";
  } else if (isset($_GET['data_laporan'])) {
    include "./pages/laporan_pegawai/index.php";
  } else if (isset($_GET['slip_gaji'])) {
    include "./pages/laporan_pegawai/slip_gaji.php";
  } else if (isset($_GET['complain'])) {
    include "./pages/laporan_pegawai/complain.php";
  } else if (isset($_GET['hapus_laporan'])) {
    include "./pages/laporan_pegawai/hapus.php";
  } else if (isset($_GET['laporan_gaji1'])) {
    include "./pages/laporan_pegawai/print1.php";
  } else if (isset($_GET['laporan_gaji'])) {
    include "./pages/laporan_pegawai/print.php";
  } else if (isset($_GET['data_complain'])) {
    include "./pages/data_complain/index.php";
  } else if (isset($_GET['selesai_complain'])) {
    include "./pages/data_complain/selesai.php";
  } else if (isset($_GET['data_admin'])) {
    include "./pages/data_admin/index.php";
  } else if (isset($_GET['edit_admin'])) {
    include "./pages/data_admin/edit.php";
  } else if (isset($_GET['hapus_admin'])) {
    include "./pages/data_admin/hapus.php";
  } else if (isset($_GET['logout'])) {
    include "./login/logout.php";
  } else {
    include "./pages/home/index.php";
  }
  ?>
  <!-- Essential javascripts for application to work-->
  <script src="asstes/js/jquery-3.3.1.min.js"></script>
  <script src="asstes/js/popper.min.js"></script>
  <script src="asstes/js/bootstrap.min.js"></script>
  <script src="asstes/js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="asstes/js/plugins/pace.min.js"></script>
  <!-- Page specific javascripts-->
  <!-- Data table plugin-->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#sampleTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'print'
        ]
      });
    });
  </script>
  <!-- Google analytics script-->
  <script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
      (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-72504830-1', 'auto');
      ga('send', 'pageview');
    }
  </script>
</body>

</html>