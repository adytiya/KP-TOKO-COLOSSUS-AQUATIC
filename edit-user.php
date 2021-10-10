<?php 

//koneksi database 
include 'koneksi.php';
//menambah sebuah data 
$id=$_GET['id'];
$nama=$_GET['nama'];
$username=$_GET['username'];
$password=$_GET['password'];
$level=$_GET['level'];

//menginput data ke database 
$query=mysqli_query($koneksi,"UPDATE  user SET nama='$nama' ,username='$username' ,pass='$password' ,level='$level'  WHERE id_user='$id' ");
if ($query) {
 # credirect ke page index
 header("location:user.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

 ?>