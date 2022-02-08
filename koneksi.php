<?php
date_default_timezone_set("asia/jakarta");
$koneksi = mysqli_connect("localhost", "root", "", "db_toko_collosus") or die("Query error : " . mysqli_error($koneksi));;

//cek koneksi
if (mysqli_connect_errno()) {
	echo "koneksi database gagal:" . mysqli_connect_errno();
}
