<?php
// mengaktifkan session php
session_start();
// menghubungkan dengan koneksi
require 'koneksi.php';

// menangkap data yang dikirim dari form

$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND pass='$password'");
$cek = mysqli_num_rows($result);
if ($cek > 0) {
	$sesi = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND pass='$password'");
	$sesi = mysqli_fetch_assoc($sesi);
	$_SESSION['id'] = $sesi['id_user'];
	$_SESSION['nama'] = $sesi['nama'];
	$_SESSION['level'] = $sesi['level'];
	$_SESSION['status'] = 'login';
	header('location:index.php');
} else {
	header('location:login.php?pesan=login_gagal');
}
