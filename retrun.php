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
                                    <th>Bayar</th>
                                    <th>kembalian</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $SQL = "SELECT nota.tanggal,nota.id_trx,transaksi.jumlah,transaksi.total,transaksi.bayar,transaksi.kembali,SUM(nota.total-stok.harga_beli) as keuntungan,  nota.admin FROM nota INNER JOIN stok ON stok.id_stok=nota.id_stok JOIN transaksi ON transaksi.id_trx=nota.id_trx GROUP by id_trx ";
                                $data = mysqli_query($koneksi, $SQL);
                                $no = 1;
                                $jumlahtotal = 0;
                                $jumlahtotal2 = 0;
                                while ($user_data = mysqli_fetch_array($data)) {

                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $user_data['tanggal']; ?></td>
                                        <td><?php echo $user_data['id_trx']; ?></td>
                                        <td><?php echo $user_data['jumlah']; ?></td>
                                        <td>Rp.<?= number_format($user_data['total'], 0, ',', '.'); ?></td>
                                        <td>Rp.<?= number_format($user_data['bayar'], 0, ',', '.'); ?></td>
                                        <td>Rp.<?= number_format($user_data['kembali'], 0, ',', '.'); ?></td>
                                        <td>
                                            <a href="edit-trx.php?id=<?= $user_data['id_trx']; ?>" class="btn btn-success">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
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