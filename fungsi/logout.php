<?php 
session_start();
if(isset($_POST['keluar'])){
$_SESSION['nama']="";
$_SESSION['id']="";
session_destroy();
echo '<META HTTP-EQUIV="Refresh" content =" 0; URL= ../index.php">';}
else {echo "gagal logout";}
?>