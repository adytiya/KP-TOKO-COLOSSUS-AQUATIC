<?php
include '././koneksi.php';

$code = "SELECT COUNT(id_jenis) as jenis FROM jenis";
$sql = mysqli_query($koneksi, $code);
$data = mysqli_fetch_array($sql);
$jenis = $data['jenis'];
?>