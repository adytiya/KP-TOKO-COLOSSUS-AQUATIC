<?php 

//koneksi database 
include 'koneksi.php';
//menambah sebuah data 
$id=$_GET['id'];

$nama_ikan=$_GET['nama_ikan'];
$harga_beli=$_GET['harga_beli'];
$harga_jual=$_GET['harga_jual'];
$stok=$_GET['stok'];
$tanggal_input=$_GET['tanggal_input'];

//menginput data ke database 
$query=mysqli_query($koneksi,"UPDATE  stk_ikn SET  nama_ikan='$nama_ikan'  ,harga_beli='$harga_beli' ,harga_jual='$harga_jual' ,stok='$stok' ,tanggal_input='$tanggal_input' WHERE id_ikan='$id' ");
if ($query) {
 # credirect ke page index
 header("location:ikan.php"); 
}
else{
 echo "ERROR, data gagal diupdate", mysqli_error($koneksi);
}
