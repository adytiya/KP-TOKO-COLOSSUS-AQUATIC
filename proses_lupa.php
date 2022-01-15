<?php
// mengaktifkan session php
session_start();
// menghubungkan dengan koneksi
require 'koneksi.php';
// menangkap data yang dikirim dari form
$username = $_POST['username'];
// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' ");

if ($result) {
    header('location:ubah_password.php?username=' . $username);
} else {
    header('location:login.php?pesan=login_gagal');
}
