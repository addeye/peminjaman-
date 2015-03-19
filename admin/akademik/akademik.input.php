<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data mengajar
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM akademik WHERE ID_AKADEMIK='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_akademik = $_POST['id'];
	$fakultas	= $_POST['fakultas'];
	$jurusan	= $_POST['jurusan'];
	$angkatan	= $_POST['angkatan'];
	
	
	// validasi agar tidak ada data yang kosong
	if( $fakultas!="" && $jurusan!="" && $angkatan!="") {
		// proses tambah data mengajar
		if($id_akademik == 0) {
			mysqli_query($sqli,"INSERT INTO akademik 
			(`ID_AKADEMIK`,`ID_FAKULTAS`, `ID_JURUSAN`, `ID_ANGKATAN`)
			 VALUES
			 ('','$fakultas','$jurusan','$angkatan')");
		// proses ubah data mengajar
		} else {
			mysqli_query($sqli,"UPDATE akademik SET 

			ID_FAKULTAS = '$fakultas',
			ID_JURUSAN = '$jurusan',
			ID_ANGKATAN = '$angkatan'
			
			WHERE ID_AKADEMIK = $id_akademik
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
