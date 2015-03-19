<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mhs
$id_lantai = $_POST['id'];

// query untuk menampilkan dosen berdasarkan id_mhs
$data = mysqli_fetch_array(mysqli_query($sqli,"SELECT * FROM lantai WHERE ID_LANTAI= '$id_lantai'"
));


// jika id_lantai > 0 / form ubah data
if($id_lantai> 0) { 


	$lantai = $data['LANTAI'];

	
	


//form tambah data
} else {
	$lantai ="";


}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-lantai">

	<div class="control-group">
		<label class="control-label" for="lantai">Lantai</label>
		<div class="controls">
			<input type="text" id="lantai" class="input-xlarge" name="lantai" value="<?php echo $lantai ?>">
		</div>
	</div>

	


</form>
</div>
<?php 
$sqli->close(); 
?>
