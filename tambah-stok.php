<?php 

//koneksi database 
include 'koneksi.php';
//menambah sebuah data 
$id=$_POST['id'];
$nama_ikan=$_POST['nama_ikan'];

$harga_beli=$_POST['harga_beli'];
$harga_jual=$_POST['harga_jual'];
$stok=$_POST['stok'];
$tanggal_input=$_POST['tanggal_input'];

//menginput data ke database 
$query=mysqli_query($koneksi,"INSERT INTO  stk_ikn VALUES ('$id','$nama_ikan','$harga_beli','$harga_jual','$stok','$tanggal_input')");
if ($query) {
 # credirect ke page index
 header("location:ikan.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

 ?>