<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mngjr
$id_akademik = $_POST['id'];

// query untuk menampilkan mahasiswa berdasarkan id_mngjr
$data = mysqli_fetch_array(mysqli_query($sqli,"
SELECT * FROM akademik WHERE ID_AKADEMIK= '$id_akademik'"
));


// jika id_mngjr > 0 / form ubah data
if($id_akademik> 0) { 
    $fakultas = $data['ID_FAKULTAS'];
	$jurusan = $data['ID_JURUSAN'];
	$angkatan = $data['ID_ANGKATAN'];
	



//form tambah data
} else {
    $fakultas = "";
	$jurusan = "";
	$angkatan = "";
	
}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-mahasiswa">

	<div class="control-group">
		<label class="control-label" for="fakultas">Fakultas</label>
		<div class="controls">
			<select class="input-medium" name="fakultas">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($id_akademik > 0) { ?>
          <?php $cjurus= mysqli_query($sqli,"SELECT * FROM fakultas where ID_FAKULTAS=$fakultas "); 
				$cj=mysqli_fetch_array($cjurus); ?>
					<option value="<?php echo $fakultas ?>"><?= $cj['FAKULTAS']?></option>
				<?php $sjur= mysqli_query($sqli,"SELECT * FROM fakultas where ID_FAKULTAS!=$fakultas "); } else { ?>
				<?php $sjur= mysqli_query($sqli,"SELECT * FROM fakultas "); }
				while ($sj=mysqli_fetch_array($sjur)){
					?>
				<option value="<?= $sj['ID_FAKULTAS']?>"><?= $sj['FAKULTAS']?></option> <?php } ?>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="jurusan">Jurusan</label>
		<div class="controls">
			<select class="input-medium" name="jurusan">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($id_akademik > 0) { ?>
          <?php $cprod= mysqli_query($sqli,"SELECT * FROM jurusan where ID_JURUSAN=$jurusan "); 
				$cp=mysqli_fetch_array($cprod); ?>
					<option value="<?php echo $jurusan ?>"><?= $cp['JURUSAN']?></option>
				<?php $prod= mysqli_query($sqli,"SELECT * FROM jurusan where ID_JURUSAN!=$jurusan "); } else {?>
				<?php $prod= mysqli_query($sqli,"SELECT * FROM jurusan "); }
				while ($cprod=mysqli_fetch_array($prod)){
					?>
				<option value="<?= $cprod['ID_JURUSAN']?>"><?= $cprod['JURUSAN']?></option> <?php } ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="angkatan">Angkatan</label>
		<div class="controls">
			<select class="input-medium" name="angkatan">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($id_akademik > 0) { ?>
          <?php $ckel= mysqli_query($sqli,"SELECT * FROM angkatan where ID_ANGKATAN=$angkatan "); 
				$ck=mysqli_fetch_array($ckel); ?>
					<option value="<?php echo $angkatan ?>"><?= $ck['ANGKATAN']?></option>
				<?php $kls= mysqli_query($sqli,"SELECT * FROM angkatan where ID_ANGKATAN!=$angkatan "); } else {?>
				<?php $kls= mysqli_query($sqli,"SELECT * FROM angkatan "); }
				while ($ckls=mysqli_fetch_array($kls)){
					?>
				<option value="<?= $ckls['ID_ANGKATAN']?>"><?= $ckls['ANGKATAN']?></option> <?php } ?>
			</select>
		</div>
	</div>


</form>
</div>
<?php 
$sqli->close(); 
?>
