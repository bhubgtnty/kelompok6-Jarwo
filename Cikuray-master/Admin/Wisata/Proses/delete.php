<?php
include '../../../koneksi.php';

$id_jalur = $_POST['id_jalur'];
$query = "DELETE FROM tb_jalur WHERE id_jalur = '$id_jalur'";
$exe = mysqli_query($conn, $query);
?>