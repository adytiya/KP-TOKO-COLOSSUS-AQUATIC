<?php
//memanggil fille koneksi
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM stok WHERE id_stok='$id'");
if ($query) {
    # credirect ke page index
    header("location:stok.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
