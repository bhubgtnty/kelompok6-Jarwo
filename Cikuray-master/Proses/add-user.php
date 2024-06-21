<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../assets/plugins/sweet-alert2/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	<script src="../assets/plugins/sweet-alert2/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="../assets/plugins/sweet-alert2/dist/sweetalert2.min.css">
</head>

<body>
	<?php
	include '../koneksi.php';

	date_default_timezone_set('Asia/Jakarta');

	$nama_lengkap = $_POST['nama_lengkap'];
	$username = mysqli_escape_string($conn, $_POST['username']);
	$password = mysqli_escape_string($conn, $_POST['password']);
	$password_confirmation = mysqli_escape_string($conn, $_POST['password_confirmation']);
	$no_hp = $_POST['no_hp'];
	$created = date("Y-m-d H:i:s");
	$modified = date("Y-m-d H:i:s");
	$status = '0';

	if (empty($nama_lengkap) || empty($username) || empty($password) || empty($password_confirmation) || empty($no_hp)) {
		echo "<script>
	    Swal.fire({
	        allowEnterKey: false,
	        allowOutsideClick: false,
	        icon: 'error',
	        title: 'Peringatan',
	        text: 'Semua field harus diisi'
	    }).then(function() {
	        window.location.href='../halaman-daftar';
	    });
	    </script>";
		exit();
	}

	$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'"));
	$cek2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_user WHERE no_hp = '$no_hp' AND status = '1'"));

	$password_acak = password_hash($password_confirmation, PASSWORD_DEFAULT);

	if ($cek > 0) {
		echo "<script>
	    Swal.fire({
	        allowEnterKey: false,
	        allowOutsideClick: false,
	        icon: 'error',
	        title: 'Peringatan',
	        text: 'Nama Pengguna sudah digunakan'
	    }).then(function() {
	        window.location.href='../halaman-daftar';
	    });
	    </script>";
	} else if ($cek2 > 0) {
		echo "<script>
	    Swal.fire({
	        allowEnterKey: false,
	        allowOutsideClick: false,
	        icon: 'error',
	        title: 'Peringatan',
	        text: 'Nomor Telepon sudah digunakan'
	    }).then(function() {
	        window.location.href='../halaman-daftar';
	    });
	    </script>";
	} else if ($password != $password_confirmation) {
		echo "<script>
	    Swal.fire({
	        allowEnterKey: false,
	        allowOutsideClick: false,
	        icon: 'error',
	        title: 'Peringatan',
	        text: 'Kata Sandi yang Anda masukkan tidak cocok'
	    }).then(function() {
	        window.location.href='../halaman-daftar';
	    });
	    </script>";
	} else {
		$query = "INSERT INTO tb_user(nama_lengkap, username, password, no_hp, created, modified, status) VALUES ('$nama_lengkap', '$username', '$password_acak', '$no_hp', '$created', '$modified', '$status')";
		$exe = mysqli_query($conn, $query);
		if ($exe) {
			echo "<script>
	        Swal.fire({
	            allowEnterKey: false,
	            allowOutsideClick: false,
	            icon: 'success',
	            title: 'Pemberitahuan',
	            text: 'Pendaftaran berhasil. Silakan verifikasi akun Anda.'
	        }).then(function() {
	            window.location.href='../halaman-masuk';
	        });
	        </script>";
		} else {
			echo "<script>
	        Swal.fire({
	            allowEnterKey: false,
	            allowOutsideClick: false,
	            icon: 'error',
	            title: 'Peringatan',
	            text: 'Gagal melakukan pendaftaran'
	        }).then(function() {
	            window.location.href='../halaman-daftar';
	        });
	        </script>";
		}
	}
	?>
</body>

</html>