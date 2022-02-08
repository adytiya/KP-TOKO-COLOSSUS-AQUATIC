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
            <h1 class="h3 mb-4 text-gray-800">From Edit Data Ikan </h1>

            <form method="get" action="edit-stok.php">

                <?php
                $id = $_GET['id'];
                $code = "SELECT *FROM stok INNER JOIN jenis on jenis.id_jenis=stok.id_jenis join satuan on satuan.id_satuan=stok.id_satuan";
                $query_edit = mysqli_query($koneksi, "$code WHERE id_stk='$id'");
                while ($row = mysqli_fetch_array($query_edit)) {
                ?>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Id</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" class="form-control" id="id" name="id" value="<?php echo $row['id_stk']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-control" name="jenis">
                                <option selected value="<?php echo $row['id_jenis']; ?>"><?php echo $row['nama_jenis']; ?></option>
                                <?php
                                include 'koneksi.php';
                                $code = "SELECT * FROM jenis";
                                $data = mysqli_query($koneksi, $code);
                                while ($user_data = mysqli_fetch_array($data)) {
                                ?>
                                    <option value="<?php echo $user_data['id_jenis']; ?>"><?php echo $user_data['nama_jenis']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_stok" name="nama_stok" value="<?php echo $row['nama_stk']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Beli</label>
                        <div class="col-sm-10">
                            <input type="varchar" class="form-control" id="harga_beli" name="harga_beli" value="<?php echo $row['hrg_beli']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Harga Jual</label>
                        <div class="col-sm-10">
                            <input type="varchar" class="form-control" id="harga_jual" name="harga_jual" value="<?php echo $row['hrg_jual']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $row['stok']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Satuan</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-control" name="satuan">
                                <option selected value="<?php echo $row['id_satuan']; ?>"><?php echo $row['nama_satuan']; ?></option>
                                <?php
                                include 'koneksi.php';
                                $code = "SELECT * FROM satuan";
                                $data = mysqli_query($koneksi, $code);
                                while ($user_data = mysqli_fetch_array($data)) {
                                ?>
                                    <option value="<?php echo $user_data['id_satuan']; ?>"><?php echo $user_data['nama_satuan']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Input</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_input" name="tanggal_input" value="<?php echo $row['tgl_input_stok']; ?>">
                        </div>
                    </div>
                    <a href="stok.php" class="btn btn-primary">
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