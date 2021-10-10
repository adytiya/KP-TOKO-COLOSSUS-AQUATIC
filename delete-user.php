<?php 
//memanggil fille koneksi
include 'koneksi.php';

$id = $_GET['id'];
$sql="DELETE FROM user WHERE  id_user=$id"; 
$query=mysqli_query($koneksi, $sql );
if ($query) {
# credirect ke page index
header("location:user.php"); 
}else{
echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}
