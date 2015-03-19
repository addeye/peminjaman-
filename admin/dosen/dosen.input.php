<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data dosen
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM dosen WHERE ID_DOSEN='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_dsn = $_POST['id'];
	$nip	= $_POST['nip'];
	$nama	= $_POST['nama'];
	$password	= $_POST['password'];

	$status = $_POST['status'];
	
	// validasi agar tidak ada data yang kosong
	if($nip!="" && $nama!="" && $password!="" &&  $status!="") {
		// proses tambah data dosen
		if($id_dsn == 0) {
			mysqli_query($sqli,"INSERT INTO dosen 
			(`ID_DOSEN`, `NIP_DOSEN`, `NAMA_DOSEN`, `PASSWORD`, `ID_STATUS`)
			 VALUES
			 ('','$nip','$nama','$password','$status')") ;
		// proses ubah data dosen
		} else {
			mysqli_query($sqli,"UPDATE dosen SET 
			NIP_DOSEN = '$nip',
			NAMA_DOSEN = '$nama',
			PASSWORD = '$password',
			ID_STATUS = '$status'
			WHERE ID_DOSEN = $id_dsn
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
