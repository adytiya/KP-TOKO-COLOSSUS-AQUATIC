 <?php
    $code = "SELECT SUM(harga_beli*stok) as byr FROM stok";
    $sql = mysqli_query($koneksi, $code);
    $data = mysqli_fetch_array($sql);
    $modal = $data['byr'];



    $code2 = "SELECT SUM(jumlah) as terjual FROM transaksi";
    $sql2 = mysqli_query($koneksi, $code2);
    $data2 = mysqli_fetch_array($sql2);
    $terjual = $data2['terjual'];

    $code3 = "SELECT COUNT(DISTINCT jenis ) as stok FROM stok";
    $sql3 = mysqli_query($koneksi, $code3);
    $data3 = mysqli_fetch_array($sql3);
    $jml_jenis = $data3['stok'];

    $code4 = "SELECT COUNT(nama_stok) as nama FROM stok where satuan='KG'";
    $sql4 = mysqli_query($koneksi, $code4);
    $data4 = mysqli_fetch_array($sql4);
    $jml_jenis_ikan = $data4['nama'];

    $tgl = date("Y-m-d");
    $code5 =  "SELECT SUM(total)as total  FROM nota WHERE tanggal LIKE '%$tgl%'";
    $sql5 = mysqli_query($koneksi, $code5);
    $data5 = mysqli_fetch_array($sql5);
    $harian = $data5['total'];

    $code6 = "SELECT COUNT(jenis) as nama FROM stok ";
    $sql6 = mysqli_query($koneksi, $code6);
    $data6 = mysqli_fetch_array($sql6);
    $jml_jenis_brng = $data6['nama'];

    $code7 = "SELECT SUM(stok) as stok FROM stok ";
    $sql7 = mysqli_query($koneksi, $code7);
    $data7 = mysqli_fetch_array($sql7);
    $jml_stok_brg = $data7['stok'];

    $code8 = "SELECT * FROM stok where stok > 5 ";
    $sql8 = mysqli_query($koneksi, $code8);
    $data8 = mysqli_fetch_array($sql8);
    $jml_stok_kurang = $data8['stok'];

    $code1 = "SELECT SUM(nota.total-stok.harga_beli) as keuntungan FROM nota INNER JOIN stok ON stok.id_stok=nota.id_stok JOIN transaksi ON transaksi.id_trx=nota.id_trx";
    $sql1 = mysqli_query($koneksi, $code1);
    $data1 = mysqli_fetch_array($sql1);
    $keuntungan = $data1['keuntungan'];

    $code9 = "SELECT nama_stok FROM `nota` GROUP BY nama_stok ORDER by jumlah DESC";
    $sql9 = mysqli_query($koneksi, $code9);

    $code10 = "SELECT SUM(jumlah) as jumlah FROM `nota` GROUP BY nama_stok ORDER by jumlah DESC";
    $sql10 = mysqli_query($koneksi, $code10);
    ?>

