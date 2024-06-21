<?php
include '../koneksi.php';
$id = $_GET['id'];
$id_user = $_COOKIE['version'];

$query = "SELECT * FROM tb_jalur WHERE id_jalur = '$id'";
$exe = mysqli_query($conn, $query);
$row = mysqli_fetch_array($exe);

$query3 = "SELECT * FROM tb_user WHERE id_user = '$id_user'";
$exe3 = mysqli_query($conn, $query3);
$row3 = mysqli_fetch_array($exe3);
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
                        <a href="detail-layanan?id=<?php echo $row['id_jalur'];?>">Detail Layanan</a>
                    </div>
                    <h2>Detail Layanan</h2>
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
                            <img class="img-fluid" src="../assets/images/gunung/<?php echo $row['gambar'];?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portfolio_right_text">
                            <h4><?php echo $row['nama_jalur'];?></h4>
                            <p><?php echo $row['ket_singkat'];?></p>
                            <ul class="list">
                                <li><span>Alamat</span>:  <?php echo $row['alamat'];?></li>
                                <li><span>Harga</span>:  <?php echo number_format($row['harga']);?></li>
                                <li><span>Kuota</span>:  <?php echo $row['stok'];?></li>
                                    </p>
                                </li>
                            </ul>
                            <a class="genric-btn info circle" href="booking-wisata?id=<?php echo $row['id_jalur'];?>">Pesan</a>
                        </div>
                    </div>
                </div>
                <p><?php echo $row['ket_lengkap'];?></p>
            </div>
        </div>
    </section>

    <section class="text_members_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Testimoni</h2>
            </div>
            <div class="member_slider owl-carousel">
                <?php
                $query2  = mysqli_query($conn, "SELECT t.isi, t.pekerjaan, u.nama_lengkap FROM tb_testimoni t INNER JOIN tb_user u ON t.id_user = u.id_user WHERE t.id_jalur = '$id'");
                while($row2 = mysqli_fetch_array($query2)) {
                    ?>
                    <div class="item">
                        <div class="member_item">
                            <p><?php echo $row2['isi'];?></p>
                            <h4><?php echo $row2['nama_lengkap'];?></h4>
                            <h5><?php echo $row2['pekerjaan'];?></h5>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="comment-form">
                <h4>Testimoni pada <?php echo $row['nama_jalur'];?></h4>
                <form action="Proses/add-testimoni.php" method="POST">
                    <div class="form-group form-inline">
                        <div class="form-group col-lg-6 col-md-6 name">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $row3['nama_lengkap'];?>" placeholder="Masukkan Nama Lengkap" readonly="">
                            <input type="hidden" name="id_user" id="id_user" value="<?php echo $id_user;?>">
                            <input type="hidden" name="id_jalur" id="id_jalur" value="<?php echo $id;?>">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 email">
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan" required="" autocomplete="off">
                        </div>                    
                    </div>
                    <div class="form-group">
                        <textarea class="form-control mb-10" rows="5" id="isi" name="isi" maxlength="148" placeholder="Tuliskan isi testimoni" required=""></textarea>
                    </div>
                    <input type="submit" name="submit" id="submit" value="Kirim Testimoni" class="primary-btn submit_btn"> 
                </form>
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
</body>
</html>