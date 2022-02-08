<?php 
// mengaktifkan session php
session_start();
// menghubungkan dengan koneksi
include '../../koneksi.php';
 
// menangkap data yang dikirim dari form

$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data user dengan username dan password yang sesuai
$test="SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi,$test);
$cek = mysqli_num_rows($result);
if($cek > 0){
	$sesi = mysqli_query($koneksi, $test);
	$sesi = mysqli_fetch_assoc($sesi);
	$_SESSION['id'] = $sesi['id_user'];
	$_SESSION['nama_user'] = $sesi['nama_user'];
	$_SESSION['level'] = $sesi['level'];
	$_SESSION['status'] = 'login';
	echo '<script>alert("Login Sukses");window.location="../../index.php"</script>';
}	else{
	echo '<script>alert("Login Gagal");window.location="../../login.php"</script>';
}


	


 
	


