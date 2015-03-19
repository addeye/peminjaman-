<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mhs
$id_mk = $_POST['id'];

// query untuk menampilkan dosen berdasarkan id_mhs
$data = mysqli_fetch_array(mysqli_query($sqli,"SELECT * FROM mk WHERE ID_MK= '$id_mk'"
));


// jika id_mk > 0 / form ubah data
if($id_mk> 0) { 
    $kdmk = $data['KODE_MK'];
	$mk = $data['MATA_KULIAH'];

	$sks = $data['SKS'];

	
	


//form tambah data
} else {
	$kdmk ="";
	$mk ="";

	$sks ="";


}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-mk">
	<div class="control-group">
		<label class="control-label" for="kdmk">Kode MK</label>
		<div class="controls">
			<input type="text" id="kdmk" class="input-medium" name="kdmk" value="<?php echo $kdmk ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="mk">Mata Kuliah</label>
		<div class="controls">
			<input type="text" id="mk" class="input-xlarge" name="mk" value="<?php echo $mk ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="sks">SKS</label>
		<div class="controls">
			<input type="text" id="sks" class="input-xlarge" name="sks" value="<?php echo $sks ?>">
		</div>
	</div>


</form>
</div>
<?php 
$sqli->close(); 
?>
