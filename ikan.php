<?php
require 'cek-sesi.php';
include 'head.php';
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
                <h1>Data Stok Ikan</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        	<a href="tambah-data-stok.php" class="btn btn-primary"> Tambah Data</a>
                            </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th>Tanggal Input</th>
                                            <th>Opsi</th>
                                        
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                    include 'koneksi.php';
                                
                                    $data =mysqli_query($koneksi,"SELECT * FROM stk_ikn ");
                                    while($user_data = mysqli_fetch_array($data)){
                                    ?>
                                        <tr>
                                            <th><?php echo $user_data['id_ikan'] ?></th>
                                            <th><?php echo $user_data['nama_ikan'] ?></th>
                                            <td>Rp. <?= number_format($user_data['harga_beli'], 0, ',', '.'); ?></td>
                                            <td>Rp. <?= number_format($user_data['harga_jual'], 0, ',', '.'); ?></td>
                                            <th><?php echo $user_data['stok'] ?> ekor</th>
                                            <th><?php echo $user_data['tanggal_input'] ?></th>
                                        	<th>
                                        	    <a href="edit-data-ikan.php?id=<?= $user_data['id_ikan'];?>"class="btn btn-success">Edit</a>
                                        		<a href="delete-stok.php?id=<?= $user_data['id_ikan']; ?>" class="btn btn-danger">Delete</a>  
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