<?php 

//koneksi database 
include 'koneksi.php';
//menambah sebuah data 
$id=$_POST['id'];
$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];
$level=$_POST['level'];

//menginput data ke database 
$query=mysqli_query($koneksi,"INSERT INTO user VALUES ('$id','$nama','$username','$password','$level')");
if ($query) {
 # credirect ke page index
 header("location:user.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

 ?>