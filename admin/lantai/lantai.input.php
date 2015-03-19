<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data lantai
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM lantai WHERE ID_lantai='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_lantai = $_POST['id'];
	$lantai	= $_POST['lantai'];



	
	// validasi agar tidak ada data yang kosong
	if($lantai!="" ) {
		// proses tambah data dosen
		if($id_lantai == 0) {
			mysqli_query($sqli,"INSERT INTO lantai 
			(`ID_LANTAI`,`LANTAI`)
			 VALUES
			 ('','$lantai')") ;
		// proses ubah data dosen
		} else {
			mysqli_query($sqli,"UPDATE lantai SET 
			
			LANTAI = '$lantai'
			

			WHERE ID_LANTAI = $id_lantai
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
