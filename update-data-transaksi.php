<?php
include 'koneksi.php';

$id = $_GET['id'];
$id_trx = $_POST['kode'];
$total = $_POST['total'];
$bayar = $_POST['bayar'];
$jml_total = $_POST['jml_total'];
$kembali = $_POST['balik'];
$jml_jenis = $_POST['jml'];

$sql = mysqli_query($koneksi, "UPDATE transaksi SET jml_total='$jml_total',total='$total',bayar='$bayar',kembalian='$kembali',jml_jenis='$jml_jenis' WHERE id_trx='$id_trx'");
if ($sql) {
    header("location:retrun.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
