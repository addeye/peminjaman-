<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data dosen
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM fungsi_ruangan WHERE ID_FUNGRU='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_fungru = $_POST['id'];
	$fungru	= $_POST['fungru'];



	
	// validasi agar tidak ada data yang kosong
	if($fungru!="" ) {
		// proses tambah data dosen
		if($id_fungru == 0) {
			mysqli_query($sqli,"INSERT INTO fungsi_ruangan 
			(`ID_FUNGRU`,`FUNGSI_RUANGAN`)
			 VALUES
			 ('','$fungru')") ;
		// proses ubah data dosen
		} else {
			mysqli_query($sqli,"UPDATE fungsi_ruangan SET 
			FUNGSI_RUANGAN = '$fungru'


			WHERE ID_FUNGRU = $id_fungru
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
