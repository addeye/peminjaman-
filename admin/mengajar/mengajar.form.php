<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mngjr
$id_mngjr = $_POST['id'];

// query untuk menampilkan mahasiswa berdasarkan id_mngjr
$data = mysqli_fetch_array(mysqli_query($sqli,"
SELECT * FROM mengajar WHERE ID_MENGAJAR= '$id_mngjr'"
));


// jika id_mngjr > 0 / form ubah data
if($id_mngjr> 0) { 
    $dosen = $data['ID_DOSEN'];
	$mk = $data['ID_MK'];
	$semester = $data['ID_SEMESTER'];
	$thajaran = $data['ID_THAJARAN'];



//form tambah data
} else {
    $dosen = "";
	$mk = "";
	$semester = "";
	$thajaran = "";
}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-mahasiswa">

	<div class="control-group">
		<label class="control-label" for="dosen">dosen</label>
		<div class="controls">
			<select class="input-medium" name="dosen">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($id_mngjr > 0) { ?>
          <?php $cjurus= mysqli_query($sqli,"SELECT * FROM dosen where ID_DOSEN=$dosen "); 
				$cj=mysqli_fetch_array($cjurus); ?>
					<option value="<?php echo $dosen ?>"><?= $cj['NAMA_DOSEN']?></option>
				<?php $sjur= mysqli_query($sqli,"SELECT * FROM dosen where ID_DOSEN!=$dosen "); } else { ?>
				<?php $sjur= mysqli_query($sqli,"SELECT * FROM dosen "); }
				while ($sj=mysqli_fetch_array($sjur)){
					?>
				<option value="<?= $sj['ID_DOSEN']?>"><?= $sj['NAMA_DOSEN']?></option> <?php } ?>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="mk">MK</label>
		<div class="controls">
			<select class="input-medium" name="mk">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($id_mngjr > 0) { ?>
          <?php $cprod= mysqli_query($sqli,"SELECT * FROM mk where ID_MK=$mk "); 
				$cp=mysqli_fetch_array($cprod); ?>
					<option value="<?php echo $mk ?>"><?= $cp['MATA_KULIAH']?></option>
				<?php $prod= mysqli_query($sqli,"SELECT * FROM mk where ID_MK!=$mk "); } else {?>
				<?php $prod= mysqli_query($sqli,"SELECT * FROM mk "); }
				while ($cprod=mysqli_fetch_array($prod)){
					?>
				<option value="<?= $cprod['ID_MK']?>"><?= $cprod['MATA_KULIAH']?></option> <?php } ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="semester">semester</label>
		<div class="controls">
			<select class="input-medium" name="semester">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($id_mngjr > 0) { ?>
          <?php $ckel= mysqli_query($sqli,"SELECT * FROM semester where ID_SEMESTER=$semester "); 
				$ck=mysqli_fetch_array($ckel); ?>
					<option value="<?php echo $semester ?>"><?= $ck['SEMESTER']?></option>
				<?php $kls= mysqli_query($sqli,"SELECT * FROM semester where ID_SEMESTER!=$semester "); } else {?>
				<?php $kls= mysqli_query($sqli,"SELECT * FROM semester "); }
				while ($ckls=mysqli_fetch_array($kls)){
					?>
				<option value="<?= $ckls['ID_SEMESTER']?>"><?= $ckls['SEMESTER']?></option> <?php } ?>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="thajaran">Tahun Ajaran</label>
		<div class="controls">
			<select class="input-medium" name="thajaran">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($id_mngjr > 0) { ?>
          <?php $cstat= mysqli_query($sqli,"SELECT * FROM tahun_ajaran where ID_THAJARAN=$thajaran "); 
				$cs=mysqli_fetch_array($cstat); ?>
					<option value="<?php echo $thajaran ?>"><?= $cs['TAHUN_AJARAN']?></option>
				<?php $stat= mysqli_query($sqli,"SELECT * FROM tahun_ajaran where id_thajaran!=$thajaran "); } else { ?>
				<?php $stat= mysqli_query($sqli,"SELECT * FROM tahun_ajaran "); } 
				while ($s=mysqli_fetch_array($stat)){
					?>
				<option value="<?= $s['ID_THAJARAN']?>"><?= $s['TAHUN_AJARAN']?></option> <?php } ?>
			</select>
		</div>
	</div>
</form>
</div>
<?php 
$sqli->close(); 
?>
