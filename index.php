<?php
session_start();
require_once('config.php');
// Load file autoload.php
require 'vendor/autoload.php';

if (isset($_SESSION["login"]) != "login") {
  header("location:default_agen");
}

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perpus SP2</title>
  <link rel="icon" href="dist/img/logo_sp.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/fontawesome-free-6.1.1-web/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/opac.png" alt="AdminLTELogo" height="260" width="760">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?page=default" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="?page=setelan_user&id_user=<?= $_SESSION['id']; ?>" class="dropdown-item">
            <i class="fas fa-gear mr-2"></i> Setelan User
            <span class="float-right text-muted text-sm"><?= $_SESSION['user']; ?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="view/cpanel/proses/login.php?log=logout" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
            <span class="float-right text-muted text-sm"></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Action</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?page=default" class="brand-link">
      <img src="dist/img/logo_sp.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-1" style="opacity: .8">
      <span class="brand-text font-weight-light">Perpus SP2</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/default.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="?page=setelan_user&id_user=<?= $_SESSION['id']; ?>" class="d-block"><?= $_SESSION['user']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pinjam Buku
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview bg-light">
              <li class="nav-item">
                <a href="?page=siswa_pinjam" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siswa Pinjam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=guru_pinjam" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guru Pinjam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=lain_lain" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lain-lain</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Inventory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=buku_masuk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku Masuk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Databooks</li>
          <li class="nav-item">
            <a href="?page=databooks" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Databooks
                <span class="badge right"><i class="fas fa-database"></i></span>
              </p>
            </a>
          </li>
          <li class="nav-header">Recycle Bin</li>
          <li class="nav-item">
            <a href="?page=trash" class="nav-link">
              <i class="nav-icon fas fa-trash-alt"></i>
              <p>
                Recycle Bin
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Perpustakaan SMK Satya praja 2 Petarukan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">
                  <?php 
                if (empty($_GET['page'])) {
                  echo "Dashboard";
                }else{
                  echo "Dashboard";
                }
                ?>
                </a>
              </li>
              <li class="breadcrumb-item active">
                <?php
                if (empty($_GET['page'])) {
                  echo "Home";
                }else{
                  echo $_GET['page'];
                }
                ?>
              </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
          if(isset($_GET['page'])){
              $page = $_GET['page'];
              switch ($page) {
                case 'buku_masuk':
                  require_once('view/cpanel/buku_masuk.php');
                  break;
                case 'buku_keluar':
                  require_once('view/cpanel/buku_keluar.php');
                  break;
                case 'databooks':
                  require_once('view/cpanel/databooks.php');
                  break;
                case 'default';
                  require_once('view/cpanel/page_default.php');
                  break;
                case 'edit_databooks':
                  require_once('view/cpanel/edit_databooks.php');
                  break;
                case 'pinjam_buku':
                  require_once('view/cpanel/pinjam_buku.php');
                  break;
                case 'guru_pinjam':
                  require_once('view/cpanel/guru_pinjam.php');
                  break;
                case 'siswa_pinjam':
                  require_once('view/cpanel/siswa_pinjam.php');
                  break;
                case 'lain_lain':
                  require_once('view/cpanel/lain_lain_pinjam.php');
                  break;
                case 'setelan_user':
                  require_once('view/cpanel/setelan_user.php');
                  break;
                case 'trash':
                  require_once('view/cpanel/trash.php');
                  break;
                case 'import_excel':
                  require_once('view/cpanel/import_excel.php');
                  break;

                default:
                  require_once('view/cpanel/page_default.php');
                  break;
              }
          }else{
            require_once("view/cpanel/page_default.php");
          }
        ?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>&copy; 2022 <a href="#">Perpustakaan SMk Satya Praja 2 Petarukan</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(document).ready( function () {
      $('#table_now').DataTable();
  });

  $(document).ready( function () {
      $('#table_produktif').DataTable();
      $('#table_nonproduktif').DataTable();
      $('#table_umum').DataTable();
  });

  $('.select2').select2();
</script>
<script>
  $(document).ready(function() {
      // Sembunyikan alert validasi kosong
      $("#kosong").hide();
  });
</script>

    <!-- JS Upload Gambar -->
<script type="text/javascript">
  var loadFile = function(event){
    var output = document.getElementById('output');
    output.src=URL.createObjectURL(event.target.files[0]);
  }
</script>
<!-- /JS Upload Gambar -->

<!-- Live Search -->
<script type="text/javascript">
  $(document).ready(function(){
    load_data();
    function load_data(search){
      $.ajax({
        url:"view/get_data/get_data.php",
        method:"POST",
        data: {
          search: search
        },
        success:function(data){
          $('#hasil').html(data);
        }
      });
    }
    $('#search').keyup(function(){
      var search = $("#search").val();
      load_data(search);
    });
  });
  </script>
</body>
</html>