<?php
//memanggil fille koneksi
include 'koneksi.php';
include 'auto-kode.php';
$id = $_GET['id'];
$id_trx = $_GET['id_trx'];
$data = mysqli_query($koneksi, "SELECT * FROM jual WHERE jual.id_jual='$id'");
$user_data = mysqli_fetch_array($data);
$jumlah = $user_data['jml_jual'];
$id_stk = $user_data['id_stk'];
$id_trx = $user_data['id_trx'];
$id_user = $user_data['id_user'];
$query = mysqli_query($koneksi, "INSERT INTO  retrun  VALUES(' ','$id_trx','$id_stk','$jumlah','$id_user')");
if ($query) {
    # credirect ke page index

    $data = mysqli_query($koneksi, "SELECT jual.id_jual,retrun.id_retrun,retrun.jml_jual,retrun.id_stk,stok.stok,SUM(retrun.jml_jual + stok.stok) as retrun FROM stok INNER JOIN retrun ON retrun.id_stk=stok.id_stk JOIN jual ON jual.id_stk=stok.id_stk WHERE jual.id_jual='$id' GROUP BY retrun.id_retrun");
    $row = mysqli_fetch_array($data);
    $id_stok = $row['id_stk'];
    $jml_rt = $row['retrun'];
    $update = mysqli_query($koneksi, "UPDATE stok SET stok='$jml_rt' WHERE id_stk='$id_stok'");
    $query = mysqli_query($koneksi, "DELETE FROM jual WHERE jual.id_jual='$id'");
    header("location:edit-trx.php?id=$id_trx");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
