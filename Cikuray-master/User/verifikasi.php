<?php
include '../koneksi.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode'];

    // Check if the transaction with the given kode exists
    $check_query = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE kode = '$kode'");
    if (mysqli_num_rows($check_query) == 0) {
        $message = "Kode transaksi tidak ditemukan. Silakan cek kembali.";
    } else {
        // Define the upload directory
        $target_dir = 'C:/xampp/htdocs/Cikuray-master/assets/images/bukti/';
        $target_file = $target_dir . basename($_FILES["bukti"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if directory exists
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["bukti"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $message = "File yang diunggah bukan gambar.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["bukti"]["size"] > 500000000) {
            $message = "Maaf, ukuran file terlalu besar.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $message = "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $message = "Maaf, file Anda tidak berhasil diunggah.";
        } else {
            if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
                $bukti = basename($_FILES["bukti"]["name"]);

                // Update the transaction in the database with the payment proof
                $sql = "UPDATE tb_transaksi SET bukti='$bukti', status='1', modified=NOW() WHERE kode='$kode'";

                if (mysqli_query($conn, $sql)) {
                    $message = "File " . htmlspecialchars(basename($_FILES["bukti"]["name"])) . " berhasil diunggah dan transaksi berhasil diperbarui.";
                } else {
                    $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                $message = "Maaf, terjadi kesalahan saat mengunggah file Anda.";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pembayaran</title>
    <link rel="stylesheet" href="../assets/dist-2/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/dist-2/css/style.css">
    <style>
        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
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
                                <li class="nav-item"><a class="nav-link" href="layanan">Layanan</a></li>
                                <li class="nav-item active"><a class="nav-link" href="verifikasi">Verifikasi Pembayaran</a></li>
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
                        <a href="verifikasi">Verifikasi Pembayaran</a>
                    </div>
                    <h2>Verifikasi Pembayaran</h2>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <?php if ($message != ""): ?>
            <div class="message alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="verifikasi.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="kode">Kode Transaksi</label>
                <input type="text" class="form-control" id="kode" name="kode" required>
            </div>
            <div class="form-group">
                <label for="bukti">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" id="bukti" name="bukti" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

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
    <script src="../assets
    <script src="../assets/dist-2/js/theme.js"></script>
</body>
</html>
