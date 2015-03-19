<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mhs
$id_fakultas = $_POST['id'];

// query untuk menampilkan dosen berdasarkan id_mhs
$data = mysqli_fetch_array(mysqli_query($sqli,"SELECT * FROM fakultas WHERE ID_FAKULTAS= '$id_fakultas'"
));


// jika id_fakultas > 0 / form ubah data
if($id_fakultas> 0) { 
    $fakultas = $data['FAKULTAS'];

	
	


//form tambah data
} else {
	$fakultas ="";



}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-fakultas">
	<div class="control-group">
		<label class="control-label" for="fakultas">Fakultas</label>
		<div class="controls">
			<input type="text" id="fakultas" class="input-medium" name="fakultas" value="<?php echo $fakultas?>">
		</div>
	</div>


</form>
</div>
<?php 
$sqli->close(); 
?>
