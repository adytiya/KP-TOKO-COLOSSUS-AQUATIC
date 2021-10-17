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
            <div class="card-header py-3">
                <h2 class="text-center">Data Laporan</h2>
            </div>

            <div class="card-header py-3">
                <a class="btn btn-success" href="#" onclick="window.open('cetak-laporan.php','POPUP WINDOW TITLE HERE','width=650,height=800').print()">laporan harian </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID_transaksi</th>
                                <th>Nama Ikan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Tanggal</th>
                                <th>Admin</th>


                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;

                            $data = mysqli_query($koneksi, "SELECT * FROM nota ");
                            while ($user_data = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $user_data['id_trs']; ?></td>
                                    <td><?php echo $user_data['nama_ikan']; ?></td>
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
                    <h3 name='modal'> Pemasukan Uang = Rp. <?= number_format($untung, 0, ',', '.'); ?></h3>
                </div>
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