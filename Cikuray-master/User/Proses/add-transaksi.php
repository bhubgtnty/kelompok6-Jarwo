<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../../assets/plugins/sweet-alert2/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	<script src="../../assets/plugins/sweet-alert2/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="../../assets/plugins/sweet-alert2/dist/sweetalert2.min.css">
</head>

<body>
	<?php
	include '../../koneksi.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id_user = $_POST['id_user'];
		$id_jalur = $_POST['id_jalur'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$email = $_POST['email'];
		$no_hp = $_POST['no_hp'];
		$nama_jalur = $_POST['nama_jalur'];
		$harga = $_POST['harga'];
		$jumlah_pesan = $_POST['jumlah_pesan'];
		$total_harga = $_POST['total_harga'];

		// Generate a unique transaction code
		$kode_transaksi = uniqid('TRX-');

		// Insert transaction into the database
		$query = "INSERT INTO tb_transaksi (kode, id_user, id_jalur, jumlah_pesan, total_harga, status, created) VALUES ('$kode_transaksi', '$id_user', '$id_jalur', '$jumlah_pesan', '$total_harga', '0', NOW())";
		
		if (mysqli_query($conn, $query)) {
			// Redirect to the page that displays the transaction code
			header("Location: ../show-kode.php?kode=$kode_transaksi");
			exit();
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
		
		// Kurangi stok di tabel tb_jalur
		$query_update_stok = "UPDATE tb_jalur SET stok = stok - $jumlah_pesan WHERE id_jalur = '$id_jalur'";
		if (mysqli_query($conn, $query_update_stok)) {
			echo "Stok berhasil diperbarui setelah pembelian.";
			// Redirect atau tampilkan pesan sukses sesuai kebutuhan Anda
		} else {
			echo "Error updating stok: " . mysqli_error($conn);
		}
	}
	?>

</body>

</html>