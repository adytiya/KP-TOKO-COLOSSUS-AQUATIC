<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {

    $data = $_POST['cari'];
    $sql = "SELECT*FROM stk_ikn WHERE nama_ikan='$data'";
    $result = $koneksi->query($sql);
    $row = $result->fetch_assoc();

    $tanggal = date("j F Y, G:i");
    $sisa = $row['stok'];
    $nama = $row['nama_ikan'];
    $id = $row['id_ikan'];
    $jumlah = 1;
    $total = $row['harga_jual'];

    if ($sisa == 0) {
?>
        <script type="text/javascript">
            alert("stok barang habis tidak bisa melakukan transaksi");
            window.location.href = "Transaksi.php"
        </script>
<?php
    }

    if ($sisa > 0) {
        $input = "INSERT INTO  jual  VALUES(' ','$id','$nama','$jumlah','$total','$tanggal')";
        $test = $koneksi->query($input);
        # credirect ke page index
        header("location:Transaksi.php");
    }
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
