 <?php
    $code1 = "SELECT SUM(nota.total-stok.harga_beli) as keuntungan FROM nota INNER JOIN stok ON stok.id_stok=nota.id_stok JOIN transaksi ON transaksi.id_trx=nota.id_trx";
    $sql1 = mysqli_query($koneksi, $code1);


    ?>