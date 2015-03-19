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
    background: blue;
}
.black{

    background: black;
}
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