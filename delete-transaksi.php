<?php
//memanggil fille koneksi
include 'koneksi.php';
$sql = "DELETE FROM jual";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    # credirect ke page index

    header("location:Transaksi.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
