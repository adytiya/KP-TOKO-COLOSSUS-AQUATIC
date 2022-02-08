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
                            $code10 = mysqli_query($koneksi, "SELECT*FROM transaksi where id_trx='$id'");
                            $data10 = mysqli_fetch_array($code10);

                            ?>
                            <label class="col-lg-3 col-sm-2">Tanggal</label>
                            <div class="col-sm-4">
                                <input type="text" readonly="readonly" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal = $data10['tgl_trx']; ?>   ">
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

                                            $data = mysqli_query($koneksi, "SELECT transaksi.tgl_trx,jual.id_jual,jual.id_trx,stok.id_jenis,stok.id_satuan,stok.nama_stk,jual.jml_jual,stok.id_stk ,SUM(jual.jml_jual*stok.hrg_jual)as total  FROM jual INNER JOIN stok on stok.id_stk=jual.id_stk JOIN user ON user.id_user=jual.id_user JOIN transaksi ON transaksi.id_trx=jual.id_trx WHERE jual.id_trx='$id' GROUP BY jual.id_jual");
                                            while ($user_data = mysqli_fetch_array($data)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $user_data['nama_stk']; ?></td>
                                                    <td>
                                                        <form method="POST" action="update-transaksii.php">
                                                            <input type="number" id="jml_jual" name="jml_jual" value="<?php echo $user_data['jml_jual']; ?>" class="form-control">
                                                            <input type="hidden" id="id_stok" name="id_stok" value="<?php echo $user_data['id_stk']; ?>" class="form-control">
                                                            <input type="hidden" id="id_jenis" name="id_jenis" value="<?php echo $user_data['id_jenis']; ?>" class="form-control">
                                                            <input type="hidden" id="id_satuan" name="id_satuan" value="<?php echo $user_data['id_satuan']; ?>" class="form-control">
                                                            <input type="hidden" id="id_jual" name="id_jual" value="<?php echo $user_data['id_jual']; ?>" class="form-control">
                                                            <input type="hidden" id="id_trx" name="id_trx" value="<?php echo $user_data['id_trx']; ?>" class="form-control">

                                                    </td>
                                                    <td>Rp. <?= number_format($user_data['total'], 0, ',', '.'); ?></td>
                                                    <td><?= $_SESSION['id']; ?></td>
                                                    <td>
                                                        <button type="submit" class="btn btn-warning">Update</button>
                                                        </form>
                                                        <a href="delete-jual.php?id=<?= $user_data['id_jual']; ?>&&id_trx=<?= $user_data['id_trx']; ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $total_jumlah += $user_data['jml_jual'];
                                                $total_semua += $user_data['total'];
                                                $sql2 = "SELECT COUNT(stok.nama_stk) as nama FROM jual INNER JOIN stok ON stok.id_stk=jual.id_stk WHERE jual.id_trx='$id' GROUP BY jual.id_trx";
                                                $tst = mysqli_query($koneksi, $sql2);
                                                while ($data2 = mysqli_fetch_assoc($tst)) {
                                                    $jml = $data2['nama'];
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
                                    <h6 class="m-0 font-weight-bold text-primary">Transaksi Sebelumnya</h6>
                                </div>
                                <?php
                                $code10 = mysqli_query($koneksi, "SELECT*FROM transaksi where id_trx='$id'");
                                $data10 = mysqli_fetch_array($code10);
                                ?>
                                <div class="card-body">
                                    <div class="row mb-1">
                                        <label class="col-lg-4">Total Semua</label>
                                        <div class="col-sm-5">
                                            <input type="text" readonly="readonly" class="form-control" id="atotal" name="atotal" value="<?php echo $data10['total']; ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <label class="col-lg-4">Total Semua</label>
                                        <div class="col-sm-5">
                                            <input type="number" readonly="readonly" class="form-control" id="abayar" name="abayar" autocomplete="off" value="<?php echo $data10['bayar']; ?>">
                                        </div>
                                    </div>
                                    <div class=" row mb-1">
                                        <label class="col-lg-4 ">Kembali</label>
                                        <div class="col-sm-5">
                                            <input type="text" readonly="readonly" class="form-control" id="akembali" name="akembali" value="<?php echo $data10['kembalian']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-1">
                            </div>
                            <div class=" col-sm-5 border-left ">
                                <form method="POST" action="update-data-transaksi.php">
                                    <div class="row mb-1">
                                        <label class="col-lg-4">Total Semua</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="total" onkeyup="kembali();" name="total" value="<?php echo $total_semua; ?>">
                                        </div>
                                        <?php
                                        $data = mysqli_query($koneksi, "SELECT transaksi.tgl_trx,jual.id_jual,jual.id_trx,stok.id_jenis,stok.id_satuan,stok.nama_stk,jual.jml_jual,stok.id_stk ,SUM(jual.jml_jual*stok.hrg_jual)as total  FROM jual INNER JOIN stok on stok.id_stk=jual.id_stk JOIN user ON user.id_user=jual.id_user JOIN transaksi ON transaksi.id_trx=jual.id_trx WHERE jual.id_trx='$id' GROUP BY jual.id_jual");
                                        $user_data = mysqli_fetch_array($data)
                                        ?>
                                        <input type="text" id="jml_total" name="jml_total" value="<?= $total_jumlah; ?>">
                                        <input type="text" id="total" name="total" value="<?= $total_semua; ?>">
                                        <input type="text" id="kode" name="kode" value="<?= $id; ?>">
                                        <input type="text" id="jml" name="jml" value="<?= $jml; ?>">

                                        <input type="text" class="form-control" onkeyup="kembali();" id="balik" name="balik">
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-lg-4">Bayar</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" onkeyup="kembali();" id="bayar" name="bayar" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-mt-6">
                                        <button type=" input" name="update" class="btn btn-primary ">Submit</button>
                                    </div>
                                </form>
                                <div class="row mb-1">
                                    <label class="col-lg-4 ">Kembali</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" onkeyup="kembali();" id="kembali" name="kembali">
                                    </div>
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