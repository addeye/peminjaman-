<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data dosen
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM gedung WHERE ID_GEDUNG='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_gedung = $_POST['id'];
	$gedung	= $_POST['gedung'];



	
	// validasi agar tidak ada data yang kosong
	if($gedung!="" ) {
		// proses tambah data dosen
		if($id_gedung == 0) {
			mysqli_query($sqli,"INSERT INTO gedung 
			(`ID_GEDUNG`,`GEDUNG`)
			 VALUES
			 ('','$gedung')") ;
		// proses ubah data dosen
		} else {
			mysqli_query($sqli,"UPDATE gedung SET 
			
			GEDUNG = '$gedung'
			

			WHERE ID_GEDUNG = $id_gedung
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
