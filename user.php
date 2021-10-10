<?php
require 'cek-sesi.php';
include 'head.php';
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <?php
     require('koneksi.php');
    require('sidebar.php'); ?>
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require('navbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                 <div class="container-fluid">
              	 <h1>Data User</h1>

               
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        	<a href="tambah-data-user.php" class="btn btn-primary"> Tambah Data</a>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    include 'koneksi.php';
                                   
                                    $data=mysqli_query($koneksi,"SELECT * FROM user ");
                                    while($data_user=mysqli_fetch_array($data)){
                                     ?>
                                        <tr>
                                        
                                            <th><?php echo $data_user['id_user']; ?></th>
                                            <th><?php echo $data_user['nama']; ?></th>
                                            <th><?php echo $data_user['username']; ?></th>
                                            <th><?php echo $data_user['pass']; ?></th>
                                            <th><?php echo $data_user['level']; ?></th>
                                             <th>                                      		

                                             <a href="edit-data-user.php?id=<?=$data_user['id_user'];?>"class="btn btn-success">Edit</a>
                                        	 <a href="delete-user.php?id=<?=$data_user['id_user']; ?>" class="btn btn-danger">Delete</a>  
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