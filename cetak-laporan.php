<?php
include 'koneksi.php';
include 'cek-sesi.php';
include 'view.php';
include 'head.php';

?>
<html>


<head>
    <title>Colossus Aquatic</title>
</head>

<body onload="print()">

    <center>

        <h2>Laporan Penjualan Harian</h2>

    </center>
    <div class="table-responsive">
        <table class="table " id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>ID_transaksi</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>kembali</th>
                    <th>Admin</th>
                </tr>
            </thead>

            <tbody>
                <?php

                $SQL = "SELECT transaksi.jml_total,transaksi.tgl_trx ,transaksi.id_trx, transaksi.id_trx,transaksi.total ,transaksi.bayar,transaksi.kembalian,user.nama_user FROM transaksi INNER JOIN user on user.id_user=transaksi.id_user";
                $data = mysqli_query($koneksi, $SQL);
                $no = 1;
                $jumlahtotal = 0;
                $jumlahtotal2 = 0;
                while ($user_data = mysqli_fetch_array($data)) {

                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $user_data['tgl_trx']; ?></td>
                        <td><?php echo $user_data['id_trx']; ?></td>
                        <td>Rp.<?= number_format($user_data['total'], 0, ',', '.'); ?></td>
                        <td>Rp.<?= number_format($user_data['bayar'], 0, ',', '.'); ?></td>
                        <td>Rp.<?= number_format($user_data['kembalian'], 0, ',', '.'); ?></td>
                        <td><?php echo $user_data['nama_user']; ?></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php

        $data = mysqli_query($koneksi, "SELECT transaksi.jml_total,transaksi.tgl_trx ,transaksi.id_trx, transaksi.id_trx,transaksi.total ,transaksi.bayar,transaksi.kembalian,user.nama_user FROM transaksi INNER JOIN user on user.id_user=transaksi.id_user ");
        $pemasukan = 0;
        $jumlahikn = 0;
        while ($user_data = mysqli_fetch_array($data)) {
            $pemasukan += $user_data['total'];
            $jumlahikn += $user_data['jml_total'];
        } ?>
        <h5> Total keseluruhan Transaksi = Rp. <?= number_format($pemasukan, 0, ',', '.'); ?></h5>
    </div>
</body>


</html>