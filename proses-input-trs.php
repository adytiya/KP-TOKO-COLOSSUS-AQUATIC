<?php
include 'cek-sesi.php';
include 'koneksi.php';
if (isset($_POST['reset'])) {
    $sql = "DELETE FROM jual";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        header("location:Transaksi.php");
    }
}
if (isset($_POST['input'])) {
    $bayar = $_POST['bayar'];
    $total = $_POST['total'];
    if ($total == 0) {
?>
        <script type="text/javascript">
            alert("silahkan melakukan transaksi");
            window.location.href = "Transaksi.php"
        </script>
    <?php
    }
    if (!empty($bayar)) {
    ?>
        <script type="text/javascript">
            alert("Pembayaran kurang / kosong silahkan cek kembali");
            window.location.href = "Transaksi.php"
        </script>
    <?php
    }
    if ($bayar < $total) {
    ?>
        <script type="text/javascript">
            alert("Pembayaran kurang / kosong silahkan cek kembali ");
            window.location.href = "Transaksi.php"
        </script>
    <?php
    }
    if ($bayar == 0) {
    ?>
        <script type="text/javascript">
            alert("Pembayaran kurang / kosong silahkan cek kembali ");
            window.location.href = "Transaksi.php"
        </script>
<?php
    }
    if ($bayar > $total) {

        $id_trx = $_POST['kode'];
        $total = $_POST['total'];
        $bayar = $_POST['bayar'];
        $jumlah = $_POST['jumlah'];
        $tanggal = date("Y-m-d");
        $kembali = $_POST['balik'];
        $nama = $_SESSION['nama'];
        $id_stok = $_POST['id_stok'];
        $id_trs = $_POST['id_trs'];
        $jenis = $_POST['jenis_stok'];
        $nama_stok = $_POST['nama_stok'];
        $jum_brg = $_POST['jumlah_brg'];
        $satuan = $_POST['satuan'];
        $tot_brg = $_POST['total_brg'];
        $tgl = $_POST['tanggal'];
        $jml = $_POST['jml'];
        $admin = $_POST['admin'];
        for ($x = 0; $x < $_POST['jml']; $x++) {

            $sqli = "INSERT INTO nota VALUES ('','$id_trs[$x]','$id_stok[$x]','$jenis[$x]','$nama_stok[$x]','$jum_brg[$x]','$satuan[$x]','$tot_brg[$x]','$tgl[$x]','$admin[$x]')";
            $row = mysqli_query($koneksi, $sqli);
        }
        $sql = mysqli_query($koneksi, "INSERT INTO  transaksi  VALUES('$id_trx','$tanggal','$jumlah','$total','$bayar','$kembali','$nama','$jml')");
        if ($sql) {
            $delete = "DELETE FROM jual";
            $test = mysqli_query($koneksi, $delete);
            header("location:Transaksi.php");
        }
    }
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
