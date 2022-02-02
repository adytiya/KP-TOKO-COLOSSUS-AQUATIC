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
        <?php
        $id = $_GET['id'];
        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="col-lg-12 mb-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Transaksi
                        </h6>
                    </div>

                    <div class="card-body">

                        <div class="row mb-2">
                            <label class="col-lg-3 col-sm-2">Kode Transaksi</label>
                            <div class="col-sm-4">
                                <input type="text" readonly="readonly" class="form-control" id="tanggal" name="tanggal" value="<?php echo $id ?>   ">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <?php
                            $code10 = mysqli_query($koneksi, "SELECT nota.tanggal,nota.id_nota,nota.satuan,nota.jenis,nota.id_trx ,nota.id_stok ,nota.nama_stok  ,transaksi.jumlah,transaksi.total,transaksi.jml_jenis FROM  nota INNER JOIN transaksi on transaksi.id_trx=nota.id_trx WHERE transaksi.id_trx='$id'");
                            $data10 = mysqli_fetch_array($code10);

                            ?>
                            <label class="col-lg-3 col-sm-2">Tanggal</label>
                            <div class="col-sm-4">
                                <input type="text" readonly="readonly" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal = $data10['tanggal']; ?>   ">
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
                                            $data = mysqli_query($koneksi, "SELECT nota.id_nota,nota.satuan,nota.jenis,nota.id_trx ,nota.id_stok ,nota.nama_stok  ,nota.jumlah,nota.total,transaksi.jml_jenis FROM  nota INNER JOIN transaksi on transaksi.id_trx=nota.id_trx WHERE transaksi.id_trx='$id'");
                                            while ($user_data = mysqli_fetch_array($data)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $user_data['nama_stok']; ?></td>
                                                    <td>
                                                        <form method="POST" action="update-transaksi.php">
                                                            <input type="number" id="jumlah" name="jumlah" value="<?php echo $user_data['jumlah']; ?>" class="form-control">
                                                            <input type="hidden" name="satuan" value="<?php echo $user_data['satuan']; ?>" class="form-control">
                                                            <input type="hidden" name="jenis_stok" value="<?php echo $user_data['jenis']; ?>" class="form-control">
                                                            <input type="hidden" name="id_stok" value="<?php echo $user_data['id_stok']; ?>" class="form-control">

                                                    </td>
                                                    <td>Rp. <?= number_format($user_data['total'], 0, ',', '.'); ?></td>
                                                    <td><?= $_SESSION['nama']; ?></td>
                                                    <td>
                                                        <button type="update" class="btn btn-outline-success">Update</button>
                                                        <button type="delete" class="btn btn-outline-danger">delete</button>
                                                    </td>
                                                    </form>

                                                </tr>
                                            <?php
                                                $total_jumlah += $user_data['jumlah'];
                                                $total_semua += $user_data['total'];
                                                $sql2 = "SELECT COUNT(nama_stok) FROM jual";
                                                $tst = mysqli_query($koneksi, $sql2);
                                                while ($data2 = mysqli_fetch_assoc($tst)) {
                                                    $jml = $data2['COUNT(nama_stok)'];
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-1">
                                        <label class="col-lg-4">Total Semua</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="atotal" name="atotal" value="">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <label class="col-lg-4">Total Semua</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="abayar" name="abayar" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <label class="col-lg-4 ">Kembali</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="akembali" name="akembali">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-1"></div>
                            <div class=" col-sm-5 border-left ">
                                <form method="POST" action="proses-input-trs.php">
                                    <div class="row mb-1">
                                        <label class="col-lg-4">Total Semua</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="total" onkeyup="kembali();" name="total" value="<?php echo $total_semua; ?>">
                                        </div>
                                        <input type="hidden" name="jumlah" value="<?= $total_jumlah; ?>">
                                        <input type="hidden" name="kode" value="<?= $kodeauto; ?>">
                                        <input type="hidden" name="total" value="<?= $total_semua; ?>">
                                        <input type="hidden" class="form-control" onkeyup="kembali();" id="balik" name="balik">
                                        <input type="hidden" name="jml" value="<?php echo $jml; ?>">

                                    </div>
                                </form>
                                <div class="row mb-1">
                                    <label class="col-lg-4">Bayar</label>
                                    <div class="col-sm-5">
                                        <input type="number" class="form-control" onkeyup="kembali();" id="bayar" name="bayar" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-lg-4 ">Kembali</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" onkeyup="kembali();" id="kembali" name="kembali">
                                    </div>
                                </div>
                                <div class="col-mt-6">
                                    <a class="btn btn-success" href="#" onclick="window.open('cetak.php','POPUP WINDOW TITLE HERE','width=650,height=800').print()">Print Nota</a>

                                    <a class="btn btn-success" href="#" onclick="window.open('cetak.php','POPUP WINDOW TITLE HERE','width=650,height=800').print()">Print Nota</a>
                                </div>

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
    <script src="js/demo/chart-area-demo.js"></script>
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