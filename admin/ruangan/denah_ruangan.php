<!DOCTYPE html> 
<?php 
include "../../koneksi/conn.php";

 $query = mysqli_query($sqli,"select * from `ruangan` WHERE `ID_RUANGAN`='$_GET[id]'");
$r=mysqli_fetch_array($query);
//session_start();

//if(cek_login($mysqli) == false){ // Jika user tidak login
//    header('location: index.php'); // Alihkan ke halaman login (index.php)
//    exit();
//}


//if($_SESSION['id']==NULL and $_SESSION['nama']==NUL ){

//   echo ''

//}



 ?>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./asset/img/unesa.ico">

    <title>Aplikasi Manajemen Ruang Kelas</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../test_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    .ukur{
		width:400px;
		height:300px;}
		.wra{
			padding:5px;}
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
  

?>
</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">

        <div class="form-group wra">
        
         <a href="ruangan.php"><button name="kembali" class="btn btn-success">Kembali</button></a>
    </div>

</ul>
        </div>
          </li>
          </ul>

         
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid">
      <div class="page-header">
      <div class="col-md-12">
        
<div align="center"><img class="img-responsive" src="<?=$r['DENAH_KELAS']?>" ></div> 
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

<!--   $judul = $mysqli->query("SELECT * FROM `web`");

      while($judul =  $result->fetch_assoc())  {
    echo "<p>$judul[pembuat]</p>";
    echo "<p>$judul[lisensi]</p>";
?>
-->
</center>


</div>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../test_files/jquery.min.js"></script>
    <script src="../../test_files/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../test_files/ie10-viewport-bug-workaround.js"></script>


</body>

</html>
<?php $sqli->close(); ?>
