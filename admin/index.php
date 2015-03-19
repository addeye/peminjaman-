<?php 
// memanggil berkas koneksi.php
session_start();
if($_SESSION['id']=="" && $_SESSION['nama']=="" ){

   echo '<META HTTP-EQUIV="Refresh" content =" 0; URL= ../index.php">';

}
 else
  
  {
     if ($_SESSION['tipe'] == 'Admin' )  {
  include "../koneksi/conn.php";
 ?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../asset/img/unesa.ico">

    <title>Aplikasi Manajemen Ruang Kelas</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- Custom styles for this template -->
    <link href="../css/template.css" rel="stylesheet">

    
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Perkuliahan<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Jadwal Mata Kuliah</a></li>
            <li class="divider"></li>
            <li><a href="#">Akademik</a></li>
            <li><a href="#">Angkatan</a></li>
            <li><a href="#">Fakultas</a></li>
            <li><a href="#">Mata Kuliah</a></li>
            <li><a href="#">Tahun Ajaran</a></li>
            <li><a href="#">Mengajar</a></li>
           
          </ul>
        </li>
            
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ruang Kelas<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Pinjam Ruang Kelas</a></li>
            <li class="divider"></li>
            <li><a href="#">Gedung</a></li>
            <li><a href="#">Lantai</a></li>
            <li><a href="#">Nomor Ruangan</a></li>
            <li><a href="#">Ruangan</a></li>
            <li><a href="#">Fungsi Ruangan</a></li>
          </ul>
        </li>

                <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pengguna <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Data Pengurus</a></li>
            <li><a href="#">Data Dosen</a></li>
            <li class="divider"></li>
            <li><a href="#">Data Mahasiswa</a></li>
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



    <div class="container">

      <div class="starter-template">
        <h1>Selamat Datang <?=  $_SESSION['nama'] ?></h1>
        <p class="lead">Anda dapat melihat jadwal mata kuliah, mencetak mata kuliah serta mengatur peminjaman ruang kelas.</p>
      </div>

    </div><!-- /.container -->


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
  
<script src="../bootstrap/jquery-1.8.3.min.js"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="../js/akademik.js"></script>
<script src="../bootstrap/responsive.js"></script>
<!--<script src="../test_files/ie-emulation-modes-warning.js"></script>-->
    <!--<script src="../test_files/jquery.min.js"></script>
    <script src="../test_files/bootstrap.min.js"></script>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

</body>

</html>
<?php

}else {
$_SESSION['nama']="";
$_SESSION['id']="";
session_destroy();
  echo '<META HTTP-EQUIV="Refresh" content =" 0; URL= ../index.php">';}
 } ?>

<?php $sqli->close(); ?>
