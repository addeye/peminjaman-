<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mhs
$id_ruangan = $_POST['id'];

// query untuk menampilkan pengurus berdasarkan id_mhs
$data = mysqli_fetch_array(mysqli_query($sqli,"
SELECT r.`ID_RUANGAN`, g.`GEDUNG`,l.`LANTAI`,n.`NO_RUANG`,r.`KAPASITAS`,f.`FUNGSI_RUANGAN`,r.`DENAH_KELAS`
FROM `ruangan` r 
LEFT JOIN `gedung` g ON r.`ID_GEDUNG`=g.`ID_GEDUNG`
LEFT JOIN `lantai` l ON r.`ID_LANTAI`=l.`ID_LANTAI`
LEFT JOIN `noruang` n ON r.`ID_NORUANG`=n.`ID_NORUANG`
LEFT JOIN `fungsi_ruangan` f ON r.ID_FUNGRU = f.`ID_FUNGRU`  WHERE r.ID_RUANGAN= '$id_ruangan'"
));


// jika id_pgr > 0 / form ubah data
if($id_ruangan> 0) { 
   $gedung = $data['ID_GEDUNG'];
	$lantai = $data['ID_LANTAI'];
	$noruang = $data['ID_NORUANG'];
	$kapasitas = $data['KAPASITAS'];
	$fungru = $data['PERUNTUKAN'];
	$denah = $data['DENAH_KELAS'];
	


//form tambah data
} else {
    $gedung ="";
	$lantai ="";
	$noruang ="";
	$kapasitas ="";
	$fungru ="";
	$denah ="";
	

}

?>
<div class="container-fluid">
<form enctype="multipart/form-data" class="form-horizontal" id="form-ruangan">
	<div class="control-group">
		<label class="control-label">Gedung</label>
		<div class="controls">
			<select class="input-medium" name="gedung">
				<?php 
				// tampilkan untuk form ubah pengurus
				$pro= mysqli_query($sqli,"SELECT * FROM gedung"); 
				while ($p=mysqli_fetch_array($pro)){
					?>
				<option value="<?= $p['ID_GEDUNG']?>" <?php if($gedung==$p['ID_GEDUNG']) {echo 'selected';} ?>><?= $p['GEDUNG']?></option> <?php } ?>
			</select>
		</div>
	</div>
    
    <div class="control-group">
		<label class="control-label">Lantai</label>
		<div class="controls">
			<select class="input-medium" name="lantai">
				<?php 
				// tampilkan untuk form ubah pengurus
				$ang= mysqli_query($sqli,"SELECT * FROM lantai "); 
				while ($a=mysqli_fetch_array($ang)){
					?>
				<option value="<?= $a['ID_LANTAI']?>" <?php if($lantai==$a['ID_LANTAI']) {echo 'selected';} ?>><?= $a['LANTAI']?></option> <?php } ?>
			</select>
		</div>
	</div>
    
       
    
          <div class="control-group">
		<label class="control-label">Nomor Ruangan</label>
		<div class="controls">
			<select class="input-medium" name="noruang">
				<?php 
				// tampilkan untuk form ubah pengurus
				$sql_kelas= mysqli_query($sqli,"SELECT * from noruang"); 
				while ($k=mysqli_fetch_array($sql_kelas)){
					?>
				<option value="<?= $k['ID_NORUANG']?>" <?php if($noruang==$k['ID_NORUANG']) {echo 'selected';} ?>><?= $k['NO_RUANG']?></option> <?php } ?>
			</select>
		</div>
	</div>
    
             <div class="control-group">
		<label class="control-label">Fungsi Ruang</label>
		<div class="controls">
			<select class="input-medium" name="fungru">
				<?php 
				// tampilkan untuk form ubah pengurus
				$sql_hari= mysqli_query($sqli,"SELECT * from fungsi_ruangan"); 
				while ($h=mysqli_fetch_array($sql_hari)){
					?>
				<option value="<?= $h['ID_FUNGRU']?>" <?php if($fungru==$h['ID_FUNGRU']) {echo 'selected';} ?>><?= $h['FUNGSI_RUANGAN']?></option> <?php } ?>
			</select>
		</div>
	</div>
    

	<div class="control-group">
		<label class="control-label" for="kapasitas">Kapasitas</label>
		<div class="controls">
			<input type="text" id="kapasitas" class="input-xlarge" name="kapasitas" value="<?php echo $kapasitas ?>">
		</div>
	</div>

	<!--<div class="control-group">
		<label class="control-label" for="denah">Denah</label>
		<div class="controls">
			<input type="file" id="file" class="input-xlarge" name="denah" value="<?php /*echo $denah*/ ?>">
		</div>
	</div>-->
    

</form>
</div>
<?php 
$sqli->close(); 
?>
