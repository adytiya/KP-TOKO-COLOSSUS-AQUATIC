<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {

    $data = $_POST['cari'];
    $sql = "SELECT*FROM stok WHERE nama_stok='$data'";
    $result = $koneksi->query($sql);
    $row = $result->fetch_assoc();
    $tanggal = date("Y-m-d");
    $sisa = $row['stok'];
    $jenis = $row['jenis'];
    $nama = $row['nama_stok'];
    $id = $row['id_stok'];
    $jumlah = 1;
    $satuan = $row['satuan'];
    $total = $row['harga_jual'];
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

    if ($sisa > 0) {
        $input = "INSERT INTO  jual  VALUES(' ','$id','$jenis','$nama','$jumlah','$satuan','$total','$tanggal')";
        $test = $koneksi->query($input);
        # credirect ke page index
        header("location:Transaksi.php");
    }
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
