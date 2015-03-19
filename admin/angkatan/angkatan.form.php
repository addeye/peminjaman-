<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mhs
$id_angkatan = $_POST['id'];

// query untuk menampilkan dosen berdasarkan id_mhs
$data = mysqli_fetch_array(mysqli_query($sqli,"SELECT * FROM angkatan WHERE ID_ANGKATAN= '$id_angkatan'"
));


// jika id_angkatan > 0 / form ubah data
if($id_angkatan> 0) { 
    $angkatan = $data['ANGKATAN'];

	
	


//form tambah data
} else {
	$angkatan ="";



}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-angkatan">
	<div class="control-group">
		<label class="control-label" for="angkatan">Angkatan</label>
		<div class="controls">
			<input type="text" id="angkatan" class="input-medium" name="angkatan" value="<?php echo $angkatan?>">
		</div>
	</div>


</form>
</div>
<?php 
$sqli->close(); 
?>
