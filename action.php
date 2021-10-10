<?php
require 'koneksi.php';


if(isset($_POST['query'])){
	$inpText=$_POST['query'];
	$query="SELECT nama_ikan FROM stk_ikn WHERE nama_ikan LIKE '%$inpText%'";
	$result=$koneksi->query($query);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			echo "<a href='#'class='list-group-item list-group-item-action'>".$row['nama_ikan']."</a>";
		}
	}
else{
	echo"<p class='list-group-item border-1'>tidak ada</p>";
}
}

?>