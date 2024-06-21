<?php
if(!isset($_COOKIE["version"])) {
  header("location:../../index");
}
include '../../koneksi.php';
$id_pengguna = $_GET['id'];
$query = "SELECT * FROM tb_user WHERE id_user = '$id_pengguna'";
$exe = mysqli_query($conn, $query);
$row = mysqli_fetch_array($exe);
$id_user = $_COOKIE["version"];

$query = "SELECT * FROM tb_admin WHERE id_admin = '$id_user'";
$exe = mysqli_query($conn, $query);
$data = mysqli_fetch_array($exe);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Taman Nasional Gunung Cikuray</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../../assets/images/fav.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="../../assets/plugins/sweet-alert2/dist/sweetalert2.all.min.js"></script>
  <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script src="../../assets/plugins/sweet-alert2dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="../../assets/plugins/sweet-alert2dist/sweetalert2.min.css"> 
</head>
<body class="hold-transition sidebar-mini">
  <script type="text/javascript">
    var tampil = localStorage.getItem('id_user');
    var tampil2 = localStorage.getItem('username');
  </script>
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../index" class="brand-link">
        <img src="../../assets/images/logo.jpg" alt="Peonpegu" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">Cikuray</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../assets/images/akun/<?php echo $data['gambar'];?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="../Akun/index" class="d-block"><script type="text/javascript">document.write(tampil2)</script></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Halaman Utama
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../index" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Beranda</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Menu</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Wisata/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jalur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Kategori/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Laporan/pendapatan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendapatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Laporan/aktivitas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aktivitas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Tambahan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Transaksi/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Testimoni/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Testimoni</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item">
            <a href="../../Proses/logout" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Keluar</p>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index">Beranda</a></li>
              <li class="breadcrumb-item active">Detail Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- form start -->
              <form role="form" action="Proses/update" method="POST" enctype="multipart/form-data" class="form-user">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required="" autocomplete="off" value="<?php echo $row['nama_lengkap'];?>">
                        <input type="hidden" name="id_user" id="id_user" value="<?php echo $row['id_user'];?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="username">Nama Pengguna</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Nama Pengguna" required="" pattern="[A-Za-z0-9]+" autocomplete="off" value="<?php echo $row['username'];?>"> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email" required="" autocomplete="off" value="<?php echo $row['email'];?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required="" value="<?php echo $row['tgl_lahir'];?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="no_hp">Nomor Telepon</label>
                        <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="Nomor Telepon" required="" autocomplete="off" value="<?php echo $row['no_hp'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" required="">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a class="btn btn-danger tombol-simpan" style="color: white; cursor: pointer;">Hapus</a>
                </div>
                <!-- /.card-body -->

              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../Assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../Assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../Assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../Assets/plugins/select2/js/select2.full.min.js"></script>
<script src="../../Assets/dist/js/demo.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
<script type="text/javascript">
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
<script type="text/javascript" language="javascript">
  $(document).ready(function(){
    $(".tombol-simpan").click(function(){
      var data = $('.form-user').serialize();
      Swal.fire({
        title: 'Apakah Anda yakin ?',
        text: 'Data yang Anda hapus tidak bisa di kembalikan lagi',
        icon: 'warning',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus saja!',
        cancelButtonText: 'Jangan'
      }).then((result) => {
        if (result.value) {
          let timerInterval
          Swal.fire({
            title: 'Proses penghapusan',
            html: 'Berakhir dalam waktu <b></b> detik.',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            timer: 3000,
            timerProgressBar: true,
            onBeforeOpen: () => {
              Swal.showLoading()
              timerInterval = setInterval(() => {
                Swal.getContent().querySelector('b')
                .textContent = Swal.getTimerLeft()
              }, 100)
            },
            onClose: () => {
              clearInterval(timerInterval)
            }
          }).then((result) => {
            $.ajax({
              type: 'POST',
              url: "Proses/delete",
              data: data,
              success: function() {
                window.location.href='index';
              }
            });
          });
        }
      });
    });
  });
</script>
</body>
</html>
