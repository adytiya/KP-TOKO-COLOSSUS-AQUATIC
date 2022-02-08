<?php
//memanggil fille koneksi
include 'koneksi.php';

$id = $_GET['id_trx'];

$query = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_trx='$id'");
if ($query) {
    $delete = "DELETE FROM jual WHERE id_trx='$id'";
    $test = mysqli_query($koneksi, $delete);
    header("location:retrun.php?");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
