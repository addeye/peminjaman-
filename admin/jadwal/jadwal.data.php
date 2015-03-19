<?php
// panggil berkas koneksi.php
include "../../koneksi/conn.php";
 include "../../fungsi/sks.php";
// buat koneksi ke database mysql

 
?>
<div class="container-fluid">
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
    <tr>
        <th><center>No</center></th>

        <th><center>Prodi</center></th>
        <th><center>Angkatan</center></th>
        <th><center>Hari</center></th>
        <th><center>Kelas </center></th>
        

         <th><center>Jam</center></th>
        <th><center>Semester</center></th>
        <th><center>Tahun Ajaran</center></th>
        <th><center>Gedung</center></th>
        <th><center>Lantai</center></th>

         <th><center>No Ruangan</center></th>
        <th><center>Kode MK</center></th>
        <th><center>Mata Kuliah</center></th>
        <th><center>SKS</center></th>
        <th><center>Nama Dosen</center></th>
         <th><center>Asst Dosen</center></th>
    

        <th><center>Aksi</center></th>
    </tr>
</thead>
<tbody>
    <?php 
        $i = 1;
        $jml_per_halaman = 5; // jumlah data yg ditampilkan perhalaman
        $jml_data = mysqli_num_rows(mysqli_query($sqli,"SELECT * from jadwal"));
        $jml_halaman = ceil($jml_data / $jml_per_halaman);
        // query pada saat mode pencarian





    if(isset($_POST['filter'])) 
            {
            $prodi = $_POST['prodi'];
            $kelas = $_POST['kelas'];
            $semester = $_POST['semester'];
            $thajaran = $_POST['thajaran']; 
            $angkatan = $_POST['angkatan'];

            $query = mysqli_query($sqli,"SELECT  `ID_JADWAL`, `PRODI`, `KELAS`, `ANGKATAN`, `SEMESTER`, `TAHUN_AJARAN`, `HARI`, 
`JAM`, `GEDUNG`, `LANTAI`, `NO_RUANG`, `KODE_MK`, `MATA_KULIAH`, `SKS`, `NAMA_DOSEN`, `NAMA_ASST` FROM `jadwal`
WHERE PRODI = '$prodi'
AND KELAS = '$kelas'
AND ANGKATAN = '$angkatan' 
AND SEMESTER =  '$semester'
AND TAHUN_AJARAN = '$thajaran'
            
            


            ");


        } 








        elseif(isset($_POST['halaman'])) {
            $halaman = $_POST['halaman'];
            $i = ($halaman - 1) * $jml_per_halaman  + 1;
            $query = mysqli_query($sqli,"SELECT   `ID_JADWAL`, `PRODI`, `KELAS`, `ANGKATAN`, `SEMESTER`, `TAHUN_AJARAN`, `HARI`, 
`JAM`, `GEDUNG`, `LANTAI`, `NO_RUANG`, `KODE_MK`, `MATA_KULIAH`, `SKS`, `NAMA_DOSEN`, `NAMA_ASST` FROM `jadwal` LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman");
        // query ketika tidak ada parameter halaman maupun pencarian
        } else {
            $query = mysqli_query($sqli,"SELECT   `ID_JADWAL`, `PRODI`, `KELAS`, `ANGKATAN`, `SEMESTER`, `TAHUN_AJARAN`, `HARI`, 
`JAM`, `GEDUNG`, `LANTAI`, `NO_RUANG`, `KODE_MK`, `MATA_KULIAH`, `SKS`, `NAMA_DOSEN`, `NAMA_ASST` FROM `jadwal`
LIMIT 0,$jml_per_halaman");
            $halaman = 1; //tambahan
        }
         
        // tampilkan data  selama masih ada
        while($data = mysqli_fetch_array($query)) {
         
    ?>
    <tr>
        <td><?php echo $i ?></td>



        <td><center><?php echo $data['PRODI'] ?></center></td>
        <td><center><?php echo $data['ANGKATAN'] ?></center></td>
        <td><center><?php echo $data['HARI'] ?></center></td> 
        <td><center><?php echo $data['KELAS'] ?></center></td>
        <td><center><?= $data['JAM'].'-'.jamkul($data['JAM'],$data['SKS']);?></center></td>

        <td><center><?php echo $data['SEMESTER'] ?></center></td>
        <td><center><?php echo $data['TAHUN_AJARAN'] ?></center></td>
        <td><center><?php echo $data['GEDUNG'] ?></center></td> 
        <td><center><?php echo $data['LANTAI'] ?></center></td>
        <td><center><?php echo $data['NO_RUANG'] ?></center></td>

        <td><center><?php echo $data['KODE_MK'] ?></center></td>
        <td><center><?php echo $data['MATA_KULIAH'] ?></center></td>
        <td><center><?php echo $data['SKS'] ?></center></td> 
        <td><center><?php echo $data['NAMA_DOSEN'] ?></center></td>
        <td><center><?php echo $data['NAMA_ASST'] ?></center></td>
        
      
        <td align="center">
            <a href="#dialog-jadwal" id="<?=$data['ID_JADWAL'] ?>" class="btn btn-warning ubah" data-toggle="modal">
                <i class="icon icon-pencil ubah"></i> Ubah </a> 
            <a href="#" id="<?php echo $data['ID_JADWAL'] ?>" class="btn btn-danger hapus">
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
<?php if(!isset($_POST['cari']) &&!isset($_POST['filter']) ) { ?>
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