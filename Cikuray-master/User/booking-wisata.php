<?php
include '../koneksi.php';
$id = $_GET['id'];
$id_user = $_COOKIE['version'];

$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user = '$id_user'");
$row = mysqli_fetch_array($query);

$query2 = mysqli_query($conn, "SELECT * FROM tb_jalur WHERE id_jalur = '$id'");
$row2 = mysqli_fetch_array($query2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../assets/images/logo.jpg" type="image/png">
    <title>Taman Nasional Gunung Cikuray</title>
    <link rel="stylesheet" href="../assets/dist-2/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/dist-2/vendors/linericon/style.css">
    <link rel="stylesheet" href="../assets/dist-2/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/dist-2/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/dist-2/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="../assets/dist-2/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="../assets/dist-2/vendors/animate-css/animate.css">
    <link rel="stylesheet" href="../assets/dist-2/css/style.css">
    <link rel="stylesheet" href="../assets/dist-2/css/responsive.css">
</head>
<body>
    <script type="text/javascript">
        var tampil = localStorage.getItem('id_user');
        var tampil2 = localStorage.getItem('username');
    </script>
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <a class="navbar-brand logo_h" href="index"><img src="../assets/images/logo.jpg" alt="" style="width: 90px;"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="index">Beranda</a></li>
                            <li class="nav-item active"><a class="nav-link" href="layanan">Layanan</a></li>
                            <li class="nav-item"><a class="nav-link" href="verifikasi">Verifikasi Pembayaran</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><script type="text/javascript">document.write(tampil2)</script></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="akun">Akun</a></li>
                                    <li class="nav-item"><a class="nav-link" href="../Proses/logout.php">Keluar</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li>
                        </ul>
                    </div> 
                </div>
            </nav>
        </div>
    </header>

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <div class="page_link">
                        <a href="index">Beranda</a>
                        <a href="layanan">Layanan</a>
                        <a href="detail-layanan?id=<?php echo $id;?>">Detail Layanan</a>
                        <a href="booking-wisata?id=<?php echo $id;?>">Pesan Tiket</a>
                    </div>
                    <h2>Pesan Tiket</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="portfolio_details_area p_120">
        <div class="container">
            <div class="portfolio_details_inner">
                <div class="row">
                    <div class="col-md-6">
                        <div class="left_img">
                            <img class="img-fluid" src="../assets/images/gunung/<?php echo $row2['gambar'];?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portfolio_right_text">
                            <h4><?php echo $row2['nama_jalur'];?></h4>
                            <p><?php echo $row2['ket_singkat'];?></p>
                            <form action="Proses/add-transaksi.php" method="POST">
                                <div class="perhitungan">
                                    <div class="mt-10">
                                        <input type="hidden" name="id_user" id="id_user" value="<?php echo $id_user;?>">
                                        <input type="hidden" id="id_jalur" name="id_jalur" value="<?php echo $id;?>">
                                        <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $row['nama_lengkap'];?>" readonly="" required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="email" id="email" name="email" placeholder="Alamat Email" value="<?php echo $row['email'];?>" readonly="" required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="number" id="no_hp" name="no_hp" placeholder="Nomor Telepon" value="<?php echo $row['no_hp'];?>" readonly="" required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="text" id="nama_jalur" name="nama_jalur" placeholder="Nama Wisata" value="<?php echo $row2['nama_jalur'];?>" readonly="" required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="number" id="harga" name="harga" placeholder="Harga" value="<?php echo $row2['harga'];?>" readonly="" required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="number" id="jumlah_pesan" name="jumlah_pesan" placeholder="Jumlah Pesan" min="1" max="<?php echo $row2['stok'];?>" required="" class="single-input" autocomplete="off">
                                    </div>
                                    <div class="mt-10">
                                        <input type="number" id="total_harga" name="total_harga" placeholder="Total Harga"  required class="single-input" autocomplete="off" readonly="">
                                    </div><br>
                                    <input type="submit" class="genric-btn info circle" name="submit" id="submit" value="Kirim">
                                </div>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>      

    <script src="../assets/dist-2/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/dist-2/js/popper.js"></script>
    <script src="../assets/dist-2/js/bootstrap.min.js"></script>
    <script src="../assets/dist-2/js/stellar.js"></script>
    <script src="../assets/dist-2/vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="../assets/dist-2/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="../assets/dist-2/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="../assets/dist-2/vendors/isotope/isotope-min.js"></script>
    <script src="../assets/dist-2/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="../assets/dist-2/js/jquery.ajaxchimp.min.js"></script>
    <script src="../assets/dist-2/vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="../assets/dist-2/vendors/counter-up/jquery.counterup.js"></script>
    <script src="../assets/dist-2/js/mail-script.js"></script>
    <script src="../assets/dist-2/js/theme.js"></script>
    <script type="text/javascript" language="javascript">
        $(".perhitungan").keyup(function() {
          var jumlah_pesan = parseInt($("#jumlah_pesan").val())
          var harga = parseInt($("#harga").val()) 

          var total_harga = harga * jumlah_pesan;
          $("#total_harga").attr("value",total_harga)   
      });
  </script>
</body>
</html>