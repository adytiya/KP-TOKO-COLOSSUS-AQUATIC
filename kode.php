<?php
//kode yang bertambah secara otomatis 
include 'koneksi.php';
$code = "SELECT MAX(jual.id_trx) AS maxid FROM jual INNER JOIN transaksi ON transaksi.id_trx=jual.id_trx";
$sql = mysqli_query($koneksi, $code);
$data = mysqli_fetch_array($sql);
