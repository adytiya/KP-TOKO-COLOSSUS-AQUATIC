<?php
require 'cek-sesi.php';
include 'head.php';
include "koneksi.php";
?>

<body id="page-top" onload="print()">

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
            $sqlperiode = "WHERE transaksi.tgl_trx BETWEEN '" . $tglawal . "' AND '" . $tglakhir . "' ";

            ?>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" target="_self">
                        <?php
                        if (!empty($tglawal)) {
                        ?>
                            <center>
                                <h2>DAFTAR LAPORAN KEUANGAN</h2>
                                <hr><br>
                                <h4>PERIODE TANGGAL<b><?php echo $tglawal; ?> s/d <?php echo $tglakhir; ?></b></h4>
                                </br>
                            </center>

                        <?php
                        } else {
                        ?>
                            <center>
                                <h2>DAFTAR LAPORAN KEUANGAN </h2>
                            </center>
                            <hr>
                        <?php
                        }
                        ?>

                        <div class="table-responsive">
                            <table class="table " id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>ID_transaksi</th>
                                        <th>Jumlah keuntungan Tiap Transaksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $SQL = "SELECT  transaksi.id_trx,transaksi.tgl_trx,SUM((jual.jml_jual*stok.hrg_jual)-(jual.jml_jual*stok.hrg_beli))as keuntungan FROM jual INNER JOIN stok on stok.id_stk=jual.id_stk JOIN transaksi on transaksi.id_trx=jual.id_trx $sqlperiode GROUP BY transaksi.id_trx";
                                    $data = mysqli_query($koneksi, $SQL);
                                    $no = 1;
                                    $jumlahtotal = 0;
                                    while ($user_data = mysqli_fetch_array($data)) {
                                        $jumlahtotal += $user_data['keuntungan'];
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $user_data['tgl_trx']; ?></td>
                                            <td><?php echo $user_data['id_trx']; ?></td>
                                            <td>Rp.<?= number_format($user_data['keuntungan'], 0, ',', '.'); ?></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tr align="left">
                                    <th><strong></strong></th>
                                    <th><strong></strong></th>
                                    <th><strong>Total keseluruhan </strong></th>
                                    <th>Rp.<?= number_format($jumlahtotal, 0, ',', '.'); ?></th>



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