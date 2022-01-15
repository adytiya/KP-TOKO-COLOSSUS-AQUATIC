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

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <h1 class="h3 d-none d-sm-inline-block ">Selamat Datang
                    <?= $_SESSION['nama']; ?></h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Barang terjual</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $terjual; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Barang</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_stok_brg; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Earnings (Monthly) Card Example -->


                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Jumlah Jenis</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_jenis ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <?php
                        //mengenalkan variabel teks
                        $sqlperiode = " ";
                        $awaltgl = " ";
                        $akhirtgl = " ";
                        $tglawal = " ";
                        $tglakhir = " ";

                        if (isset($_POST['btntampilkan'])) {
                            $tglawal = isset($_POST['txttglawal']) ? $_POST['txttglawal'] : "01-" . date('m-Y');
                            $tglakhir = isset($_POST['txttglakhir']) ? $_POST['txttglakhir'] : date('d-m-Y');
                            $sqlperiode = "WHERE nota.tanggal BETWEEN '" . $tglawal . "' AND '" . $tglakhir . "' ";
                        } else {
                            $awaltgl = "01-" . date('m-Y');
                            $akhirtgl = date('d-m-Y');
                            $sqlperiode = "WHERE nota.tanggal BETWEEN '" . $tglawal . "' AND '" . $tglakhir . "' ";
                        }
                        ?>
                        <div class="card-header py-3">
                            <h4>Periode tanggal <b><?php echo $tglawal; ?></b> s/d <b><?php echo $tglakhir; ?></b></h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" target="_self">

                                <div class="row py-3">
                                    <div class="col-lg-3">
                                        <input name="txttglawal" type="date" class="form-control" value=<?php echo $tglawal; ?> size="10">
                                    </div>
                                    <div class="col-lg-3">
                                        <input name="txttglakhir" type="date" class="form-control" value="<?php echo $tglakhir; ?>">
                                    </div>
                                    <div>
                                        <div class="col-lg-2">
                                            <input type="submit" name="btntampilkan" class="btn btn-success" value="tampilkan">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>ID_transaksi</th>
                                            <th>Total</th>
                                            <th>keuntungan</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                        $SQL = "SELECT nota.tanggal,nota.id_trx,transaksi.jumlah,transaksi.total,transaksi.bayar,transaksi.kembali,SUM(nota.total-stok.harga_beli) as keuntungan,  nota.admin FROM nota INNER JOIN stok ON stok.id_stok=nota.id_stok JOIN transaksi ON transaksi.id_trx=nota.id_trx $sqlperiode GROUP by id_trx ";
                                        $data = mysqli_query($koneksi, $SQL);
                                        $no = 1;
                                        $jumlahtotal = 0;
                                        $jumlahtotal2 = 0;
                                        while ($user_data = mysqli_fetch_array($data)) {
                                            $jumlahtotal += $user_data['keuntungan'];
                                            $jumlahtotal2 += $user_data['keuntungan'];
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $user_data['tanggal']; ?></td>
                                                <td><?php echo $user_data['id_trx']; ?></td>
                                                <td>Rp.<?= number_format($user_data['total'], 0, ',', '.'); ?></td>
                                                <td>Rp.<?= number_format($user_data['keuntungan'], 0, ',', '.'); ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div>
                                    <h3> Total keuntungan = Rp.<?= number_format($jumlahtotal, 0, ',', '.'); ?></h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Barang terjual</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4">
                                <canvas id="myPieChart"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Barang Terlaris</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>Nama</th>
                                            <th>Terjual</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'koneksi.php';
                                        $code9 = "SELECT nama_stok,SUM(jumlah) as jumlah FROM `nota` GROUP BY nama_stok ORDER by jumlah DESC";
                                        $data = mysqli_query($koneksi, $code9);
                                        $no = 1;
                                        while ($user_data = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <th><?php echo $user_data['nama_stok'] ?></th>
                                                <th><?php echo $user_data['jumlah'] ?></th>
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
                <div class="col-lg-6 mb-4">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Stok Yang Terkecil</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>Nama</th>
                                            <th>Sisa Stok</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'koneksi.php';
                                        $code9 = "SELECT nama_stok,stok FROM stok WHERE stok <= 2";
                                        $data = mysqli_query($koneksi, $code9);
                                        $no = 1;
                                        while ($user_data = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <th><?php echo $user_data['nama_stok'] ?></th>
                                                <th><?php echo $user_data['stok'] ?></th>
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

            </div>

        </div>


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
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script type="text/javascript">
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [<?php while ($p = mysqli_fetch_array($sql9)) {
                                echo '"' . $p['nama_stok'] . '",';
                            } ?>],
                datasets: [{
                    data: [<?php while ($p = mysqli_fetch_array($sql10)) {
                                echo '"' . $p['jumlah'] . '",';
                            } ?>],
                    backgroundColor: ['#00ffbf', '#00ffff', '#00bfff', '#0080ff', '#0040ff', '#0000ff', '#4000ff', '#8000ff', '#bf00ff', '#ff00ff'],

                }],
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>


    <script type="text/javascript">
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Earnings",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '$' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });
    </script>


    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>


</body>

</html>