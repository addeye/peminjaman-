<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data dosen
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM fakultas WHERE ID_FAKULTAS='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_fakultas = $_POST['id'];
	$fakultas	= $_POST['fakultas'];



	
	// validasi agar tidak ada data yang kosong
	if($fakultas!="" ) {
		// proses tambah data dosen
		if($id_mk == 0) {
			mysqli_query($sqli,"INSERT INTO fakultas 
			(`ID_FAKULTAS`,`FAKULTAS`)
			 VALUES
			 ('','$fakultas')") ;
		// proses ubah data dosen
		} else {
			mysqli_query($sqli,"UPDATE fakultas SET 
			FAKULTAS = '$fakultas'

			WHERE ID_FAKULTAS = $id_fakultas
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
