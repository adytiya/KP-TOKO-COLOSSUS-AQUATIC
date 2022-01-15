<?php
//memanggil fille koneksi
include 'koneksi.php';
$stok = $_POST['id_stok'];
$sql = "SELECT*FROM stok WHERE id_stok='$stok'";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();
$total = $row['harga_jual'];
$id = $_POST['id_jual'];
$jumlah = $_POST['jumlah'];
$jmlh_stok = $row['stok'];
$hasil = $total * $jumlah;
if ($jmlh_stok <= $jumlah) {
?>
    <script type="text/javascript">
        alert("stok barang menipis/habis silakan cek stok barang");
        window.location.href = "Transaksi.php"
    </script>
<?php
}
if ($jmlh_stok > $jumlah) {
    # credirect ke page index
    $query = mysqli_query($koneksi, "UPDATE  jual SET jumlah='$jumlah' ,total='$hasil'  WHERE id_jual='$id' ");
    header("location:Transaksi.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
