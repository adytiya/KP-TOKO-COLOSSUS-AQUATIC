<?php
require 'cek-sesi.php';
include 'koneksi.php';
include 'auto-kode.php';
if (isset($_POST['tambah'])) {

    $data = $_POST['cari'];
    $sql = "SELECT*FROM stok WHERE nama_stk='$data'";
    $result = $koneksi->query($sql);
    $row = $result->fetch_assoc();
    $tanggal = date("Y-m-d");
    $sisa = $row['stok'];
    $jenis = $row['id_jenis'];
    $nama = $row['nama_stk'];
    $id = $row['id_stk'];
    $id_user = $_SESSION['id'];
    $jumlah = 1;
    $id_trx = $kodeauto;
    $satuan = $row['id_satuan'];
    $total = $row['hrg_jual'];
    if (!empty($data)) {
?>
        <script type="text/javascript">
            alert("data barang tidak ada");
            window.location.href = "Transaksi.php"
        </script>
    <?php
    }

    if ($sisa == 0) {
    ?>
        <script type="text/javascript">
            alert("stok barang habis tidak bisa melakukan transaksi");
            window.location.href = "Transaksi.php"
        </script>
    <?php
    }
    if ($sisa < $jumlah) {
    ?>
        <script type="text/javascript">
            alert("stok barang kurang dari jumlah yang di input tidak bisa melakukan transaksi");
            window.location.href = "Transaksi.php"
        </script>
<?php
    }

    if ($sisa > 0) {
        $input = "INSERT INTO  jual  VALUES(' ','$id','$jumlah','$tanggal','$id_user','$id_trx')";
        $test = $koneksi->query($input);
        # credirect ke page index
        header("location:Transaksi.php");
    }
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
