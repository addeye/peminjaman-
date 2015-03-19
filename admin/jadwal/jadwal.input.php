<?php
include "../../koneksi/conn.php";
include "../../fungsi/mk.php";

// buat koneksi ke database mysql

// proses menghapus data pengurus
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM jadwal WHERE ID_JADWAL='$_POST[hapus]'");
} else {
	// deklarasikan variabel
	$id_jdwl = $_POST['id'];
	$prodi	= $_POST['prodi'];
	$kelas	= $_POST['kelas'];
	$angkatan	= $_POST['angkatan'];
	$semester	= $_POST['semester'];
	$thajaran	= $_POST['thajaran'];
	$hari	= $_POST['hari'];
	$jam	= $_POST['jam'];
	$gedung	= $_POST['gedung'];
	$lantai	= $_POST['lantai'];
	$noruang 	= $_POST['noruang'];
	$mk	= $_POST['mk'];

	$dosen	= $_POST['dosen'];
	$asstdosen	= $_POST['asstdosen'];

//fungsi pengambilan nama mata kuliah berdasarkan kode mata kuliah 	
	$matakuliah = matakuliah($mk);
//fungsi pengambilan sks berdasarkan mata kuliah
	$sks= sks($mk);
	
	// validasi agar tidak ada data yang kosong
	if($prodi!="" && $angkatan!="" && $kelas!="" &&  $semester!=""&& $thajaran!="" && $hari!="" &&  $jam!="" ) {
		// proses tambah data pengurus
		if($id_jdwl == 0) {
			mysqli_query($sqli,"INSERT INTO `jadwal`(`ID_JADWAL`, `PRODI`, `KELAS`, 
			`ANGKATAN`, `SEMESTER`, `THAJARAN`, `HARI`, `JAM`, 
			`GEDUNG`, `LANTAI`, `NO_RUANG`, `KODE_MK`, 
			`MATA_KULIAH`, `SKS`, `NAMA_DOSEN`, `NAMA_ASST`) VALUES
			 ('',
			 '$prodi',
			 '$kelas',
			 '$angkatan',
			 '$semester',
			 '$thajaran',
			 '$hari',
			 '$jam',
			 '$gedung',
			 '$lantai',
			 '$noruang',
			 '$mk',
			 '$matakuliah',
			 '$sks',
			 '$dosen',
			 '$asstdosen')") ;
		// proses ubah data jadwal
		} else {
			mysqli_query($sqli,"UPDATE jadwal SET 
			PRODI =  '$prodi',
			KELAS = '$kelas',
			ANGKATAN = '$angkatan',
			SEMESTER = '$semester',
			THAJARAN = '$thajaran',
			HARI = '$hari',
			JAM = '$jam',
			GEDUNG = '$gedung',
			LANTAI = '$lantai',
			NO_RUANG = '$noruang',
			KODE_MK = '$mk',
 			MATA_KULIAH = '$matakuliah',
			SKS = '$sks',
			NAMA_DOSEN = '$dosen',
			NAMA_ASST = '$asstdosen'
			WHERE ID_jadwal = $id_jdwl
			");
		}
	}
}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
