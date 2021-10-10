<?php 
date_default_timezone_set("asia/jakarta");
$koneksi = mysqli_connect("localhost","root","","db_toko_ikan");

//cek koneksi
if (mysqli_connect_errno()){
	echo "koneksi database gagal:".mysqli_connect_errno();
}
