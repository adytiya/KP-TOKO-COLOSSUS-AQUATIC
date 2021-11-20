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
                                <h2>DAFTAR LAPORAN TRANSAKSI PESANAN</h2>
                                <hr><br>
                                <h4>PERIODE PEMESANAN <b><?php echo $tglawal; ?> s/d <?php echo $tglakhir; ?></b></h4>
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
                            <table class="table " id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID_transaksi</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Admin</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $SQL = "SELECT * FROM transaksi $sqlperiode";
                                    $data = mysqli_query($koneksi, $SQL);
                                    $no = 1;
                                    $jumlahtotal = 0;
                                    while ($user_data = mysqli_fetch_array($data)) {
                                        $jumlahtotal += $user_data['total'];
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $user_data['id_trx']; ?></td>
                                            <td><?php echo $user_data['jumlah']; ?></td>
                                            <td><?php echo $user_data['tanggal']; ?></td>
                                            <td>Rp.<?= number_format($user_data['total'], 0, ',', '.'); ?></td>
                                            <td><?php echo $user_data['admin']; ?></td>


                                        </tr>


                                    <?php
                                    }
                                    ?>
                    </form>
                    </tbody>
                    <tr align="left">
                        <th><strong></strong></th>
                        <th><strong></strong></th>
                        <th><strong></strong></th>
                        <th><strong>Total Transaksi </strong></th>
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