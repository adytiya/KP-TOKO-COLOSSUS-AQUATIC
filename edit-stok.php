<?php

//koneksi database 
include 'koneksi.php';
//menambah sebuah data 
$id = $_GET['id'];
$jenis = $_GET['jenis_stok'];
$nama_stok = $_GET['nama_stok'];
$harga_beli = $_GET['harga_beli'];
$harga_jual = $_GET['harga_jual'];
$stok = $_GET['stok'];
$satuan = $_GET['satuan'];
$tanggal_input = $_GET['tanggal_input'];

//menginput data ke database 
$query = mysqli_query($koneksi, "UPDATE  stok SET jenis='$jenis' ,nama_stok='$nama_stok'  ,harga_beli='$harga_beli' ,harga_jual='$harga_jual' ,stok='$stok' ,satuan='$satuan' ,tanggal_input='$tanggal_input' WHERE id_stok='$id' ");
if ($query) {
    # credirect ke page index
    header("location:stok.php");
} else {
    echo "ERROR, data gagal diupdate", mysqli_error($koneksi);
}
