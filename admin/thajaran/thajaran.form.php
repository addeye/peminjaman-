<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mhs
$id_thajaran = $_POST['id'];

// query untuk menampilkan dosen berdasarkan id_mhs
$data = mysqli_fetch_array(mysqli_query($sqli,"SELECT * FROM tahun_ajaran WHERE ID_THAJARAN= '$id_thajaran'"
));


// jika id_mk > 0 / form ubah data
if($id_thajaran> 0) { 
    $thajaran = $data['TAHUN_AJARAN'];


	
	


//form tambah data
} else {
	$thajaran ="";



}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-thajaran">
	<div class="control-group">
		<label class="control-label" for="thajaran">Tahun Ajaran</label>
		<div class="controls">
			<input type="text" id="thajaran" class="input-medium" name="thajaran" value="<?php echo $thajaran ?>">
		</div>
	</div>

	</div>


</form>
</div>
<?php 
$sqli->close(); 
?>
