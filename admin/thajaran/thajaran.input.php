<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data dosen
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM tahun_ajaran WHERE ID_THAJARAN='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_thajaran = $_POST['id'];
	$thajaran	= $_POST['thajaran'];



	
	// validasi agar tidak ada data yang kosong
	if($thajaran!="" ) {
		// proses tambah data dosen
		if($id_thajaran == 0) {
			mysqli_query($sqli,"INSERT INTO tahun_ajaran 
			(`ID_THAJARAN`,`TAHUN_AJARAN`)
			 VALUES
			 ('','$thajaran')") ;
		// proses ubah data dosen
		} else {
			mysqli_query($sqli,"UPDATE tahun_ajaran SET 
			TAHUN_AJARAN = '$thajaran',


			WHERE ID_THAJARAN = $id_thajaran
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
