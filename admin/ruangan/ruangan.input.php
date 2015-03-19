<?php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql

// proses menghapus data pengurus
if(isset($_POST['hapus'])) {
	mysqli_query($sqli,"DELETE FROM ruangan WHERE ID_RUANGAN='$_POST[hapus]'");
} else {
	// deklarasikan variabel
 $id_ruangan = $_POST['id'];
 $gedung	= $_POST['gedung'];
	$lantai	= $_POST['lantai'];
	$noruang	= $_POST['noruang'];
	$kapasitas	= $_POST['kapasitas'];
	$fungru	= $_POST['fungru'];



	
/*	$folder='../../denahruang';
$tmp_name = $_FILES['denah']['tmp_name'];
$filetype= $_FILES['denah']['type'];
$filesize= $_FILES['denah']['size'];
$name= $folder."/".$_FILES['denah']['name'];
$nam_save=$folder."/".$_FILES['denah']['name'];
$nam_rubah = $folder."/".$gedung.".jpg";
*/

	// validasi agar tidak ada data yang kosong
	if($gedung!="" && $lantai!="" && $noruang!="" &&  $kapasitas!="" && $fungru!=""  ) {
		// proses tambah data pengurus
		if($id_ruangan == 0) {
			
/*			move_uploaded_file($tmp_name, $name);
			rename($nam_save,$nam_rubah);*/
			
			mysqli_query($sqli,"INSERT INTO `ruangan`(`ID_RUANGAN`, `ID_GEDUNG`, `ID_LANTAI`, `ID_NORUANG`, `KAPASITAS`, `ID_FUNGRU`, `DENAH_KELAS`) VALUES 
			 ('','$gedung','$lantai','$noruang','$kapasitas','$fungru','')") ;
		// proses ubah data ruangan
		} else {
			mysqli_query($sqli,"UPDATE `ruangan` SET `ID_GEDUNG`='$gedung',`ID_LANTAI`='$lantai',`ID_NORUANG`='$noruang',`KAPASITAS`='$kapasitas',`ID_FUNGRU`='$fungru'
				
			WHERE ID_RUANGAN = $id_ruangan
			");
		}
	}

}

// tutup koneksi ke database mysql

$sqli->close(); 


?>
