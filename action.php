<?php
require 'koneksi.php';
//mencari data yang sesuai dengan yang diketik

if (isset($_POST['query'])) {
	$inpText = $_POST['query'];
	$query = "SELECT * FROM stok WHERE nama_stok LIKE '%$inpText%'";
	$result = $koneksi->query($query);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo "<a href='#'class='list-group-item list-group-item-action'>" . $row['nama_stok'] . "</a>";
		}
	} else {
		echo "<p class='list-group-item border-1'>tidak ada</p>";
	}
}
