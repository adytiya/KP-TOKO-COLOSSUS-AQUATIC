 <?php
  $code = "SELECT SUM(harga_beli*stok) as byr FROM stk_ikn";
  $sql = mysqli_query($koneksi, $code);
  $data = mysqli_fetch_array($sql);
  $modal = $data['byr'];

  $code1 = "SELECT SUM(total) as untung FROM transaksi";
  $sql1 = mysqli_query($koneksi, $code1);
  $data1 = mysqli_fetch_array($sql1);
  $untung = $data1['untung'];

  $code2 = "SELECT SUM(jumlah) as terjual FROM transaksi";
  $sql2 = mysqli_query($koneksi, $code2);
  $data2 = mysqli_fetch_array($sql2);
  $terjual = $data2['terjual'];

  $code3 = "SELECT SUM(stok) as stok FROM stk_ikn";
  $sql3 = mysqli_query($koneksi, $code3);
  $data3 = mysqli_fetch_array($sql3);
  $jml_stok = $data3['stok'];

  $code4 = "SELECT COUNT(nama_ikan) as nama FROM stk_ikn";
  $sql4 = mysqli_query($koneksi, $code4);
  $data4 = mysqli_fetch_array($sql4);
  $jml_nm = $data4['nama'];

  $tgl = date("Y-m-d");
  $code5 =  "SELECT SUM(total)as total  FROM nota WHERE tanggal LIKE '%$tgl%'";
  $sql5 = mysqli_query($koneksi, $code5);
  $data5 = mysqli_fetch_array($sql5);
  $harian = $data5['total'];
  ?>