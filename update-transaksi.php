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
$hasil = $total * $jumlah;
$query = mysqli_query($koneksi, "UPDATE  jual SET jumlah='$jumlah' ,total='$hasil'  WHERE id_jual='$id' ");
if ($query) {
    # credirect ke page index
    header("location:Transaksi.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
