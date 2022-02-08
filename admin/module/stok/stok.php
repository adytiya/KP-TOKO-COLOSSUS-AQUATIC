<?php
require "/xampp/htdocs/toko-collosus/session.php";
require "/xampp/htdocs/toko-collosus/admin/template/head.php";
require "/xampp/htdocs/toko-collosus/koneksi.php";
?>
<body id="page-top">

    <!-- Page Wrapper -->
    <?php
    require "/xampp/htdocs/toko-collosus/admin/template/sidebar.php"; ?>
    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php require ('/xampp/htdocs/toko-collosus/admin/template/navbar.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1>Data Stok </h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="#.php" class="btn btn-primary"> Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Nama</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Tanggal Input</th>
                                    <th>Opsi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $code= "SELECT * FROM stok INNER JOIN jenis on stok.id_jenis = jenis.id_jenis INNER JOIN satuan on stok.id_satuan = satuan.id_satuan";
                                $data = mysqli_query($koneksi, $code);
                                $no = 1;
                                while ($user_data = mysqli_fetch_array($data)) {
                                    
                                ?>
                                    <tr>
                                        <th><?php echo $no++; ?></th>
                                        <th><?php echo $user_data['nama_jenis'] ?></th>
                                        <th><?php echo $user_data['nama_stk'] ?></th>
                                        <td>Rp. <?= number_format($user_data['hrg_beli'], 0, ',', '.'); ?></td>
                                        <td>Rp. <?= number_format($user_data['hrg_jual'], 0, ',', '.'); ?></td>
                                        <th><?php echo $user_data['stok'] ?></th>
                                        <th><?php echo $user_data['nama_satuan'] ?></th>
                                        <th><?php echo $user_data['tgl_input_stok'] ?></th>
                                        <th>
                                            <a href="#" class="btn btn-success">Edit</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </th>
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
    <?php require '/xampp/htdocs/toko-collosus/admin/template/footer.php' ?>
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
    <?php require ('../module/logout/logout-modal.php'); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>