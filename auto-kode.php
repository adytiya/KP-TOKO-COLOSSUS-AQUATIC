<?php
//kode yang bertambah secara otomatis 
include 'koneksi.php';
$code = "SELECT MAX(id_trx) AS maxid FROM transaksi";
$sql = mysqli_query($koneksi, $code);
$data = mysqli_fetch_array($sql);
$kode = $data['maxid'];
$no = (int) substr($kode, 3, 3);
$no++;
$ket = "TRX";
$kodeauto = $ket . sprintf("%03s", $no);
