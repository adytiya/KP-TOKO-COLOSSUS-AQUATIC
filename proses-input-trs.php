<?php
include 'cek-sesi.php';
include 'koneksi.php';
if (isset($_POST['input'])) {

    $id_trx = $_POST['kode'];
    $total = $_POST['total'];
    $bayar = $_POST['bayar'];
    $jumlah = $_POST['jumlah'];
    $tanggal = date("j F Y, G:i");
    $kembali = $_POST['balik'];
    $nama = $_SESSION['nama'];

    $id_ikan = $_POST['id_ikan'];
    $id_trs = $_POST['id_trs'];
    $nama_ikan = $_POST['nama_ikan'];
    $jum_brg = $_POST['jumlah_brg'];
    $tot_brg = $_POST['total_brg'];
    $tgl = $_POST['tanggal'];
    $jml = $_POST['jml'];
    $admin = $_POST['admin'];
    for ($x = 0; $x < $_POST['jml']; $x++) {

        $sqli = "INSERT INTO nota VALUES ('','$id_trs[$x]','$id_ikan[$x]','$nama_ikan[$x]','$jum_brg[$x]','$tot_brg[$x]','$tgl[$x]','$admin[$x]')";
        $row = mysqli_query($koneksi, $sqli);
    }
    $sql = mysqli_query($koneksi, "INSERT INTO  transaksi  VALUES('$id_trx','$tanggal','$jumlah','$total','$bayar','$kembali','$nama')");
    if ($sql) {

        $delete = "DELETE FROM jual";
        $test = mysqli_query($koneksi, $delete);
        header("location:Transaksi.php");
    }
}
if (isset($_POST['reset'])) {
    $sql = "DELETE FROM jual";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        header("location:Transaksi.php");
    }
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
