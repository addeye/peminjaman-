<?php
include "../../koneksi/conn.php";

$folder='denahruang';
$tmp_name = $_FILES['denah']['tmp_name'];
$filetype= $_FILES['denah']['type'];
$filesize= $_FILES['denah']['size'];
$name= "../../".$folder ."/".$_FILES['denah']['name'];
$nam_save="../../".$folder."/".$_FILES['denah']['name'];
$nam_rubah = "../../".$folder."/".$_POST['id'].".jpg";

if($filetype != "image/jpg" && $filetype != "image/jpeg" && $filetype != "image/png"){
	echo '<script language="javascript">alert("File Yang Di Izinkan Hanya jpg,jpeg,png")</script>';
	include "ruangan.php";
	} else {

move_uploaded_file($tmp_name, $name);
 $query = mysqli_query($sqli,"select * from `ruangan` WHERE `ID_RUANGAN`='$_POST[id]'");
$r=mysql_fetch_array($query);

//hapus gambar sebelumnya
unlink($r['DENAH_KELAS']);
//ganti nama
rename($nam_save,$nam_rubah);

 $queryu= mysqli_query($sqli,"UPDATE `ruangan` SET `DENAH_KELAS`='$nam_rubah' WHERE `ID_RUANGAN`='$_POST[id]'");

if($queryu){ header('Location: ruangan.php');} else {echo '<script language="javascript">alert("Gagal Upload")</script>';
	echo "gagal";}
	}
 ?>