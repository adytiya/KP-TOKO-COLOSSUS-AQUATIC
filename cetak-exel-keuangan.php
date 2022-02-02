<?php
require 'cek-sesi.php';
include 'head.php';
include "koneksi.php";
?>

<body>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan keuangan.xls");
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
            $sqlperiode = "WHERE tanggal BETWEEN '" . $tglawal . "' AND '" . $tglakhir . "' ";

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
                            <table border="1" width="100%" cellspacing="0">
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
                                    $SQL = "SELECT id_trx,SUM(total-harga_beli) as keuntungan,total,admin,tanggal FROM nota INNER JOIN stok ON stok.id_stok=nota.id_stok $sqlperiode GROUP by id_trx ";
                                    $data = mysqli_query($koneksi, $SQL);
                                    $no = 1;
                                    $jumlahtotal = 0;
                                    while ($user_data = mysqli_fetch_array($data)) {
                                        $jumlahtotal += $user_data['keuntungan'];
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $user_data['tanggal']; ?></td>
                                            <td><?php echo $user_data['id_trx']; ?></td>
                                            <td>Rp.<?= number_format($user_data['keuntungan'], 0, ',', '.'); ?></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                    </form>
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