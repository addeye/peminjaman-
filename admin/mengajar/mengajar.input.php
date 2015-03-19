<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data mengajar
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM mengajar WHERE ID_MENGAJAR='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_mngjr = $_POST['id'];
	$dosen	= $_POST['dosen'];
	$mk	= $_POST['mk'];
	$semester	= $_POST['semester'];
	$thajaran	= $_POST['thajaran'];

	
	// validasi agar tidak ada data yang kosong
	if( $dosen!="" && $mk!="" && $semester!=""&& $thajaran!="" ) {
		// proses tambah data mengajar
		if($id_mngjr == 0) {
			mysqli_query($sqli,"INSERT INTO mengajar 
			(`ID_MENGAJAR`,`ID_DOSEN`, `ID_MK`, `ID_SEMESTER`, `ID_THAJARAN`)
			 VALUES
			 ('','$dosen','$mk','$semester','$thajar')");
		// proses ubah data mengajar
		} else {
			mysqli_query($sqli,"UPDATE mengajar SET 

			ID_DOSEN = '$dosen',
			ID_MK = '$mk',
			ID_SEMESTER = '$semester',
			ID_THAJARAN = '$thajaran'
			WHERE ID_MENGAJAR = $id_mngjr
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
