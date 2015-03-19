<?php
// panggil berkas koneksi.php
include "../../koneksi/conn.php";
 
// buat koneksi ke database mysql

 
?>
<div class="container-fluid">
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
    <tr>
        <th><center>No</center></th>
        <th><center>Gedung</center></th>
        <th><center>Lantai</center></th>
        <th><center>Nomor Ruangan</center></th>
        <th><center>Kapasitas</center></th>
        <th><center>Fungsi Ruangan</center></th>    
        <th><center>Denah Kelas</center></th>
        <th><center>Aksi</center></th>
    </tr>
</thead>
<tbody>
    <?php 
        $i = 1;
        $jml_per_halaman = 5; // jumlah data yg ditampilkan perhalaman
        $jml_data = mysqli_num_rows(mysqli_query($sqli,"SELECT * from ruangan"));
        $jml_halaman = ceil($jml_data / $jml_per_halaman);
        // query pada saat mode pencarian
        if(isset($_POST['cari'])) {
            $kunci =$_POST['cari'];


            echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";

            $query = mysqli_query($sqli," SELECT r.`ID_RUANGAN`, g.`GEDUNG`,l.`LANTAI`,n.`NO_RUANG`,r.`KAPASITAS`,f.`FUNGSI_RUANGAN`,r.`DENAH_KELAS`
FROM `ruangan` r 
LEFT JOIN `gedung` g ON r.`ID_GEDUNG`= g.`ID_GEDUNG`
LEFT JOIN `lantai` l ON r.`ID_LANTAI`= l.`ID_LANTAI`
LEFT JOIN `noruang` n ON r.`ID_NORUANG` = n.`ID_NORUANG`
LEFT JOIN `fungsi_ruangan` f ON `r.ID_FUNGRU` = f.`ID_FUNGRU` 
            WHERE 
            g.`GEDUNG` LIKE '%$kunci%' 
            OR l.`LANTAI`  LIKE '%$kunci%' 
            OR n.`NO_RUANG`  LIKE '%$kunci%'


            ");

        // query jika nomor halaman sudah ditentukan
        } 
        elseif(isset($_POST['halaman'])) {
            $halaman = $_POST['halaman'];
            $i = ($halaman - 1) * $jml_per_halaman  + 1;
            $query = mysqli_query($sqli,"SELECT  r.`ID_RUANGAN`, g.`GEDUNG`,l.`LANTAI`,n.`NO_RUANG`,r.`KAPASITAS`,f.`FUNGSI_RUANGAN`,r.`DENAH_KELAS`
FROM `ruangan` r 
LEFT JOIN `gedung` g ON r.`ID_GEDUNG`=g.`ID_GEDUNG`
LEFT JOIN `lantai` l ON r.`ID_LANTAI`=l.`ID_LANTAI`
LEFT JOIN `noruang` n ON r.`ID_NORUANG`=n.`ID_NORUANG`
LEFT JOIN `fungsi_ruangan` f ON r.`ID_FUNGRU` = f.`ID_FUNGRU`   LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman");
        // query ketika tidak ada parameter halaman maupun pencarian
        } else {
            $query = mysqli_query($sqli,"SELECT r.`ID_RUANGAN`, g.`GEDUNG`,l.`LANTAI`,n.`NO_RUANG`,r.`KAPASITAS`,f.`FUNGSI_RUANGAN`,r.`DENAH_KELAS`
FROM `ruangan` r 
LEFT JOIN `gedung` g ON r.`ID_GEDUNG`=g.`ID_GEDUNG`
LEFT JOIN `lantai` l ON r.`ID_LANTAI`=l.`ID_LANTAI`
LEFT JOIN `noruang` n ON r.`ID_NORUANG`=n.`ID_NORUANG`
LEFT JOIN `fungsi_ruangan` f ON r.`ID_FUNGRU` = f.`ID_FUNGRU`  
LIMIT 0,$jml_per_halaman");
            $halaman = 1; //tambahan
        }
         
        // tampilkan data  selama masih ada
        while($data = mysqli_fetch_array($query) ) {
         
    ?>
    <tr>
        <td><center><?php echo $i ?></center></td>


        <td><center><?php echo $data['GEDUNG'] ?></center></td>
        <td><center><?php echo $data['LANTAI'] ?></center></td>
        <td><center><?php echo $data['NO_RUANG'] ?></center></td> 
        <td><center><?php echo $data['KAPASITAS'] ?></center></td>
        

        <td><center><?php echo $data['FUNGSI_RUANGAN'] ?></center></td>
        <td><center><a href="denah_ruangan.php?id=<?=$data['ID_RUANGAN']?>"><img width="30" src="<?=$data['DENAH_KELAS']?>" /></a><form method="post" action="upload2.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$data['ID_RUANGAN']?>" />
        <input name="denah" class="btn btn-sm" type="file" size="1"/>
        <input type="submit" class="btn btn-sm"  value="upload" />
        </form></center></td>
       
      
        <td align="center">
            <a href="#dialog-ruangan" id="<?=$data['ID_RUANGAN'] ?>" class="btn btn-warning ubah" data-toggle="modal">
                <i class="icon icon-pencil ubah"></i> Ubah </a> 
            <a href="#" id="<?php echo $data['ID_RUANGAN'] ?>" class="btn btn-danger hapus">
                <i class="icon icon-trash"></i>Hapus </a>
        </td>
    </tr>
    <?php
        $i++;
        }
    ?>
</tbody>
</table>
</div>
</div>
<?php if(!isset($_POST['cari'])) { ?>
<!-- untuk menampilkan menu halaman -->
<div class="pagination pager">
  <ul>
    <?php

    // tambahan
    // panjang pagig yang akan ditampilkan
    $no_hal_tampil = 5; // lebih besar dari 3

    if ($jml_halaman <= $no_hal_tampil) {
        $no_hal_awal = 1;
        $no_hal_akhir = $jml_halaman;
    } else {
        $val = $no_hal_tampil - 2; //3
        $mod = $halaman % $val; //
        $kelipatan = ceil($halaman/$val);
        $kelipatan2 = floor($halaman/$val);

        if($halaman < $no_hal_tampil) {
            $no_hal_awal = 1;
            $no_hal_akhir = $no_hal_tampil;
        } elseif ($mod == 2) {
            $no_hal_awal = $halaman - 1;
            $no_hal_akhir = $kelipatan * $val + 2;
        } else {
            $no_hal_awal = ($kelipatan2 - 1) * $val + 1;
            $no_hal_akhir = $kelipatan2 * $val + 2;
        }

        if($jml_halaman <= $no_hal_akhir) {
            $no_hal_akhir = $jml_halaman;
        }
    }

    for($i = $no_hal_awal; $i <= $no_hal_akhir; $i++) {
        // tambahan
        // menambahkan class active pada tag li
        $aktif = $i == $halaman ? ' active' : '';
    ?>
    <li class="halaman<?php echo $aktif ?>" id="<?php echo $i ?>"><a href="#"><?php echo $i ?></a></li>
    <?php } ?>
  </ul>
</div>
<?php } ?>
 
<?php 
$sqli->close(); 
?>