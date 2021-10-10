<?php 
//memanggil fille koneksi
include 'koneksi.php';

$id=$_GET['id'];

$query=mysqli_query($koneksi, "DELETE FROM stk_ikn WHERE id_ikan='$id'");
if ($query) {
 # credirect ke page index
 header("location:ikan.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
} 
?>