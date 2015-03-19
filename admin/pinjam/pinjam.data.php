<?php
// panggil berkas koneksi.php
include "../../koneksi/conn.php";

 
    

           


    if(isset($_POST['filter'])) 
            {
            $hari = $_POST['hari'];   
            $semester = $_POST['semester'];
            $thajaran = $_POST['thajaran']; 
    

            $query = mysqli_query($sqli,"SELECT * FROM jadwal
WHERE HARI = '$hari' 
and SEMESTER = '$semester'
and TAHUN_AJARAN = '$thajaran' ");
        } 

        else 
        {
         $query = mysqli_query($sqli,"SELECT * FROM jadwal
        }
WHERE HARI = 'SENIN' 
and SEMESTER = 'GASAL'
and TAHUN_AJARAN = '2014/2015'
            ");
     }


 
?>



<style type="text/css">
.blu{
    background: #3071A9;
	font-size:9px;
}
.black{
	font-size:9px;
    background: black;
}
.red{
	font-size:9px;
	background:#D9534F;}
.dis{
	display:none;}	

</style>


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

$sqlg= mysqli_query ($sqli,"SELECT g.GEDUNG,l.LANTAI,n.NO_RUANG from ruangan as r 
LEFT JOIN gedung as g ON r.ID_GEDUNG=g.ID_GEDUNG
LEFT JOIN lantai as l on r.ID_LANTAI=l.ID_LANTAI
LEFT JOIN noruang as n ON r.ID_NORUANG=n.ID_NORUANG ");

 while ($g=mysqli_fetch_array($sqlg)){ ?>
 <tr>
<td><center><?=$g['GEDUNG']?><?=$g['LANTAI']?><?=$g['NO_RUANG']?><center></td>
<?php 
if(isset($_POST['filter'])) 
            {
            $hari = $_POST['hari'];
            
            $semester = $_POST['semester'];
            $thajaran = $_POST['thajaran']; 



$sqlj=mysqli_query ($sqli,"SELECT * FROM jadwal
WHERE HARI = '$hari' 
and SEMESTER = '$semester'
and TAHUN_AJARAN = '$thajaran' 
and GEDUNG = '$g[GEDUNG]'
and LANTAI = '$g[LANTAI]'
and NO_RUANG = '$g[NO_RUANG]'
ORDER BY JAM") ;




 while ($j=mysqli_fetch_array($sqlj)){
    $ce=$j['JAM']+($j['SKS']-1);

    $jam[$j['JAM']]=1;
    $jam[$ce]=1;
 }

 for($a=1; $a<=14; $a++){
    if(isset($jam[$a]) and $jam[$a]!=NULL){$cl='blu';}else{$cl='black';}

    echo '<td class="'.$cl.'">&nbsp;</td>';
    $jam[$a]=NULL;

 }
}

else {

$sqlj=mysqli_query ($sqli,"SELECT * FROM jadwal
WHERE HARI = 'SENIN' 
and SEMESTER = 'GASAL'
and TAHUN_AJARAN = '2014/2015'  
and GEDUNG = '$g[GEDUNG]'
and LANTAI = '$g[LANTAI]'
and NO_RUANG = '$g[NO_RUANG]'
ORDER BY JAM") ;

$sqlp=mysqli_query($sqli,"SELECT p.*,mhs.NAMA_MAHASISWA,jur.JURUSAN,pro.PRODI,kel.KELAS,angk.ANGKATAN, h.HARI, j.JAM, g.GEDUNG, l.LANTAI, n.NO_RUANG, m.MATA_KULIAH, m.SKS, d.NIP_DOSEN, d.NAMA_DOSEN 
from pinjam p 
LEFT JOIN mahasiswa mhs on p.ID_MAHASISWA=mhs.ID_MAHASISWA
LEFT JOIN hari h on p.ID_HARI=h.ID_HARI
LEFT JOIN jam j on p.ID_JAM=j.ID_JAM
LEFT JOIN gedung g on p.ID_GEDUNG=g.ID_GEDUNG
LEFT JOIN lantai l on p.ID_LANTAI=l.ID_LANTAI
LEFT JOIN noruang n on p.ID_NORUANG=n.NO_RUANG
LEFT JOIN mk m on p.ID_MK=m.ID_MK
LEFT JOIN dosen d on p.ID_DOSEN=d.ID_DOSEN
LEFT JOIN jurusan jur on mhs.ID_JURUSAN=jur.ID_JURUSAN
LEFT JOIN prodi pro on mhs.ID_PRODI=pro.ID_PRODI
LEFT JOIN kelas kel on mhs.ID_KELAS=kel.ID_KELAS
LEFT JOIN angkatan angk on mhs.ID_ANGKATAN=angk.ID_ANGKATAN
LEFT JOIN semester s on p.ID_SEMESTER=s.ID_SEMESTER
LEFT JOIN tahun_ajaran th on p.ID_THAJARAN=th.ID_THAJARAN

WHERE h.HARI = 'SENIN' 
and s.SEMESTER = 'GASAL'
and th.TAHUN_AJARAN = '2014/2015'  
and g.GEDUNG = '$g[GEDUNG]'
and l.LANTAI = '$g[LANTAI]'
and n.NO_RUANG = '$g[NO_RUANG]'");

$cekp=mysqli_num_rows($sqlp);
if($cekp!=0){

while($p=mysqli_fetch_array($sqlp)){
	 $ke=$p['JAM']+($p['SKS']-1);

    $jam[$p['JAM']]=2;
    $jam[$ke]=2;
	$dos[$p['JAM']]=$p['NAMA_DOSEN'];
    $mat[$p['JAM']]=$p['MATA_KULIAH'];
	$dos[$ke]=$p['NAMA_DOSEN'];
    $mat[$ke]=$p['MATA_KULIAH'];
	}
	
	}



 while ($j=mysqli_fetch_array($sqlj)){
    $ce=$j['JAM']+($j['SKS']-1);

    $jam[$j['JAM']]=1;
    $jam[$ce]=1;
	$dos[$j['JAM']]=$j['NAMA_DOSEN'];
    $mat[$j['JAM']]=$j['MATA_KULIAH'];
	$dos[$ce]=$j['NAMA_DOSEN'];
    $mat[$ce]=$j['MATA_KULIAH'];
 }

 for($a=1; $a<=14; $a++){
    if(isset($jam[$a]) and $jam[$a]!=NULL and isset($dos[$a]) and $dos[$a]!=NULL and isset($mat[$a]) and $mat[$a]!=NULL ){
		if($jam[$a]==2)
            {$cl='red';}else {
		$cl='blu';}
		$dosen=$dos[$a];
        $matakuliah=$mat[$a];
		}
		else{$cl='black';
		$dosen=NULL;
        $matakuliah=NULL;}

    echo '<td class="'.$cl.'"><div class="dis">'.$dosen.'<br>'.$matakuliah.'</div></td>';
    $jam[$a]=NULL;

 }

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
 
<?php 
$sqli->close(); 
?>