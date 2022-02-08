<?php
include 'koneksi.php';
include 'cek-sesi.php';
include 'kode.php';
?>
<html>


<head>
    <title>Colossus Aquatic</title>
</head>

<body onload="print()">

    <center>
        <h2>Nota Bukti Pembelian</h2>
    </center>
    <table type="hidden" align="center" cellspacing='1' cellpadding="8" sstyle='width:600px; font-size:8pt; font-family:Serif;'>
        <tbody>
            <?php
            $kode = $data['maxid'];
            $tst = mysqli_query($koneksi, "SELECT * FROM toko");
            $toko = mysqli_fetch_array($tst);
            ?>
            <tr align="left">
                <th><?php echo $toko['nama_toko'] ?> </th>
            </tr>
            <tr align="left">
                <th><?php echo $toko['alamat_toko'] ?> </th>
            </tr>
            <tr align="left">
                <th>Tanggal : <?php echo date("j F Y"); ?></th>
            </tr>
            <tr align="left">
                <th>Kasir : <?php echo $_SESSION['nama']; ?></th>
            </tr>
            <tr align="left">
                <th>TRANSAKSI : <?php echo $kode; ?></th>
            </tr>

        </tbody>

    </table>

    <table align="center" cellspacing='1' cellpadding="8" style='width:600px; font-size:15pt; font-family:Serif;' border="1">
        <thead>
            <tr align='center'>
                <td width='1%'>No</td>
                <td width='15%'>Nama</td>
                <td width='15%'>Jenis</td>
                <td width='4%'>Qty</td>
                <td width='15%'>Harga</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $kode = $data['maxid'];
            $data = mysqli_query($koneksi, "SELECT stok.nama_stk,jenis.nama_jenis,jual.jml_jual,SUM(jual.jml_jual*stok.hrg_jual) as total,user.nama_user FROM jual INNER JOIN stok on stok.id_stk=jual.id_stk JOIN jenis on jenis.id_jenis=stok.id_jenis JOIN satuan ON satuan.id_satuan=stok.id_satuan JOIN user on user.id_user=jual.id_user JOIN transaksi on transaksi.id_trx=jual.id_trx WHERE jual.id_trx='$kode' GROUP BY jual.id_stk");
            while ($user_data = mysqli_fetch_array($data)) {
            ?>
                <tr align='left'>
                    <th align='center'><?php echo $no++ ?></th>
                    <th align='left'><?php echo $user_data['nama_jenis'] ?></th>
                    <th align='left'><?php echo $user_data['nama_stk'] ?></th>
                    <th align='center'><?php echo $user_data['jml_jual'] ?></th>
                    <th align='right'>Rp. <?= number_format($user_data['total'], 0, ',', '.');  ?> </th>
                </tr>
            <?php
            }
            ?>
            <?php
            $sql = "SELECT  jual.id_jual,jual.id_trx,jenis.nama_jenis,satuan.nama_satuan,stok.nama_stk,jual.jml_jual,transaksi.jml_total, transaksi.total ,transaksi.bayar,transaksi.kembalian ,user.nama_user FROM jual INNER JOIN stok on stok.id_stk=jual.id_stk JOIN jenis on jenis.id_jenis=stok.id_jenis JOIN satuan ON satuan.id_satuan=stok.id_satuan JOIN transaksi on transaksi.id_trx=jual.id_trx JOIN user on user.id_user=transaksi.id_user WHERE jual.id_trx='$kode' GROUP BY jual.id_stk";
            $sqla = mysqli_query($koneksi, $sql);
            $row = mysqli_fetch_array($sqla);

            ?>
            <tr>
                <th align="left" colspan="2">Jumlah </th>
                <th><?php echo $row['jml_total'] ?></th>
            </tr>
            <tr width='15%'>
                <th align="left" colspan="3">Total</th>
                <th align="right">Rp. <?= number_format($row['total'], 0, ',', '.'); ?></th>
            </tr>
            <tr>
                <th align="left" colspan="3">Bayar</th>
                <th align="right">Rp. <?= number_format($row['bayar'], 0, ',', '.'); ?> </th>
            </tr>
            <tr>
                <th align="left" colspan="3">Kembalian</th>
                <th align="right">Rp. <?= number_format($row['kembalian'], 0, ',', '.'); ?> </th>
            </tr>

        </tbody>
    </table>
</body>


</html>