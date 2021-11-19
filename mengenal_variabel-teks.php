<?php
//mengenalkan variabel teks
$sqlperiode = "";
$awaltgl = "";
$akhirtgl = "";
$tglawal = "";
$tglakhir = "";

if (isset($_POST['btntampilkan'])) {
    $tglawal = isset($_POST['txttglawal']) ? $_POST['txttglawal'] : "01-" . date('m-Y');
    $tglakhir = isset($_POST['txttglakhir']) ? $_POST['txttglakhir'] : date('d-m-Y');
    $sqlperiode = "WHERE tanggal BETWEEN '" . $tglawal . "' AND '" . $tglakhir . "' ";
    $SQL = "SELECT * FROM transaksi $sqlperiode";
    $data = mysqli_query($koneksi, $SQL);
    echo $data;
} else {
    $tglawal = "01-" . date('m-Y');
    $tglakhir = date('d-m-Y');
    $sqlperiode = "WHERE tanggal BETWEEN '" . $tglawal . "' AND '" . $tglakhir . "' ";
}
