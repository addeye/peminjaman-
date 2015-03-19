<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mhs
$id_jadwal = $_POST['id'];

// query untuk menampilkan pengurus berdasarkan id_mhs
$data = mysqli_fetch_array(mysqli_query($sqli,"
SELECT * FROM jadwal WHERE ID_JADWAL= '$id_jadwal'"
));


// jika id_pgr > 0 / form ubah data
if($id_jadwal> 0) { 

	$hari = $data['HARI'];
	$jam = $data['JAM'];
    $gedung = $data ['GEDUNG'];
    $lantai = $data ['LANTAI'];
    $noruang = $data ['NO_RUANG'];
    $kodemk = $data ['KODE_MK'];
    //$mk = $data ['MK'];
 

    $dosen = $data ['NAMA_DOSEN'];

    $assdosen = $data ['NAMA_ASST'];





//form tambah data
} else {

	$hari = "";
	$jam = "";
    $gedung = "";
    $lantai = "";
    $noruang ="";
    $kodemk = "";
    //$mk = $data ['MK'];


    $dosen = "";

    $assdosen ="";

	

}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-jadwal">




             <div class="control-group">
		<label class="control-label">Hari</label>
		<div class="controls">
			<select class="input-medium" name="hari">
				<?php 
				// tampilkan untuk form ubah pengurus
				$sql_hari= mysqli_query($sqli,"SELECT * from hari"); 
				while ($h=mysqli_fetch_array($sql_hari)){
					?>
				<option value="<?=$h['HARI']?>" <?php if($hari==$h['HARI']) {echo 'selected';} ?>><?= $h['HARI']?></option> <?php } ?>
			</select>
		</div>
	</div>
    
                 <div class="control-group">
		<label class="control-label" >Jam</label>
		<div class="controls">
			<select class="input-medium" name="jam">
				<?php 
				// tampilkan untuk form ubah pengurus
				$sql_jam= mysqli_query($sqli,"SELECT * from jam"); 
				while ($j=mysqli_fetch_array($sql_jam)){
					?>
				<option value="<?=$j['JAM']?>" <?php if($jam==$j['JAM']) {echo 'selected';} ?>><?= $j['JAM']?></option> <?php } ?>
			</select>
		</div>
	</div>









	<div class="control-group">
		<label class="control-label">Gedung</label>
		<div class="controls">
			<select class="input-medium" name="gedung">
				<?php 
				// tampilkan untuk form ubah pengurus
				$pro= mysqli_query($sqli,"SELECT * FROM gedung"); 
				while ($p=mysqli_fetch_array($pro)){
					?>
				<option value="<?= $p['GEDUNG']?>" <?php if($gedung==$p['GEDUNG']) {echo 'selected';} ?>><?= $p['GEDUNG']?></option> <?php } ?>
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
				<option value="<?= $a['LANTAI']?>" <?php if($lantai==$a['LANTAI']) {echo 'selected';} ?>><?= $a['LANTAI']?></option> <?php } ?>
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
				<option value="<?=$k['NO_RUANG']?>" <?php if($noruang==$k['NO_RUANG']) {echo 'selected';} ?>><?= $k['NO_RUANG']?></option> <?php } ?>
			</select>
		</div>
	</div>
	
<div class="control-group">
		<label class="control-label" for="mk">Mata Kuliah</label>
		<div class="controls">
				<select class="input-medium" name="kodemk">
				<?php 
				// tampilkan untuk form ubah pengurus
				$kuli= mysqli_query($sqli,"SELECT * FROM mk "); 
				while ($mk=mysqli_fetch_array($kuli)){
					?>
				<option value="<?= $mk['KODE_MK']?>" <?php if($kodemk==$mk['KODE_MK']) {echo 'selected';} ?>><?= $mk['MATA_KULIAH']?></option> <?php } ?>
			</select>
		</div>
	</div>
    
<div class="control-group">
		<label class="control-label" for="dosen">Dosen</label>
		<div class="controls">
			<select class="input-medium" name="dosen">
				<?php 
				// tampilkan untuk form ubah pengurus
				$dos= mysqli_query($sqli,"SELECT * FROM dosen "); 
				while ($d=mysqli_fetch_array($dos)){
					?>
				<option value="<?= $d['NAMA_DOSEN']?>" <?php if($dosen==$d['NAMA_DOSEN']) {echo 'selected';} ?>><?= $d['NAMA_DOSEN']?></option> <?php } ?>
			</select>
		</div>
	</div>

<div class="control-group">
		<label class="control-label" for="dosen">Assisten Dosen</label>
		<div class="controls">
		<select class="input-medium" name="asstdosen">
				<?php 
				// tampilkan untuk form ubah pengurus
				$dos1= mysqli_query($sqli,"SELECT * FROM asst_dosen "); 
				while ($d1=mysqli_fetch_array($dos1)){
					?>
				<option value="<?= $d1['NAMA_ASST']?>" <?php if($assdosen==$d1['NAMA_ASST']) {echo 'selected';} ?>><?= $d1['NAMA_ASST']?></option> <?php } ?>
			</select>
		</div>
	</div>


    

</form>
</div>
<?php 
$sqli->close(); 
?>
