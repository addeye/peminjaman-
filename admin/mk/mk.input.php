<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data dosen
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM mk WHERE ID_MK='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_mk = $_POST['id'];
	$kdmk	= $_POST['kdmk'];
	$mk	= $_POST['mk'];
	$sks	= $_POST['sks'];


	
	// validasi agar tidak ada data yang kosong
	if( $mk!="" && $sks!="") {
		// proses tambah data dosen
		if($id_mk == 0) {
			mysqli_query($sqli,"INSERT INTO mk 
			(`ID_MK`,`KODE_MK`, `MATA_KULIAH`, `SKS`)
			 VALUES
			 ('','$kdmk','$mk','$sks')") ;
		// proses ubah data dosen
		} else {
			mysqli_query($sqli,"UPDATE mk SET 
			KODE_MK = '$kdmk',
			MATA_KULIAH = '$mk',
			SKS = '$sks'

			WHERE ID_MK = $id_mk
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
