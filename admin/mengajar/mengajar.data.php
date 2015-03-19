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
        <th><center>Mata Kuliah</center></th>
        <th><center>Kode MK</center></th>
        <th><center>SKS</center></th>
       
        <th><center>NIP Dosen</center></th>
        <th><center>Nama Dosen</center></th>
        <th><center>Semester</center></th>
        <th><center>Tahun Ajaran</center></th>
        <th><center>Aksi</center></th>






    </tr>
</thead>
<tbody>
    <?php 
        $i = 1;
        $jml_per_halaman = 5; // jumlah data yg ditampilkan perhalaman
        $jml_data = mysqli_num_rows(mysqli_query($sqli,"SELECT * from mengajar"));
        $jml_halaman = ceil($jml_data / $jml_per_halaman);
        // query pada saat mode pencarian
        if(isset($_POST['cari'])) {
            $kunci =$_POST['cari'];


            echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";
            $query = mysqli_query($sqli,"
    SELECT me.`ID_MENGAJAR`,  mk.`KODE_MK`, mk.`MATA_KULIAH`, mk.`SKS`, d.`NIP_DOSEN`,d.`NAMA_DOSEN`,s.`SEMESTER`,t.`TAHUN_AJARAN`
    FROM mengajar AS me 
    LEFT JOIN mk AS mk ON me.ID_MK=mk.ID_MK 
    LEFT JOIN dosen AS d ON me.ID_DOSEN=d.ID_DOSEN 
    LEFT JOIN semester AS s ON me.ID_SEMESTER=s.ID_SEMESTER
    LEFT JOIN tahun_ajaran AS t ON me.ID_THAJARAN=t.ID_THAJARAN
WHERE 
     mk.`KODE_MK` LIKE '%$kunci%'
      OR mk.`MATA_KULIAH` LIKE '%$kunci%'
      OR mk.`SKS` LIKE '%$kunci%'
      OR d.`NIP_DOSEN`  LIKE '%$kunci%'  
      OR d.`NAMA_DOSEN`  LIKE '%$kunci%'  
      OR s.`SEMESTER`  LIKE '%$kunci%' 
      OR t.`TAHUN_AJARAN`  LIKE '%$kunci%' 

            ");
        // query jika nomor halaman sudah ditentukan
        } elseif(isset($_POST['halaman'])) {
            $halaman = $_POST['halaman'];
            $i = ($halaman - 1) * $jml_per_halaman  + 1;
            $query = mysqli_query($sqli," SELECT me.`ID_MENGAJAR`,  mk.`KODE_MK`, mk.`MATA_KULIAH`, mk.`SKS`, d.`NIP_DOSEN`,d.`NAMA_DOSEN`,s.`SEMESTER`,t.`TAHUN_AJARAN`
FROM mengajar AS me 
LEFT JOIN mk AS mk ON me.ID_MK=mk.ID_MK 
LEFT JOIN dosen AS d ON me.ID_DOSEN=d.ID_DOSEN 
LEFT JOIN semester AS s ON me.ID_SEMESTER=s.ID_SEMESTER
LEFT JOIN tahun_ajaran AS t ON me.ID_THAJARAN=t.ID_THAJARAN LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman");
        // query ketika tidak ada parameter halaman maupun pencarian
        } else {
            $query = mysqli_query($sqli,"SELECT me.`ID_MENGAJAR`,  mk.`KODE_MK`, mk.`MATA_KULIAH`, mk.`SKS`, d.`NIP_DOSEN`,d.`NAMA_DOSEN`,s.`SEMESTER`,t.`TAHUN_AJARAN`
FROM mengajar AS me 
LEFT JOIN mk AS mk ON me.ID_MK=mk.ID_MK 
LEFT JOIN dosen AS d ON me.ID_DOSEN=d.ID_DOSEN 
LEFT JOIN semester AS s ON me.ID_SEMESTER=s.ID_SEMESTER
LEFT JOIN tahun_ajaran AS t ON me.ID_THAJARAN=t.ID_THAJARAN
LIMIT 0,$jml_per_halaman");
            $halaman = 1; //tambahan
        }
         
        // tampilkan data mahasiswa selama masih ada
        while($data = mysqli_fetch_array($query)) {
         
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $data['MATA_KULIAH'] ?></td>
        <td><?php echo $data['KODE_MK'] ?></td>
        <td><?php echo $data['SKS'] ?></td>
        <td><?php echo $data['NIP_DOSEN'] ?></td>
        <td><?php echo $data['NAMA_DOSEN'] ?></td>
        
        <td><?php echo $data['SEMESTER'] ?></td>
        <td><?php echo $data['TAHUN_AJARAN'] ?></td>
        <td align="center">
            <a href="#dialog-mengajar" id="<?=$data['ID_MENGAJAR'] ?>" class="btn btn-warning ubah" data-toggle="modal">
                <i class="icon icon-pencil ubah"></i> Ubah </a> 
            <a href="#" id="<?php echo $data['ID_MENGAJAR'] ?>" class="btn btn-danger hapus">
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