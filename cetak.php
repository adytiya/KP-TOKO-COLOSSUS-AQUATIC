<?php
include 'koneksi.php';
include 'cek-sesi.php';

?>
<html>


<head>
    <title>Colossus Aquatic</title>
</head>

<body onload="print()">

    <center>

        <h2>Struk Bukti Pembelian</h2>

    </center>
    <table type="hidden" align="center" cellspacing='1' cellpadding="8" sstyle='width:600px; font-size:8pt; font-family:Serif;'>
        <tbody>
            <?php

            $data = mysqli_query($koneksi, "SELECT * FROM toko");
            while ($user_data = mysqli_fetch_array($data)) {
            ?>
                <tr align="left">
                    <th><?php echo $user_data['nama_toko'] ?> </th>
                </tr>
                <tr align="left">
                    <th><?php echo $user_data['alamat'] ?> </th>
                </tr>
                <tr align="left">
                    <th>Tanggal : <?php echo date("j F Y, G:i"); ?></th>
                </tr>
                <tr align="left">
                    <th>Kasir : <?php echo $_SESSION['nama']; ?></th>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>

    <table align="center" cellspacing='1' cellpadding="8" style='width:600px; font-size:15pt; font-family:Serif;' border="1">
        <thead>
            <tr align='center'>
                <td width='1%'>No</td>
                <td width='15%'>Nama Ikan</td>
                <td width='4%'>Qty</td>
                <td width='15%'>Harga</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = "SELECT*FROM transaksi ORDER BY id_trx  DESC LIMIT 1";
            $result = $koneksi->query($sql);
            $row = $result->fetch_assoc();
            $jumlah = $row['jml_jenis'];
            $data = mysqli_query($koneksi, "SELECT * FROM nota ORDER BY id_trs DESC LIMIT $jumlah");
            while ($user_data = mysqli_fetch_array($data)) {
            ?>
                <tr align='left'>
                    <th align='center'><?php echo $no++ ?></th>
                    <th align='left'><?php echo $user_data['nama_ikan'] ?></th>
                    <th align='center'><?php echo $user_data['jumlah'] ?></th>
                    <th align='right'>Rp. <?= number_format($user_data['total'], 0, ',', '.');  ?> </th>
                </tr>
            <?php
            }
            ?>
            <?php
            $sql = "SELECT*FROM transaksi ORDER BY id_trx  DESC LIMIT 1";
            $result = $koneksi->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <tr>
                <th align="left" colspan="2">Jumlah Ikan</th>
                <th><?php echo $row['jumlah'] ?></th>
            </tr>
            <?php
            $data1 = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY id_trx DESC LIMIT 1");
            while ($user_data1 = mysqli_fetch_array($data1)) {
            ?>
                <tr width='15%'>
                    <th align="left" colspan="3">Total</th>
                    <th align="right">Rp. <?= number_format($user_data1['total'], 0, ',', '.'); ?></th>
                </tr>
                <tr>
                    <th align="left" colspan="3">Bayar</th>
                    <th align="right">Rp. <?= number_format($user_data1['bayar'], 0, ',', '.'); ?> </th>
                </tr>
                <tr>
                    <th align="left" colspan="3">Kembalian</th>
                    <th align="right">Rp. <?= number_format($user_data1['kembali'], 0, ',', '.'); ?> </th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>


</html>