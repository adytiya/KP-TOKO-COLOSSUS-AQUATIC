<?php
include 'cek-sesi.php';
include 'koneksi.php';
include 'auto-kode.php';
if (isset($_POST['reset'])) {
    $sql = "DELETE FROM jual WHERE id_trx='$autokode'";
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

    if ($bayar < $total) {
    ?>
        <script type="text/javascript">
            alert("Pembayaran kurang / kosong silahkan cek kembali ");
            window.location.href = "Transaksi.php"
        </script>
    <?php
    }

    if ($bayar === 0) {
    ?>
        <script type="text/javascript">
            alert("Pembayaran kurang / kosong silahkan cek kembali ");
            window.location.href = "Transaksi.php"
        </script>
<?php
    }
    if ($bayar >= $total) {

        $id_trx = $_POST['kode'];
        $total = $_POST['total'];
        $bayar = $_POST['bayar'];
        $jumlah = $_POST['jumlah'];
        $tanggal = date("Y-m-d");
        $kembali = $_POST['balik'];
        $nama = $_SESSION['id'];
        $jml = $_POST['jml'];
        $sql = mysqli_query($koneksi, "INSERT INTO  transaksi  VALUES('$id_trx','$tanggal','$jumlah','$total','$bayar','$kembali','$jml','$nama')");
        if ($sql) {
            $id_stk = $_POST['id_stk'];
            $sisa = $_POST['sisa'];
            for ($x = 0; $x < $_POST['jml']; $x++) {
                $sqli = "UPDATE stok SET stok='$sisa[$x]' WHERE id_stk='$id_stk[$x]' ";
                $row = mysqli_query($koneksi, $sqli);
                header("location:Transaksi.php");
            }
        }
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}
