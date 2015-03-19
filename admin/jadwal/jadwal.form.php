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
    $prodi = $data['PRODI'];
    $kelas =$data['KELAS'];
	$angkatan = $data['ANGKATAN'];
	$semester = $data['SEMESTER'];
	$thajaran = $data['THAJARAN'];
	$hari = $data['HARI'];
	$jam = $data['JAM'];
    $gedung = $data ['GEDUNG'];
    $lantai = $data ['LANTAI'];
    $noruang = $data ['NO_RUANG'];
    $kodemk = $data ['KODE_MK'];
    //$mk = $data ['MK'];
    $sks = $data ['SKS'];

    $dosen = $data ['NAMA_DOSEN'];

    $assdosen = $data ['NAMA_ASST'];





//form tambah data
} else {
    $prodi ="";
    $kelas ="";
	$angkatan = "";
	$semester = "";
	$thajaran = "";
	$hari = "";
	$jam = "";
    $gedung = "";
    $lantai = "";
    $noruang ="";
    $kodemk = "";
    //$mk = $data ['MK'];
    $sks ="";

    $dosen = "";

    $assdosen ="";

	

}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-jadwal">

	<div class="control-group">
		<label class="control-label">Prodi</label>
		<div class="controls">
			<select class="input-medium" name="prodi">
				<?php 
				// tampilkan untuk form ubah pengurus
				$pro= mysqli_query($sqli,"SELECT * FROM prodi "); 
				while ($p=mysqli_fetch_array($pro)){
					?>
				<option value="<?= $p['PRODI']?>" <?php if($prodi==$p['PRODI']) {echo 'selected';} ?>><?= $p['PRODI']?></option> <?php } ?>
			</select>
		</div>
	</div>
    

          <div class="control-group">
		<label class="control-label">Kelas</label>
		<div class="controls">
			<select class="input-medium" name="kelas">
				<?php 
				// tampilkan untuk form ubah pengurus
				$sql_kelas= mysqli_query($sqli,"SELECT * from kelas"); 
				while ($k=mysqli_fetch_array($sql_kelas)){
					?>
				<option value="<?= $k['KELAS']?>" <?php if($kelas==$k['KELAS']) {echo 'selected';} ?>><?= $k['KELAS']?></option> <?php } ?>
			</select>
		</div>
	</div>



    <div class="control-group">
		<label class="control-label">Angkatan</label>
		<div class="controls">
			<select class="input-medium" name="angkatan">
				<?php 
				// tampilkan untuk form ubah pengurus
				$ang= mysqli_query($sqli,"SELECT * FROM angkatan "); 
				while ($a=mysqli_fetch_array($ang)){
					?>
				<option value="<?= $a['ANGKATAN']?>" <?php if($angkatan==$a['ANGKATAN']) {echo 'selected';} ?>><?= $a['ANGKATAN']?></option> <?php } ?>
			</select>
		</div>
	</div>
    
        <div class="control-group">
		<label class="control-label">Semester</label>
		<div class="controls">
			<select class="input-medium" name="semester">
				<?php 
				// tampilkan untuk form ubah pengurus
				$ses= mysqli_query($sqli,"SELECT * FROM semester "); 
				while ($s=mysqli_fetch_array($ses)){
					?>
				<option value="<?= $s['SEMESTER']?>" <?php if($semester==$s['SEMESTER']) {echo 'selected';} ?>><?= $s['SEMESTER']?></option> <?php } ?>
			</select>
		</div>
	</div>
    
    <div class="control-group">
		<label class="control-label">Tahun Ajaran</label>
		<div class="controls">
			<select class="input-medium" name="thajaran">
				<?php 
				// tampilkan untuk form ubah pengurus
				$thaj= mysqli_query($sqli,"SELECT * FROM tahun_ajaran "); 
				while ($th=mysqli_fetch_array($thaj)){
					?>
				<option value="<?=$th['TAHUN_AJARAN']?>" <?php if($thajaran==$th['TAHUN_AJARAN']) {echo 'selected';} ?>><?= $th['TAHUN_AJARAN']?></option> <?php } ?>
			</select>
		</div>
	</div>


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
