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
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID_transaksi</th>
                    <th>Jenis</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                    <th>Admin</th>


                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                $tgl = date("Y-m-d");
                $data = mysqli_query($koneksi, "SELECT * FROM nota WHERE tanggal LIKE '%$tgl%'");
                while ($user_data = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $user_data['id_trs']; ?></td>
                        <td><?php echo $user_data['jenis']; ?></td>
                        <td><?php echo $user_data['nama_stok']; ?></td>
                        <td><?php echo $user_data['jumlah']; ?></td>
                        <td><?php echo $user_data['total']; ?></td>
                        <td><?php echo $user_data['tanggal']; ?></td>
                        <td><?php echo $user_data['admin']; ?></td>
                    </tr>

            </tbody>
        <?php
                }
        ?>
        </table>
        <?php

        $tgl = date("Y-m-d");
        $data = mysqli_query($koneksi, "SELECT * FROM nota WHERE tanggal='$tgl'");
        $pemasukan = 0;
        $jumlahikn = 0;
        while ($user_data = mysqli_fetch_array($data)) {
            $pemasukan += $user_data['total'];
            $jumlahikn += $user_data['jumlah'];
        } ?>
        <h5> Pemasukan Per tanggal <?php echo $tgl; ?> = Rp. <?= number_format($pemasukan, 0, ',', '.'); ?></h5>
        <h5 name='modal'> Jumlah Ikan Yang Terjual Per tanggal <?php echo $tgl; ?> = <?php echo $jumlahikn; ?> Ekor</h5>
    </div>
</body>


</html>