<?php
require 'cek-sesi.php';
include 'head.php';
include 'view.php';

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <?php
    require('sidebar.php');
    ?>
    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php require('navbar.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <?php
                //mengenalkan variabel teks
                $sqlperiode = " ";
                $awaltgl = " ";
                $akhirtgl = " ";
                $tglawal = " ";
                $tglakhir = " ";

                if (isset($_POST['btntampilkan'])) {
                    $tglawal = isset($_POST['txttglawal']) ? $_POST['txttglawal'] : "01-" . date('m-Y');
                    $tglakhir = isset($_POST['txttglakhir']) ? $_POST['txttglakhir'] : date('d-m-Y');
                    $sqlperiode = "WHERE tanggal BETWEEN '" . $tglawal . "' AND '" . $tglakhir . "' ";
                } else {
                    $awaltgl = "01-" . date('m-Y');
                    $akhirtgl = date('d-m-Y');
                    $sqlperiode = "WHERE tanggal BETWEEN '" . $tglawal . "' AND '" . $tglakhir . "' ";
                }
                ?>
                <div class="card-header py-3">
                    <h4>Periode tanggal <b><?php echo $tglawal; ?></b> s/d <b><?php echo $tglakhir; ?></b></h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" target="_self">

                        <div class="row py-3">
                            <div class="col-lg-3">
                                <input name="txttglawal" type="date" class="form-control" value=<?php echo $tglawal; ?> size="10">
                            </div>
                            <div class="col-lg-3">
                                <input name="txttglakhir" type="date" class="form-control" value="<?php echo $tglakhir; ?>">
                            </div>
                            <div>
                                <div class="col-lg-2">
                                    <input type="submit" name="btntampilkan" class="btn btn-success" value="tampilkan">
                                </div>

                            </div>
                        </div>

                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                $jumlahtotal = 0;
                                $no = 1;
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
                            </tbody>
                        </table>
                        <div>
                            <h3> Total keseluruhan = Rp.<?= number_format($jumlahtotal, 0, ',', '.'); ?></h3>
                        </div>
                        <a href="cetak-exel-keuangan.php?awal=<?php echo $tglawal; ?> &&akhir=<?php echo $tglakhir; ?>" target="_blank" alt="Edit Data" class="btn btn-primary">Export Exel</a>
                        <a href="print_keuangan.php?awal=<?php echo $tglawal; ?> &&akhir=<?php echo $tglakhir; ?>" target="_blank" alt="Edit Data" class="btn btn-primary">Cetak Laporan</a>
                    </div>
                </div>
            </div>



        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php require 'footer.php' ?>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php require 'logout-modal.php' ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>