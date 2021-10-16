<?php
include 'koneksi.php';


?>
<html>


<head>

</head>

<body>

    <center>

        <h2>DATA LAPORAN BARANG</h2>

    </center>

    <?php
    include 'koneksi.php';
    ?>

    <table align='center' cellspacing='1' style='width:300px; font-size:15pt; font-family:calibri;  border-collapse: collapse;' border='1'>
        <thead>
            <tr align='center'>
                <td width='1%'>No</td>
                <td width='15%'>Nama Ikan</td>
                <td width='4%'>Qty</td>
                <td width='20%'>Harga</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = "SELECT*FROM transaksi ORDER BY jumlah  DESC LIMIT 1";
            $result = $koneksi->query($sql);
            $row = $result->fetch_assoc();
            $jumlah = $row['jumlah'];
            $data = mysqli_query($koneksi, "SELECT * FROM nota ORDER BY id_trs DESC LIMIT $jumlah");
            while ($user_data = mysqli_fetch_array($data)) {
            ?>
                <tr align='left'>
                    <th align='center'><?php echo $no++ ?></th>
                    <th><?php echo $user_data['nama_ikan'] ?></th>
                    <th align='center'><?php echo $user_data['jumlah'] ?></th>
                    <th>Rp. <?= number_format($user_data['total'], 0, ',', '.'); ?> </th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <table>
        <?php
        $data1 = mysqli_query($koneksi, "SELECT * FROM transaksi ");
        while ($user_data1 = mysqli_fetch_array($data1)) {
        ?>

            <tbody>
                <tr>
                    <th><?php echo $user_data1['total'] ?> </th>
                    <th><?php echo $user_data1['bayar'] ?> </th>
                    <th><?php echo $user_data1['kembali'] ?> </th>
                </tr>

            </tbody>
        <?php
        }
        ?>
    </table>

</body>

</html>