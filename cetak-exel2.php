<?php
require 'cek-sesi.php';
include 'head.php';
include "koneksi.php";
?>

<body id="page-top">
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Laporan Transaksi.xls");
    ?>
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?php
            //mengenalkan variabel teks
            $awal = $_GET['awal'];
            $akhir = $_GET['akhir'];

            $tglawal = isset($_GET['awal']) ? $_GET['awal'] : "01-" . date('m-Y');
            $tglakhir = isset($_GET['akhir']) ? $_GET['akhir'] : date('d-m-Y');
            $sqlperiode = "WHERE nota.tanggal BETWEEN '" . $tglawal . "' AND '" . $tglakhir . "' ";

            ?>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" target="_self">
                        <?php
                        if (!empty($tglawal)) {
                        ?>
                            <center>
                                <h2>DAFTAR LAPORAN TRANSAKSI</h2>
                                <hr><br>
                                <h4>PERIODE TRANSAKSI <b><?php echo $tglawal; ?> s/d <?php echo $tglakhir; ?></b></h4>
                                </br>
                            </center>

                        <?php
                        } else {
                        ?>
                            <center>
                                <h2>DAFTAR LAPORAN TRANSAKSI PESANAN </h2>
                            </center>
                            <hr>
                        <?php
                        }
                        ?>

                        <div class="table-responsive">
                            <table class="table " border="1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>ID_transaksi</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Bayar</th>
                                        <th>kembalian</th>
                                        <th>keuntungan</th>
                                        <th>Admin</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    $SQL = "SELECT nota.tanggal,nota.id_trx,transaksi.jumlah,transaksi.total,transaksi.bayar,transaksi.kembali,SUM(nota.total-stok.harga_beli) as keuntungan,  nota.admin FROM nota INNER JOIN stok ON stok.id_stok=nota.id_stok JOIN transaksi ON transaksi.id_trx=nota.id_trx $sqlperiode GROUP by id_trx ";
                                    $data = mysqli_query($koneksi, $SQL);
                                    $no = 1;
                                    $jumlahtotal = 0;
                                    $jumlahtotal2 = 0;
                                    while ($user_data = mysqli_fetch_array($data)) {
                                        $jumlahtotal += $user_data['total'];
                                        $jumlahtotal2 += $user_data['keuntungan'];
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $user_data['tanggal']; ?></td>
                                            <td><?php echo $user_data['id_trx']; ?></td>
                                            <td><?php echo $user_data['jumlah']; ?></td>
                                            <td>Rp.<?= number_format($user_data['total'], 0, ',', '.'); ?></td>
                                            <td>Rp.<?= number_format($user_data['bayar'], 0, ',', '.'); ?></td>
                                            <td>Rp.<?= number_format($user_data['kembali'], 0, ',', '.'); ?></td>
                                            <td>Rp.<?= number_format($user_data['keuntungan'], 0, ',', '.'); ?></td>
                                            <td><?php echo $user_data['admin']; ?></td>
                                        </tr>


                                    <?php
                                    }
                                    ?>
                    </form>
                    </tbody>
                    <tr align="left">
                        <th><strong>Total Transaksi </strong></th>
                        <th>Rp.<?= number_format($jumlahtotal, 0, ',', '.'); ?></th>
                    </tr>
                    <tr align="left">
                        <th><strong>Total Keuntungan </strong></th>
                        <th>Rp.<?= number_format($jumlahtotal2, 0, ',', '.'); ?></th>
                    </tr>
                    </table>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

    </div>
</body>

</html>