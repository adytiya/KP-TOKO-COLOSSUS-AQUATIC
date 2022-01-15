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


            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">From Edit Data User </h1>

            <form method="get" action="edit-user.php">

                <?php
                $id = $_GET['id'];
                $query_edit = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
                while ($row = mysqli_fetch_array($query_edit)) {
                ?>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Id</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id" value="<?php echo $row['id_user'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">username</label>
                        <div class="col-sm-10">
                            <input type="varchar" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">password</label>
                        <div class="col-sm-10">
                            <input type="varchar" class="form-control" id="password" name="password" value="<?php echo $row['pass']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="level">
                                <option selected><?php echo $row['level']; ?></option>
                                <option value="kasir">Kasir</option>
                                <option value="super_admin">Super Admin</option>
                            </select>
                        </div>
                    </div>
                    <a href="user.php" class="btn btn-primary">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                <?php } ?>

            </form>



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