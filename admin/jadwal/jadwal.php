<?php 
// memanggil berkas koneksi.php
//session_start();
//if($_SESSION['id']=="" && $_SESSION['nama']=="" ){
//  include_once $_SERVER['DOCUMENT_ROOT']."ruangkelas/koneksi/conn.php";

//   echo '<META HTTP-EQUIV="Refresh" content =" 0; URL= ../index.php">';

//}
 //else 
//{
  include "../../koneksi/conn.php";
 //?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../asset/img/unesa.ico">

    <title>Aplikasi Manajemen Ruang Kelas</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- Custom styles for this template -->
    <link href="../../css/template.css" rel="stylesheet">

    
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                      
          <a class="navbar-brand"><?php

$sql = "SELECT * FROM web";
 $result = $sqli->query($sql);
while($tampil=$result->fetch_assoc())
{
  
 
 echo  "<b>" .$tampil["judul"]. "</b>" ;

   }
  

?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mata Kuliah<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Jadwal Mata Kuliah</a></li>
            <li><a href="#">Pesan Ruang Kelas</a></li>
            <li class="divider"></li>
            <li><a href="#">Memasukkan Data Jadwal Mata Kuliah</a></li>
          </ul>
        </li>
            
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manajemen User<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Data Mahasiswa</a></li>
            <li><a href="#">Data Dosen</a></li>
            <li class="divider"></li>
            <li><a href="#">Data Pengurus</a></li>
          </ul>
        </li>
            
            
          </ul>

          <ul class="nav navbar-nav navbar-right">
          <form action="../fungsi/logout.php" method="post" class="navbar-form navbar-left" role="logout">
          <input type="submit" name="keluar" value="Keluar" class="btn btn-danger">
          </form>
          </ul>

        </div>
          </li>
          </ul>

         
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    </br>



















<?php
    $prodi ="";
    $kelas ="";
  $angkatan = "";
  $semester = "";
  $thajaran = "";
  ?>


    



<div class="container-fluid">

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
    <tr>
        <th><div class="control-group">
    
    <div class="controls">


     
      <a href="#dialog-jadwal" id="0" class="btn btn-primary tambah" data-toggle="modal">
        <i class="icon-plus">Tambah Data </i> 
      </a>
              <a href="#dialog-jadwal" id="0" class="btn btn-primary upload" data-toggle="modal">
        <i class="icon-plus">Upload </i> 
      </a>
    </br>
<center><form class="form-horizontal" method="post" id="form-jadwal" action="jadwal.export.act.php">
      <select class="input-medium" name="prodi">
        <?php 
        // tampilkan untuk form ubah pengurus
        $pro= mysqli_query($sqli,"SELECT * FROM prodi "); 
        while ($p=mysqli_fetch_array($pro)){
          ?>
        <option value="<?= $p['PRODI']?>" <?php if($prodi==$p['PRODI']) {echo 'selected';} ?>><?= $p['PRODI']?></option> <?php } ?>
      </select>

      <select class="input-medium" name="angkatan">
        <?php 
        // tampilkan untuk form ubah pengurus
        $ang= mysqli_query($sqli,"SELECT * FROM angkatan "); 
        while ($a=mysqli_fetch_array($ang)){
          ?>
        <option value="<?= $a['ANGKATAN']?>" <?php if($angkatan==$a['ANGKATAN']) {echo 'selected';} ?>><?= $a['ANGKATAN']?></option> <?php } ?>
      </select>

      <select class="input-medium" name="kelas">
        <?php 
        // tampilkan untuk form ubah pengurus
        $sql_kelas= mysqli_query($sqli,"SELECT * from kelas order by kelas asc"); 
        while ($k=mysqli_fetch_array($sql_kelas)){
          ?>
        <option value="<?= $k['KELAS']?>" <?php if($kelas==$k['KELAS']) {echo 'selected';} ?>><?= $k['KELAS']?></option> <?php } ?>
      </select>
       

       <select class="input-medium" name="semester">
        <?php 
        // tampilkan untuk form ubah pengurus
        $ses= mysqli_query($sqli,"SELECT * FROM semester "); 
        while ($s=mysqli_fetch_array($ses)){
          ?>
        <option value="<?= $s['SEMESTER']?>" <?php if($semester==$s['SEMESTER']) {echo 'selected';} ?>><?= $s['SEMESTER']?></option> <?php } ?>
      </select>

       <select class="input-medium" name="thajaran">
        <?php 
        // tampilkan untuk form ubah pengurus
        $thaj= mysqli_query($sqli,"SELECT * FROM tahun_ajaran "); 
        while ($th=mysqli_fetch_array($thaj)){
          ?>
        <option value="<?=$th['TAHUN_AJARAN']?>" <?php if($thajaran==$th['TAHUN_AJARAN']) {echo 'selected';} ?>><?= $th['TAHUN_AJARAN']?></option> <?php } ?>
      </select>
       
     
<a id="filter-jadwal" class="btn btn-success" >
        <i class="icon-plus">cari</i> 
      </a>
      <input value="excel" type="submit" class="btn btn-success">

  </form>
<!-- <button id="filter-jadwal" class="btn btn-success">cari</button>-->
 
<!--<form class="form-horizontal" method="post" enctype="multipart/form-data" id="form-jadwal" action="export.php">
<div class="control-group">

    
    <input type="submit" class="btn btn-success" name="test" value="test" />
    </form>
-->
</center>
      </th>

    </tr>
</thead>

</table>
</div>
</div>

		<!-- tempat untuk menampilkan data jadwal -->
		<div id="data-jadwal"></div>
	</div>

<!-- awal untuk modal dialog -->
<div id="dialog-jadwal" class="modal modal-open modal-content modal-dialog in fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Tambah Data jadwal</h3>
	</div>
	<!-- tempat untuk menampilkan form jadwal -->
	<div class="modal-body"></div>
	<div class="modal-footer" id="modalhilang">
		<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
		<button id="simpan-jadwal" class="btn btn-success">Simpan</button>
	</div>
</div>
</div>
<!-- akhir kode modal dialog -->

<div class="container-fluid">
<div class="row">
<center>
<?php

$sql = "SELECT * FROM web";
 $result = $sqli->query($sql);
while($tampil=$result->fetch_assoc())
{
  
 echo  $tampil["pembuat"];
 echo '<br>';
 echo  "<b>" .$tampil["lisensi"]. "</b>" ;

   }
  

?>


</center>


</div>
</div>
   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  
<script src="../../bootstrap/jquery-1.8.3.min.js"></script>
<script src="../../bootstrap/bootstrap.min.js"></script>
<script type="text/javascript">

</script>
<script src="../../js/jadwal.js"></script>
<script src="../../bootstrap/responsive.js"></script>

<!--<script src="../test_files/ie-emulation-modes-warning.js"></script>-->
    <!--<script src="../test_files/jquery.min.js"></script>
    <script src="../test_files/bootstrap.min.js"></script>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

</body>

</html>
<?php // } ?>
<?php $sqli->close(); ?>
