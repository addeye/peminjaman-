<?php 

function matakuliah($a){
	include "../../koneksi/conn.php";
	$que= mysqli_query($sqli,"SELECT * FROM mk where KODE_MK='$a' ");
$k=mysqli_fetch_array($que);
$mk=$k['MATA_KULIAH'];
 return $mk;
	}
	function sks($b){
		include "../../koneksi/conn.php";
	$que= mysqli_query($sqli,"SELECT * FROM mk where KODE_MK='$b'");
$k=mysqli_fetch_array($que);
$sks=$k['SKS'];
 return $sks;
	}
 
?>