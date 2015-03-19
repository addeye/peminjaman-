<?php
// panggil file koneksi.php
include "../../koneksi/conn.php";

// buat koneksi ke database mysql


// tangkap variabel id_mhs
$id_mhs = $_POST['id'];

// query untuk menampilkan mahasiswa berdasarkan id_mhs
$data = mysqli_fetch_array(mysqli_query($sqli,"
SELECT * FROM mahasiswa WHERE ID_MAHASISWA= '$id_mhs'"
));


// jika id_mhs > 0 / form ubah data
if($id_mhs> 0) { 
    $nim = $data['NIM_MAHASISWA'];
	$nama = $data['NAMA_MAHASISWA'];
	$prodi = $data['ID_PRODI'];
	$jurusan = $data['ID_JURUSAN'];
	$password = $data['PASSWORD'];
	$kelas = $data['ID_KELAS'];
	$angkatan = $data['ID_ANGKATAN'];
	$status = $data['ID_STATUS'];


//form tambah data
} else {
	$nim ="";
	$nama ="";
	$prodi ="";
	$jurusan ="";
	$password ="";
	$kelas ="";
	$angkatan="";
	$status = "";
}

?>
<div class="container-fluid">
<form class="form-horizontal" id="form-mahasiswa">
	<div class="control-group">
		<label class="control-label" for="nim">NIM</label>
		<div class="controls">
			<input type="text" id="nim" class="input-medium" name="nim" value="<?php echo $nim ?>">
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
		<label class="control-label" for="jurusan">Jurusan</label>
		<div class="controls">
			<select class="input-medium" name="jurusan">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($id_mhs > 0) { ?>
          <?php $cjurus= mysqli_query($sqli,"SELECT * FROM jurusan where ID_JURUSAN=$jurusan "); 
				$cj=mysqli_fetch_array($cjurus); ?>
					<option value="<?php echo $jurusan ?>"><?= $cj['JURUSAN']?></option>
				<?php $sjur= mysqli_query($sqli,"SELECT * FROM jurusan where ID_jurusan!=$jurusan "); } else { ?>
				<?php $sjur= mysqli_query($sqli,"SELECT * FROM jurusan "); }
				while ($sj=mysqli_fetch_array($sjur)){
					?>
				<option value="<?= $sj['ID_JURUSAN']?>"><?= $sj['JURUSAN']?></option> <?php } ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="prodi">Prodi</label>
		<div class="controls">
			<select class="input-medium" name="prodi">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($id_mhs > 0) { ?>
          <?php $cprod= mysqli_query($sqli,"SELECT * FROM prodi where ID_PRODI=$prodi "); 
				$cp=mysqli_fetch_array($cprod); ?>
					<option value="<?php echo $prodi ?>"><?= $cp['PRODI']?></option>
				<?php $prod= mysqli_query($sqli,"SELECT * FROM prodi where ID_prodi!=$prodi "); } else {?>
				<?php $prod= mysqli_query($sqli,"SELECT * FROM prodi "); }
				while ($cprod=mysqli_fetch_array($prod)){
					?>
				<option value="<?= $cprod['ID_PRODI']?>"><?= $cprod['PRODI']?></option> <?php } ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="kelas">Kelas</label>
		<div class="controls">
			<select class="input-medium" name="kelas">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($id_mhs > 0) { ?>
          <?php $ckel= mysqli_query($sqli,"SELECT * FROM kelas where ID_KELAS=$kelas "); 
				$ck=mysqli_fetch_array($ckel); ?>
					<option value="<?php echo $kelas ?>"><?= $ck['KELAS']?></option>
				<?php $kls= mysqli_query($sqli,"SELECT * FROM kelas where ID_KELAS!=$kelas "); } else {?>
				<?php $kls= mysqli_query($sqli,"SELECT * FROM kelas "); }
				while ($ckls=mysqli_fetch_array($kls)){
					?>
				<option value="<?= $ckls['ID_KELAS']?>"><?= $ckls['KELAS']?></option> <?php } ?>
			</select>
		</div>
	</div>
		<div class="control-group">
		<label class="control-label" for="angkatan">Angkatan</label>
		<div class="controls">
			<select class="input-medium" name="angkatan">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($id_mhs > 0) { ?>
          <?php $cang= mysqli_query($sqli,"SELECT * FROM angkatan where ID_ANGKATAN=$angkatan "); 
				$can=mysqli_fetch_array($cang); ?>
					<option value="<?php echo $angkatan ?>"><?= $can['ANGKATAN']?></option>
				<?php $akt= mysqli_query($sqli,"SELECT * FROM angkatan where ID_ANGKATAN!=$angkatan "); } else {?>
				<?php $akt= mysqli_query($sqli,"SELECT * FROM angkatan "); }
				while ($a=mysqli_fetch_array($akt)){
					?>
				<option value="<?= $a['ID_ANGKATAN']?>"><?= $a['ANGKATAN']?></option> <?php } ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="status">Aktif</label>
		<div class="controls">
			<select class="input-medium" name="status">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($id_mhs > 0) { ?>
          <?php $cstat= mysqli_query($sqli,"SELECT * FROM status where ID_STATUS=$status "); 
				$cs=mysqli_fetch_array($cstat); ?>
					<option value="<?php echo $status ?>"><?= $cs['STATUS']?></option>
				<?php $stat= mysqli_query($sqli,"SELECT * FROM status where id_status!=$status "); } else { ?>
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
