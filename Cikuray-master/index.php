<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/images/fav.png" type="image/png">
    <title>Taman Nasional Gunung Cikuray</title>
    <link rel="stylesheet" href="assets/dist-2/css/bootstrap.css">
    <link rel="stylesheet" href="assets/dist-2/vendors/linericon/style.css">
    <link rel="stylesheet" href="assets/dist-2/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/dist-2/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/dist-2/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="assets/dist-2/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="assets/dist-2/vendors/animate-css/animate.css">
    <link rel="stylesheet" href="assets/dist-2/css/style.css">
    <link rel="stylesheet" href="assets/dist-2/css/responsive.css">
    <style type="text/css">
        .home_banner_area .banner_inner .overlay {
            background: url('assets/images/Cikuray-14.jpg') no-repeat scroll center center;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 121%;
            bottom: 0;
            z-index: -1;
        }      
    </style>
</head>
<body>

    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <a class="navbar-brand logo_h" href="index"><img src="assets/images/logo.jpg" alt="" style="width: 90px;"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="index">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link" href="halaman-masuk">Masuk</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li>
                        </ul>
                    </div> 
                </div>
            </nav>
        </div>
    </header>

    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h3>Tiket Pemesanan<br>Pendakian Gunung Cikuray</h3>
                    <h5>Jangan Ambil Apapun Selain Gambar</h5>
                    <h5>Jangan Bunuh Apapun Selain Waktu</h5>
                    <h5>Jangan Tinggalkan Apapun Selain Jejak</h5>
                    <a class="org_btn" href="halaman-masuk">Masuk</a>
                    <a class="green_btn" href="halaman-daftar">Daftar</a>
                </div>
            </div>
        </div>
    </section>

    <section class="home_gallery_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Daftar Jalur Pendakian Gunung Cikuray.</h2>
                <p>Jika ingin memesan maka Anda harus login terlebih dahulu.</p>
            </div>
            <div class="isotope_fillter">
                <ul class="gallery_filter list">
                    <li class="active" data-filter="*"><a href="#">Semua Jalur</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="gallery_f_inner row imageGallery1">
                <?php
                $query = mysqli_query($conn, "SELECT w.nama_jalur, w.id_jalur, w.gambar, k.nama_kategori FROM tb_jalur w INNER JOIN tb_kategori k ON w.id_kategori = k.id_kategori ORDER BY w.nama_jalur ASC");
                while($row = mysqli_fetch_array($query)) { ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 <?php echo $row['nama_kategori'];?>">
                        <div class="h_gallery_item">
                            <div class="g_img_item">
                                <img class="img-fluid" src="assets/images/gunung/<?php echo $row['gambar'];?>" alt="">
                                <a class="light" href="assets/images/gunung/<?php echo $row['gambar'];?>"><img src="assets/dist-2/img/gallery/icon.png" alt=""></a>
                            </div>
                            <div class="g_item_text">
                                <h4><?php echo $row['nama_jalur'];?></h4>
                                <p><?php echo $row['nama_kategori'];?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <script src="assets/dist-2/js/jquery-3.2.1.min.js"></script>
    <script src="assets/dist-2/js/popper.js"></script>
    <script src="assets/dist-2/js/bootstrap.min.js"></script>
    <script src="assets/dist-2/js/stellar.js"></script>
    <script src="assets/dist-2/vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="assets/dist-2/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="assets/dist-2/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="assets/dist-2/vendors/isotope/isotope-min.js"></script>
    <script src="assets/dist-2/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/dist-2/js/jquery.ajaxchimp.min.js"></script>
    <script src="assets/dist-2/vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/dist-2/vendors/counter-up/jquery.counterup.js"></script>
    <script src="assets/dist-2/js/mail-script.js"></script>
    <script src="assets/dist-2/js/theme.js"></script>
</body>
</html>