<?php

//koneksi database 
include 'koneksi.php';
//menambah sebuah data 
$id = $_POST['id_stok'];
$jenis = $_POST['jenis_stok'];
$nama_stok = $_POST['nama_stok'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];
$satuan = $_POST['satuan'];
$tanggal_input = $_POST['tanggal_input'];

//menginput data ke database 
$query = mysqli_query($koneksi, "INSERT INTO  stok VALUES ('$id','$jenis','$nama_stok','$harga_beli','$harga_jual','$stok','$satuan','$tanggal_input')");
if ($query) {
    # credirect ke page index
    header("location:stok.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
