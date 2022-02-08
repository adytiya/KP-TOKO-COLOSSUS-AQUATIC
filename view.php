 <?php
   $code = "SELECT SUM(hrg_beli*stok) as byr FROM stok";
   $sql = mysqli_query($koneksi, $code);
   $data = mysqli_fetch_array($sql);
   $modal = $data['byr'];

   $code2 = "SELECT SUM(jml_total) as terjual FROM transaksi";
   $sql2 = mysqli_query($koneksi, $code2);
   $data2 = mysqli_fetch_array($sql2);
   $terjual = $data2['terjual'];

   $code3 = "SELECT COUNT(DISTINCT id_jenis ) as stok FROM jenis";
   $sql3 = mysqli_query($koneksi, $code3);
   $data3 = mysqli_fetch_array($sql3);
   $jml_jenis = $data3['stok'];

   $code7 = "SELECT SUM(stok) as stok FROM stok ";
   $sql7 = mysqli_query($koneksi, $code7);
   $data7 = mysqli_fetch_array($sql7);
   $jml_stok_brg = $data7['stok'];

   $code8 = "SELECT * FROM stok where stok > 5 ";
   $sql8 = mysqli_query($koneksi, $code8);
   $data8 = mysqli_fetch_array($sql8);
   $jml_stok_kurang = $data8['stok'];

   $code1 = "SELECT  transaksi.id_trx,transaksi.tgl_trx,SUM((jual.jml_jual*stok.hrg_jual)-(jual.jml_jual*stok.hrg_beli))as keuntungan FROM jual INNER JOIN stok on stok.id_stk=jual.id_stk JOIN transaksi on transaksi.id_trx=jual.id_trx  GROUP BY transaksi.id_trx";
   $sql1 = mysqli_query($koneksi, $code1);
   $data1 = mysqli_fetch_array($sql1);
   $keuntungan = $data1['keuntungan'];

   $code9 = "SELECT stok.nama_stk,SUM(jual.jml_jual) as jumlah from jual INNER JOIN stok on stok.id_stk=jual.id_stk GROUP BY stok.id_stk";
   $sql9 = mysqli_query($koneksi, $code9);

   $code10 = "SELECT SUM(jual.jml_jual) as jumlah from jual INNER JOIN stok on stok.id_stk=jual.id_stk GROUP BY stok.id_stk";
   $sql10 = mysqli_query($koneksi, $code10);


   ?>

