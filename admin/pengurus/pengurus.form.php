<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mhs
$id_pgr = $_POST['id'];

// query untuk menampilkan pengurus berdasarkan id_mhs
$data = mysqli_fetch_array(mysqli_query($sqli,"
SELECT * FROM pengurus WHERE ID_PENGURUS= '$id_pgr'"
));


// jika id_pgr > 0 / form ubah data
if($id_pgr> 0) { 
    $nip = $data['NIP_PENGURUS'];
	$nama = $data['NAMA_PENGURUS'];

	$password = $data['PASSWORD'];

	
	$status = $data['ID_STATUS'];


//form tambah data
} else {
	$nip ="";
	$nama ="";

	$password ="";

	$status = "";
}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-pengurus">
	<div class="control-group">
		<label class="control-label" for="nip">NIP</label>
		<div class="controls">
			<input type="text" id="nip" class="input-medium" name="nip" value="<?php echo $nip ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="nama">Nama</label>
		<div class="controls">
			<input type="text" id="nama" class="input-xlarge" name="nama" value="<?php echo $nama ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="password">Password</label>
		<div class="controls">
			<input type="text" id="password" class="input-xlarge" name="password" value="<?php echo $password ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="status">Aktif</label>
		<div class="controls">
			<select class="input-medium" name="status">
				<?php 
				// tampilkan untuk form ubah pengurus
				if($id_mhs > 0) { ?>
          <?php $cstat= mysqli_query($sqli,"SELECT * FROM status where ID_STATUS=$status "); 
				$cs=mysqli_fetch_array($cstat); ?>
					<option value="<?php echo $status ?>"><?= $cs['STATUS']?></option>
				<?php $stat= mysqli_query($sqli,"SELECT * FROM status where ID_status!=$status "); } else { ?>
				<?php $stat= mysqli_query($sqli,"SELECT * FROM status "); } 
				while ($s=mysqli_fetch_array($stat)){
					?>
				<option value="<?= $s['ID_STATUS']?>"><?= $s['STATUS']?></option> <?php } ?>
			</select>
		</div>
	</div>
</form>
</div>
<?php 
$sqli->close(); 
?>
