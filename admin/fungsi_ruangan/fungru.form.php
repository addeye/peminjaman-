<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mhs
$id_fungru = $_POST['id'];

// query untuk menampilkan dosen berdasarkan id_mhs
$data = mysqli_fetch_array(mysqli_query($sqli,"SELECT * FROM fungsi_ruangan WHERE ID_FUNGRU= '$id_fungru'"
));


// jika id_mk > 0 / form ubah data
if($id_fungru> 0) { 
    $fungru = $data['FUNGSI_RUANGAN'];


	
	


//form tambah data
} else {

	$fungru ="";



}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-fungru">
	<div class="control-group">
		<label class="control-label" for="fungru">Fungsi Ruangan</label>
		<div class="controls">
			<input type="text" id="fungru" class="input-medium" name="fungru" value="<?php echo $fungru ?>">
		</div>
	</div>



</form>
</div>
<?php 
$sqli->close(); 
?>
