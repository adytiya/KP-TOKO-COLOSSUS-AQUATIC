<?php
require 'cek-sesi.php';
include 'head.php';
include 'view.php';
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <?php

    require 'koneksi.php';
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
                <div class="card-header py-3">
                    <h2 class="text-center">Histori Transaksi </h2>
                </div>
                <div class="card-header py-3">

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

                                $SQL = "SELECT transaksi.tgl_trx ,transaksi.id_trx, transaksi.id_trx,transaksi.total ,transaksi.bayar,transaksi.kembalian,user.nama_user FROM transaksi INNER JOIN user on user.id_user=transaksi.id_user";
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
                        <a class="btn btn-success" target="_blank" href="cetak-exel.php">EXPORT KE EXCEL</a>
                        <a class="btn btn-success" href="#" onclick="window.open('cetak-laporan.php','POPUP WINDOW TITLE HERE','width=650,height=800').print()">Cetak Laporan </a>
                        <!--<h3 name='modal'> Pemasukan Uang = Rp. <?= number_format($untung, 0, ',', '.'); ?></h3>-->
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