

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


  $sql="SELECT * FROM jadwal
WHERE HARI = 'senin' 
and SEMESTER = 'gasal'
and TAHUN_AJARAN = '2014/2015'";
$que=mysqli_query($sqli,$sql);

$sqlg="SELECT g.GEDUNG,l.LANTAI,n.NO_RUANG from ruangan as r 
LEFT JOIN gedung as g ON r.ID_GEDUNG=g.ID_GEDUNG
LEFT JOIN lantai as l on r.ID_LANTAI=l.ID_LANTAI
LEFT JOIN noruang as n ON r.ID_NORUANG=n.ID_NORUANG

";
$queg=mysqli_query($sqli,$sqlg);

 ?>

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
<style type="text/css">
.blu{
	background: blue;
}
.black{

	background: black;
}
</style>
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
<div class="container-fluid">
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>R/J</th>
<th>1</th>
<th>2</th>
<th>3</th>
<th>4</th>
<th>5</th>
<th>6</th>
<th>7</th>
<th>8</th>
<th>9</th>
<th>10</th>
<th>11</th>
<th>12</th>
<th>13</th>
<th>14</th>
    </tr>
</thead>
<tbody>


<?php
 while ($g=mysqli_fetch_array($queg)){ ?>
 <tr>
<td><center><?=$g['GEDUNG']?><?=$g['LANTAI']?><?=$g['NO_RUANG']?><center></td>
<?php 


$sqlj="SELECT * FROM jadwal
WHERE HARI = 'senin' 
and SEMESTER = 'gasal'
and TAHUN_AJARAN = '2014/2015' 
and GEDUNG = '$g[GEDUNG]'
and LANTAI = '$g[LANTAI]'
and NO_RUANG = '$g[NO_RUANG]'
ORDER BY JAM";

$quej=mysqli_query($sqli,$sqlj);


 while ($j=mysqli_fetch_array($quej)){
 	$ce=$j['JAM']+($j['SKS']-1);

	$jam[$j['JAM']]=1;
	$jam[$ce]=1;
 }

 for($a=1; $a<=14; $a++){
 	if(isset($jam[$a]) and $jam[$a]!=NULL){$cl='blu';}else{$cl='black';}

 	echo '<td class="'.$cl.'">&nbsp;</td>';
 	$jam[$a]=NULL;

 }
 
 ?>

	</tr>
	
<?php

	} 

?>
</tbody>
</table>
</div>
</div>

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
<script src="../../js/pinjam.js"></script>
<script src="../../bootstrap/responsive.js"></script>
<!--<script src="../test_files/ie-emulation-modes-warning.js"></script>-->
    <!--<script src="../test_files/jquery.min.js"></script>
    <script src="../test_files/bootstrap.min.js"></script>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

</body>

</html>
<?php // } ?>
<?php $sqli->close(); ?>