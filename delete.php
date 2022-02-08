<?php
include 'koneksi.php';
$id = $_GET['id'];
if (isset($_GET['jual'])) {
    $query = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_trx='$id'");
    if ($query) {
        # credirect ke page index
        header("location:retrun.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}
