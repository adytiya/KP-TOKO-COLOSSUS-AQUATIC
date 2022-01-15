<?php

//koneksi database 
include 'koneksi.php';
//menambah sebuah data 
$id = $_GET['id'];

$password = $_GET['password'];


//menginput data ke database 
$query = mysqli_query($koneksi, "UPDATE  user SET  pass='$password'    WHERE id_user='$id' ");
if ($query) {
    # credirect ke page index
    header("location:login.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
