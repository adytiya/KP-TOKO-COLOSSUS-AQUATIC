<?php 
//memanggil fille koneksi
include 'koneksi.php';

$id=$_GET['id'];

$query=mysqli_query($koneksi, "DELETE FROM jual WHERE id_jual='$id'");
if ($query) {
 # credirect ke page index
 header("location:Transaksi.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
} 
?>