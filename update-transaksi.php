<?php
//memanggil fille koneksi
include 'koneksi.php';
$id_stok = $_POST['id_stok'];
$sql = "SELECT jual.id_stk,stok.stok,jual.jml_jual, SUM(jual.jml_jual*stok.hrg_jual) as hasil FROM jual INNER JOIN stok on stok.id_stk=jual.id_stk WHERE jual.id_stk='$id_stok' GROUP BY stok.id_stk";
$sql8 = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($sql8);
$hasil = $row['hasil'];
$jmlh_stok = $row['stok'];
$jumlah = $_POST['jml_jual'];
$id_jual = $_POST['id_jual'];
if ($jmlh_stok < $jumlah) {
?>
    <script type="text/javascript">
        alert("stok barang menipis/habis silakan cek stok barang");
        window.location.href = "Transaksi.php"
    </script>
<?php
}
if ($jmlh_stok > $jumlah) {
    # credirect ke page index
    $query = mysqli_query($koneksi, "UPDATE  jual SET jml_jual='$jumlah'  WHERE id_jual='$id_jual' ");
    header("location:Transaksi.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
