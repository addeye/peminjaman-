<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data mahasiswa
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM mahasiswa WHERE ID_MAHASISWA='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_mhs=$_POST['id'];
	$nim	= $_POST['nim'];
	$nama	= $_POST['nama'];
	$password	= $_POST['password'];
	$kelas	= $_POST['kelas'];
	$angkatan	= $_POST['angkatan'];
	$jurusan	= $_POST['jurusan'];
	$prodi	= $_POST['prodi'];
	$status = $_POST['status'];
	
	// validasi agar tidak ada data yang kosong
	if($nim!="" && $nama!="" && $password!=""&& $kelas!=""&& $jurusan!=""&& $prodi!=""&& $status!=""&& $angkatan!="") {
		// proses tambah data mahasiswa
		if($id_mhs == 0) {
			mysqli_query($sqli,"INSERT INTO mahasiswa 
			(`ID_MAHASISWA`, `ID_JURUSAN`, `ID_PRODI`, `ID_KELAS`,`ID_ANGKATAN`, `NIM_MAHASISWA`, `NAMA_MAHASISWA`, `PASSWORD`, `ID_STATUS`)
			 VALUES
			 ('','$jurusan','$prodi','$kelas','$angkatan','$nim','$nama','$password','$status')");
		// proses ubah data mahasiswa
		} else {
			mysqli_query($sqli,"UPDATE mahasiswa SET 
			NIM_MAHASISWA = '$nim',
			NAMA_MAHASISWA = '$nama',
			PASSWORD = '$password',
			ID_PRODI = '$prodi',
			ID_JURUSAN = '$jurusan',
			ID_KELAS = '$kelas',
			ID_ANGKATAN = '$angkatan',
			ID_STATUS = '$status'
			WHERE ID_MAHASISWA = $id_mhs
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
