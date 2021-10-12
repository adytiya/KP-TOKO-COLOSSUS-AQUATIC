<?php
require 'cek-sesi.php';
include 'head.php';
include 'auto-kode.php';


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
            <div class="col-lg-12">
                <div class="card shadow mb-2">


                    <div class="card shadow mb-1">
                        <div class="card-header py-2">
                            <h6 class="m-0 font-weight-bold text-primary">Cari
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <label class="col-lg-3 col-sm-2">Kode Transaksi</label>
                                <div class="col-sm-4">

                                    <input type="text" readonly="readonly" class="form-control" id="kode" name="kode" value="<?= $kodeauto; ?>">
                                </div>
                            </div>
                            <form method="POST" action="proses-input.php">
                                <div class="row mb-2">
                                    <label class="col-lg-3 col-sm-2">cari barang</label>
                                    <div class="col-sm-4">
                                        <input type="varchar" autocomplete="off" class="form-control" id="cari" name="cari">
                                        <div class="list-group" id="show-list">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-mb-4 col-sm-2">
                                        <!--<a href="proses-input.php"type="submit" id="tambah" name="tambah" class="btn btn-primary col-sm-3 col-mb-1">tambah</a>-->
                                        <button type="submit" name="tambah" class="btn btn-primary col-sm-3 col-mb-1">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>

            <div class="col-lg-12 mb-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h6 class="m-0 font-weight-bold text-primary">Kasir
                        </h6>
                    </div>

                    <div class="card-body">

                        <div class="row mb-2">
                            <label class="col-lg-3 col-sm-2">Tanggal</label>
                            <div class="col-sm-4">
                                <input type="text" readonly="readonly" class="form-control" id="tanggal" name="tanggal" value="<?php echo date("j F Y, G:i"); ?>   ">
                            </div>
                        </div>
                        <!--tabel tranksaksi-->
                        <div class="row mb-5">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                                <th>kasir</th>
                                                <th>Opsi</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $total_semua = 0;
                                            $total_jumlah = 0;
                                            $bayar = 0;
                                            $no = 1;
                                            $data = mysqli_query($koneksi, "SELECT * FROM jual ");
                                            while ($user_data = mysqli_fetch_array($data)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $user_data['nama_ikan']; ?></td>
                                                    <td>
                                                        <form method="POST" action="update-transaksi.php">
                                                            <input type="number" id="jumlah" name="jumlah" value="<?php echo $user_data['jumlah']; ?>" class="form-control">
                                                            <input type="hidden" name="id_ikan" value="<?php echo $user_data['id_ikan']; ?>" class="form-control">
                                                            <input type="hidden" name="id_jual" value="<?php echo $user_data['id_jual']; ?>" class="form-control">
                                                    </td>
                                                    <td>Rp. <?= number_format($user_data['total'], 0, ',', '.'); ?></td>
                                                    <td><?= $_SESSION['nama']; ?></td>
                                                    <td>
                                                        <button type="submit" class="btn btn-warning">Update</button>
                                                        </form>
                                                        <a href="delete-data-transaksi.php?id=<?= $user_data['id_jual']; ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php

                                                $total_jumlah += $user_data['jumlah'];
                                                $total_semua += $user_data['total'];
                                                $sql2 = "SELECT COUNT(nama_ikan) FROM jual";
                                                $tst = mysqli_query($koneksi, $sql2);
                                                while ($data2 = mysqli_fetch_assoc($tst)) {
                                                    $jml = $data2['COUNT(nama_ikan)'];
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <form method="POST" action="proses-input-trs.php">
                            <?php
                            $no = 1;

                            $nota = mysqli_query($koneksi, "SELECT * FROM jual ");
                            while ($rows = mysqli_fetch_array($nota)) {
                            ?>


                                <input type="text" name="id_ikan[]" value="<?php echo $rows['id_ikan']; ?>">
                                <input type="text" name="id_trs[]" value="<?php echo $kodeauto ?>">
                                <input type="text" name="nama_ikan[]" value="<?php echo $rows['nama_ikan'] ?>">
                                <input type="text" name="jumlah_brg[]" value="<?php echo $rows['jumlah']; ?>">
                                <input type="text" name="total_brg[]" value="<?= $rows['total']; ?>">
                                <input type="text" name="tanggal[]" value="<?php echo date("j F Y, G:i"); ?> ">
                                <input type="text" name="admin[]" value="<?php echo $_SESSION['nama']; ?>">


                            <?php

                            }
                            ?>
                            <div class="row mb-2">

                                <label class="col-lg-2 mb-1">Total Semua</label>
                                <div class="col-sm-3">

                                    <input type="text" class="form-control" id="total" onkeyup="kembali();" name="total" value="<?php echo $total_semua; ?>">

                                </div>
                                <label class="col-lg-1 sm-5 mb-3">Bayar</label>


                                <div class="col-sm-3">
                                    <input type="text" class="form-control" onkeyup="kembali();" id="bayar" name="bayar" autocomplete="off">
                                </div>
                                <input type="hidden" name="jumlah" value="<?= $total_jumlah; ?>">
                                <input type="hidden" name="kode" value="<?= $kodeauto; ?>">
                                <input type="hidden" name="total" value="<?= $total_semua; ?>">
                                <input type="hidden" class="form-control" onkeyup="kembali();" id="balik" name="balik">
                                <button type="hidden" name="input" class="btn btn-primary col-sm-1    ">Submit</button>
                                <input type="hidden" name="jml" value="<?php echo $jml; ?>">
                                <button class="btn btn-danger" name="reset" id="reset">RESET</button>


                            </div>
                        </form>
                        <div class="row mb-2">
                            <label class="col-lg-2 mb-1">Kembali</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" onkeyup="kembali();" id="kembali" name="kembali">
                            </div>

                            <div class="col-mt-6">
                                <button type="text" name="lharian" class="btn btn-primary col-sm-13 col-mb-1">laporan Harian </button>
                            </div>
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
    <!--menghitung kembalian -->
    <script type="text/javascript">
        function kembali() {
            // body...
            var total = document.getElementById('total').value;
            var bayar = document.getElementById('bayar').value;
            var bayar_b = parseInt(bayar) - parseInt(total);
            if (!isNaN(bayar_b)) {
                document.getElementById('kembali').value = bayar_b;
                document.getElementById('balik').value = bayar_b;
            }

        }
    </script>
    <script type="text/javascript">
        function balik() {
            // body...
            var total = document.getElementById('total').value;
            var bayar = document.getElementById('bayar').value;
            var bayar_b = parseInt(bayar) - parseInt(total);
            if (!isNaN(bayar_b)) {


            }
        }
    </script>
    <!--mencari barang-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#cari').keyup(function() {
                var searchText = $(this).val();
                if (searchText != '') {
                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        data: {
                            query: searchText
                        },
                        success: function(response) {
                            $("#show-list").html(response);
                        }
                    });
                } else {
                    $("#show-list").html('');
                }
            });
            $(document).on('click', 'a', function() {
                $("#cari").val($(this).text());
                $("#show-list").html('');
            });
        });
    </script>
</body>

</html>