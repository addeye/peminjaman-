<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data pengurus
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM pengurus WHERE ID_PENGURUS='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_pgr = $_POST['id'];
	$nip	= $_POST['nip'];
	$nama	= $_POST['nama'];
	$password	= $_POST['password'];

	$status = $_POST['status'];
	
	// validasi agar tidak ada data yang kosong
	if($nip!="" && $nama!="" && $password!="" &&  $status!="") {
		// proses tambah data pengurus
		if($id_pgr == 0) {
			mysqli_query($sqli,"INSERT INTO pengurus 
			(`ID_PENGURUS`, `NIP_PENGURUS`, `NAMA_PENGURUS`, `PASSWORD`, `ID_STATUS`)
			 VALUES
			 ('','$nip','$nama','$password','$status')") ;
		// proses ubah data pengurus
		} else {
			mysqli_query($sqli,"UPDATE pengurus SET 
			NIP_PENGURUS = '$nip',
			NAMA_PENGURUS = '$nama',
			PASSWORD = '$password',
			ID_STATUS = '$status'
			WHERE ID_PENGURUS = $id_pgr
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
