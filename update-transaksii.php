<?php
//memanggil fille koneksi
include 'koneksi.php';
$id_jual = $_POST['id_jual'];
$id_trx = $_POST['id_trx'];
$sql = "SELECT jual.id_jual,jual.id_stk,stok.stok,jual.jml_jual, SUM(jual.jml_jual*stok.hrg_jual) as hasil FROM jual INNER JOIN stok on stok.id_stk=jual.id_stk WHERE jual.id_jual='$id_jual'GROUP BY jual.id_jual";
$sql8 = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($sql8);
$hasil = $row['hasil'];
$jmlh_stok = $row['stok'];
$jmlh_sblm = $row['jml_jual'];
$jumlah = $_POST['jml_jual'];
$jml = $jmlh_sblm - $jumlah;

if ($jmlh_stok < $jumlah) {
?>
    <script type="text/javascript">
        alert("stok barang menipis/habis silakan cek stok barang");
        window.location.href = "edit-trx.php?id='$id_trx'"
    </script>
<?php
}
if ($jmlh_sblm < $jumlah) {
?>
    <script type="text/javascript">
        alert("jumlah barang tidak boleh lebih besar dari jumlmah sebelumnya  ");
        window.location.href = "edit-trx.php?id=<?= $id_trx ?>"
    </script>
<?php
}
if ($jmlh_sblm = $jumlah) {
    $query = mysqli_query($koneksi, "UPDATE  jual SET jml_jual='$jumlah'  WHERE id_jual='$id_jual' ");
    header("location:edit-trx.php?id=$id_trx");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
if ($jmlh_sblm > $jumlah) {
    $query = mysqli_query($koneksi, "UPDATE  jual SET jml_jual='$jumlah'  WHERE id_jual='$id_jual' ");
    $data = mysqli_query($koneksi, "SELECT * FROM jual WHERE jual.id_jual='$id_jual'");
    $user_data = mysqli_fetch_array($data);
    $id_stk = $user_data['id_stk'];
    $id_trx = $user_data['id_trx'];
    $id_user = $user_data['id_user'];
    $query = mysqli_query($koneksi, "INSERT INTO  retrun  VALUES(' ','$id_trx','$id_stk','$jml','$id_user')");
    if ($query) {
        # credirect ke page index

        $data = mysqli_query($koneksi, "SELECT jual.id_jual,retrun.id_retrun,retrun.jml_jual,retrun.id_stk,stok.stok,SUM(retrun.jml_jual + stok.stok) as retrun FROM stok INNER JOIN retrun ON retrun.id_stk=stok.id_stk JOIN jual ON jual.id_stk=stok.id_stk WHERE jual.id_jual='$id' GROUP BY retrun.id_retrun");
        $row = mysqli_fetch_array($data);
        $id_stok = $row['id_stk'];
        $jml_rt = $row['retrun'];
        $update = mysqli_query($koneksi, "UPDATE stok SET stok='$jml_rt' WHERE id_stk='$id_stok'");

        header("location:edit-trx.php?id=$id_trx");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}
