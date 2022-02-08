<?php

//koneksi database 
include 'koneksi.php';
//menambah sebuah data 
$id = $_GET['id'];
$jenis = $_GET['jenis'];
$nama_stok = $_GET['nama_stok'];
$harga_beli = $_GET['harga_beli'];
$harga_jual = $_GET['harga_jual'];
$stok = $_GET['stok'];
$satuan = $_GET['satuan'];
$tanggal_input = $_GET['tanggal_input'];

//menginput data ke database 
$query = mysqli_query($koneksi, "UPDATE  stok SET id_jenis='$jenis',id_satuan='$satuan'  ,nama_stk='$nama_stok'  ,hrg_beli='$harga_beli' ,hrg_jual='$harga_jual' ,stok='$stok' ,tgl_input_stok='$tanggal_input' WHERE id_stk='$id' ");
if ($query) {
    # credirect ke page index
    header("location:stok.php");
} else {
    echo "ERROR, data gagal diupdate", mysqli_error($koneksi);
}
