<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mhs
$id_noruang = $_POST['id'];

// query untuk menampilkan dosen berdasarkan id_mhs
$data = mysqli_fetch_array(mysqli_query($sqli,"SELECT * FROM noruang WHERE ID_NORUANG= '$id_noruang'"
));


// jika id_noruang > 0 / form ubah data
if($id_noruang> 0) { 


	$noruang = $data['NO_RUANG'];

	
	


//form tambah data
} else {
	$noruang ="";


}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-noruang">

	<div class="control-group">
		<label class="control-label" for="noruang">Nomor Ruangan</label>
		<div class="controls">
			<input type="text" id="noruang" class="input-xlarge" name="noruang" value="<?php echo $noruang ?>">
		</div>
	</div>

	


</form>
</div>
<?php 
$sqli->close(); 
?>
