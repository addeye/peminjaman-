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
        <th><center>Fakultas</center></th>
        <th><center>Jurusan</center></th>
        <th><center>Angkatan</center></th>
        <th><center>Aksi</center></th>
       




    </tr>
</thead>
<tbody>
    <?php 
        $i = 1;
        $jml_per_halaman = 5; // jumlah data yg ditampilkan perhalaman
        $jml_data = mysqli_num_rows(mysqli_query($sqli,"SELECT * from akademik"));
        $jml_halaman = ceil($jml_data / $jml_per_halaman);
        // query pada saat mode pencarian
        if(isset($_POST['cari'])) {
            $kunci =$_POST['cari'];


            echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";
            $query = mysqli_query($sqli,"
SELECT a.`ID_AKADEMIK`, f.`FAKULTAS`, j.`JURUSAN`,  an.`ANGKATAN`
FROM akademik AS a 
LEFT JOIN fakultas AS f ON a.ID_FAKULTAS=f.ID_FAKULTAS 
LEFT JOIN jurusan AS j ON a.ID_JURUSAN=j.ID_JURUSAN 
LEFT JOIN angkatan AS an ON a.ID_ANGKATAN=an.ID_ANGKATAN
WHERE 
     f.ID_FAKULTAS LIKE '%$kunci%'
      OR j.ID_JURUSAN LIKE '%$kunci%'
      OR an.ID_ANGKATAN LIKE '%$kunci%'
      

            ");
        // query jika nomor halaman sudah ditentukan
        } elseif(isset($_POST['halaman'])) {
            $halaman = $_POST['halaman'];
            $i = ($halaman - 1) * $jml_per_halaman  + 1;
            $query = mysqli_query($sqli,"SELECT a.`ID_AKADEMIK`, f.`FAKULTAS`, j.`JURUSAN`,  an.`ANGKATAN`
FROM akademik AS a 
LEFT JOIN fakultas AS f ON a.ID_FAKULTAS=f.ID_FAKULTAS 
LEFT JOIN jurusan AS j ON a.ID_JURUSAN=j.ID_JURUSAN 
LEFT JOIN angkatan AS an ON a.ID_ANGKATAN=an.ID_ANGKATAN LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman");
        // query ketika tidak ada parameter halaman maupun pencarian
        } else {
            $query = mysqli_query($sqli,"SELECT a.`ID_AKADEMIK`, f.`FAKULTAS`, j.`JURUSAN`,  an.`ANGKATAN`
FROM akademik AS a 
LEFT JOIN fakultas AS f ON a.ID_FAKULTAS=f.ID_FAKULTAS 
LEFT JOIN jurusan AS j ON a.ID_JURUSAN=j.ID_JURUSAN 
LEFT JOIN angkatan AS an ON a.ID_ANGKATAN=an.ID_ANGKATAN
LIMIT 0,$jml_per_halaman");
            $halaman = 1; //tambahan
        }
         
        // tampilkan data mahasiswa selama masih ada
        while($data = mysqli_fetch_array($query)) {
         
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $data['FAKULTAS'] ?></td>
        <td><?php echo $data['JURUSAN'] ?></td>
         <td><?php echo $data['ANGKATAN'] ?></td>
        
        <td align="center">
            <a href="#dialog-akademik" id="<?=$data['ID_AKADEMIK'] ?>" class="btn btn-warning ubah" data-toggle="modal">
                <i class="icon icon-pencil ubah"></i> Ubah </a> 
            <a href="#" id="<?php echo $data['ID_AKADEMIK'] ?>" class="btn btn-danger hapus">
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