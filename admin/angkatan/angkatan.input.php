<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data dosen
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM angkatan WHERE ID_ANGKATAN='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_angkatan = $_POST['id'];
	$angkatan	= $_POST['angkatan'];



	
	// validasi agar tidak ada data yang kosong
	if($angkatan!="" ) {
		// proses tambah data dosen
		if($id_mk == 0) {
			mysqli_query($sqli,"INSERT INTO angkatan 
			(`ID_ANGKATAN`,`ANGKATAN`)
			 VALUES
			 ('','$angkatan')") ;
		// proses ubah data dosen
		} else {
			mysqli_query($sqli,"UPDATE angkatan SET 
			ANGKATAN = '$angkatan'

			WHERE ID_ANGKATAN = $id_angkatan
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
