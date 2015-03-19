<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data dosen
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM noruang WHERE ID_NORUANG='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_noruang = $_POST['id'];
	$noruang	= $_POST['noruang'];



	
	// validasi agar tidak ada data yang kosong
	if($noruang!="" ) {
		// proses tambah data dosen
		if($id_noruang == 0) {
			mysqli_query($sqli,"INSERT INTO noruang 
			(`ID_NORUANG`,`NO_RUANG`)
			 VALUES
			 ('','$noruang')") ;
		// proses ubah data dosen
		} else {
			mysqli_query($sqli,"UPDATE noruang SET 
			
			NO_RUANG = '$noruang'
			

			WHERE ID_NORUANG = $id_noruang
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
