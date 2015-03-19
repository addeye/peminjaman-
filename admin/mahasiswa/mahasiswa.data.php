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
        <th><center>Nim</center></th>
        <th><center>Prodi</center></th>
        <th><center>Jurusan</center></th>
        <th><center>Kelas</center></th>
        <th><center>Angkatan</center></th>
        <th><center>Nama</center></th>
        <th><center>Password</center></th>
        <th><center>Aktif</center></th>
        <th><center>Aksi</center></th>
    </tr>
</thead>
<tbody>
    <?php 
        $i = 1;
        $jml_per_halaman = 5; // jumlah data yg ditampilkan perhalaman
        $jml_data = mysqli_num_rows(mysqli_query($sqli,"SELECT * from mahasiswa"));
        $jml_halaman = ceil($jml_data / $jml_per_halaman);
        // query pada saat mode pencarian
        if(isset($_POST['cari'])) {
            $kunci =$_POST['cari'];


            echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";
            $query = mysqli_query($sqli,"
SELECT m.ID_MAHASISWA,  m.NIM_MAHASISWA, p.PRODI, j.JURUSAN, k.KELAS,a.ANGKATAN, m.NAMA_MAHASISWA, m.`PASSWORD`, s.`STATUS` 
FROM mahasiswa as m 
LEFT JOIN kelas as k on m.ID_KELAS=k.ID_KELAS 
LEFT JOIN jurusan as j ON m.ID_JURUSAN=j.ID_JURUSAN 
LEFT JOIN prodi as p ON m.ID_PRODI=p.ID_PRODI
LEFT JOIN `status` as s on m.ID_STATUS=s.ID_STATUS
LEFT JOIN `angkatan` as a on m.ID_ANGKATAN=a.ID_ANGKATAN

WHERE 
     m.NAMA_MAHASISWA LIKE '%$kunci%'
      OR k.KELAS LIKE '%$kunci%'
      OR p.PRODI LIKE '%$kunci%'
      OR j.JURUSAN  LIKE '%$kunci%'  
      OR s.STATUS  LIKE '%$kunci%'  

            ");
        // query jika nomor halaman sudah ditentukan
        } elseif(isset($_POST['halaman'])) {
            $halaman = $_POST['halaman'];
            $i = ($halaman - 1) * $jml_per_halaman  + 1;
            $query = mysqli_query($sqli," SELECT m.ID_MAHASISWA,  m.NIM_MAHASISWA, p.PRODI, j.JURUSAN, k.KELAS,a.ANGKATAN, m.NAMA_MAHASISWA, m.`PASSWORD`, s.`STATUS` 
FROM mahasiswa as m 
LEFT JOIN kelas as k on m.ID_KELAS=k.ID_KELAS 
LEFT JOIN jurusan as j ON m.ID_JURUSAN=j.ID_JURUSAN 
LEFT JOIN prodi as p ON m.ID_PRODI=p.ID_PRODI
LEFT JOIN `status` as s on m.ID_STATUS=s.ID_STATUS
LEFT JOIN `angkatan` as a on m.ID_ANGKATAN=a.ID_ANGKATAN LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman");
        // query ketika tidak ada parameter halaman maupun pencarian
        } else {
            $query = mysqli_query($sqli,"SELECT m.ID_MAHASISWA,  m.NIM_MAHASISWA, p.PRODI, j.JURUSAN, k.KELAS,a.ANGKATAN, m.NAMA_MAHASISWA, m.`PASSWORD`, s.`STATUS` 
FROM mahasiswa as m 
LEFT JOIN kelas as k on m.ID_KELAS=k.ID_KELAS 
LEFT JOIN jurusan as j ON m.ID_JURUSAN=j.ID_JURUSAN 
LEFT JOIN prodi as p ON m.ID_PRODI=p.ID_PRODI
LEFT JOIN `status` as s on m.ID_STATUS=s.ID_STATUS
LEFT JOIN `angkatan` as a on m.ID_ANGKATAN=a.ID_ANGKATAN
LIMIT 0,$jml_per_halaman");
            $halaman = 1; //tambahan
        }
         
        // tampilkan data mahasiswa selama masih ada
        while($data = mysqli_fetch_array($query)) {
         
    ?>
    <tr>
        <td><center><?php echo $i ?></center></td>
        <td><center><?php echo $data['NIM_MAHASISWA'] ?></center></td>
         <td><center><?php echo $data['PRODI'] ?></center></td>
        <td><center><?php echo $data['JURUSAN'] ?></center></td>
        <td><center><?php echo $data['KELAS'] ?></center></td>
        <td><center><?php echo $data['ANGKATAN'] ?></center></td>
        <td><center><?php echo $data['NAMA_MAHASISWA'] ?></center></td>
        <td><center><?php echo $data['PASSWORD'] ?></center></td>
        <td><center><?php echo $data['STATUS'] ?></center></td>
        <td align="center">
            <a href="#dialog-mahasiswa" id="<?=$data['ID_MAHASISWA'] ?>" class="btn btn-warning ubah" data-toggle="modal">
                <i class="icon icon-pencil ubah"></i> Ubah </a> 
            <a href="#" id="<?php echo $data['ID_MAHASISWA'] ?>" class="btn btn-danger hapus">
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