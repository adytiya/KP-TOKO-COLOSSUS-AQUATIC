<?php
include 'koneksi.php';
include 'cek-sesi.php';
include 'view.php';
include 'head.php';

?>
<html>


<head>
    <title>Colossus Aquatic</title>
</head>

<body>

    <center>

        <h2>Laporan Penjualan Harian</h2>

    </center>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID_transaksi</th>
                    <th>Nama Ikan</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                    <th>Admin</th>


                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                $tgl = date("j F Y");
                $data = mysqli_query($koneksi, "SELECT * FROM nota WHERE tanggal LIKE '%$tgl%'");
                while ($user_data = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $user_data['id_trs']; ?></td>
                        <td><?php echo $user_data['nama_ikan']; ?></td>
                        <td><?php echo $user_data['jumlah']; ?></td>
                        <td><?php echo $user_data['total']; ?></td>
                        <td><?php echo $user_data['tanggal']; ?></td>
                        <td><?php echo $user_data['admin']; ?></td>
                    </tr>

            </tbody>
        <?php
                }
        ?>
        </table>
        <?php

        $tgl = date("j F Y");
        $data = mysqli_query($koneksi, "SELECT SUM(total)as total  FROM nota WHERE tanggal LIKE '%$tgl%'");
        while ($user_data = mysqli_fetch_array($data)) { ?>
            <h5 name='modal'> Pemasukan Per tanggal <?php echo $tgl; ?> = Rp. <?= number_format($user_data['total'], 0, ',', '.'); ?></h5>
        <?php
        }
        ?>
        <?php

        $tgl = date("j F Y");
        $data = mysqli_query($koneksi, "SELECT SUM(jumlah)as jumlah  FROM nota WHERE tanggal LIKE '%$tgl%'");
        while ($user_data = mysqli_fetch_array($data)) { ?>
            <h5 name='modal'> Jumlah Ikan Yang Terjual Per tanggal <?php echo $tgl; ?> = <?php echo $user_data['jumlah'] ?> Ekor</h5>
        <?php
        }
        ?>
    </div>
</body>
<script>
    window.print();
    window.close();
</script>

</html>