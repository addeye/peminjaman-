<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mhs
$id_gedung = $_POST['id'];

// query untuk menampilkan dosen berdasarkan id_mhs
$data = mysqli_fetch_array(mysqli_query($sqli,"SELECT * FROM gedung WHERE ID_GEDUNG= '$id_gedung'"
));


// jika id_gedung > 0 / form ubah data
if($id_gedung> 0) { 


	$gedung = $data['GEDUNG'];

	
	


//form tambah data
} else {
	$gedung ="";


}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-gedung">

	<div class="control-group">
		<label class="control-label" for="gedung">Nama Gedung</label>
		<div class="controls">
			<input type="text" id="gedung" class="input-xlarge" name="gedung" value="<?php echo $gedung ?>">
		</div>
	</div>

	


</form>
</div>
<?php 
$sqli->close(); 
?>
