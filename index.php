<?php
require 'cek-sesi.php';
include 'head.php';
include 'view.php';
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <?php
    require 'koneksi.php';
    require('sidebar.php'); ?>
    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php require('navbar.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">Selamat Datang
                <?= $_SESSION['nama']; ?>
            </h1>
            <!-- Page Heading -->
            <div class="row mb-2">

            </div>
            <br>

            <div class="row mb-2">
                <div class="col-xl-3 col-md-5 mb-4">
                    <div class="card  text-center shadow h-100 ">
                        <div class="card-header bg-primary text-light h6 font-weight-bold">Nama Ikan</div>
                        <div class="card-body">
                            <div class="col mr-2">
                                <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $jml_nm; ?></div>
                            </div>
                        </div>
                        <div class="card-footer h6 font-weight-bold text-gray-800"><a href='ikan.php'>Table Stok <i class='fa fa-arrow-right'></i></a></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-5 mb-4">
                    <div class="card  text-center shadow h-100 ">
                        <div class="card-header bg-primary text-light h6 font-weight-bold">Stok Yang Barang</div>
                        <div class="card-body">
                            <div class="col mr-2">
                                <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $jml_stok; ?></div>
                            </div>
                        </div>
                        <div class="card-footer h6 font-weight-bold text-gray-800"><a href='ikan.php'>Table Stok <i class='fa fa-arrow-right'></i></a></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-5 mb-4">
                    <div class="card  text-center shadow h-100 ">
                        <div class="card-header bg-primary text-light h6 font-weight-bold">Stok Yang Terjual</div>
                        <div class="card-body">
                            <div class="col mr-2">
                                <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $terjual; ?></div>
                            </div>
                        </div>
                        <div class="card-footer h6 font-weight-bold text-gray-800"><a href='laporan.php'>Table Laporan <i class='fa fa-arrow-right'></i></a></div>
                    </div>
                </div>

            </div>


            <h3> Pemasukan keseluruhan = Rp. <?= number_format($untung, 0, ',', '.'); ?></h3>

            <h3> Pengeluaran Uang (Modal) = Rp. <?= number_format($modal, 0, ',', '.'); ?></h3>

            <h3>Pemasukan Hari Ini = Rp.<?= number_format($harian, 0, ',', '.'); ?> </h3>
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

</body>

</html>