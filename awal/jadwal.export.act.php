<?php
/** PHPExcel */
require_once '../phpexcel/PHPExcel.php';

include '../phpexcel/PHPExcel/Writer/Excel2007.php';
include '../koneksi/conn.php';
include "../fungsi/sks.php";

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Jakarta');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once '../phpexcel/PHPExcel.php';


// Create new PHPExcel object
//echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$object = new PHPExcel();

// Rename worksheet

$object->getDefaultStyle()
    ->getAlignment()
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$object->getActiveSheet()->setTitle('Jadwal');
for($col = 'A'; $col !== 'P'; $col++) {
    $object->getActiveSheet()
        ->getColumnDimension($col)
        ->setAutoSize(true);
}



//$object->getActiveSheet()->getRowDimension(1)->setRowHeight(-1);










$object->setActiveSheetIndex(0)
            //->setCellValue('A1', 'Kelas : '.$_GET['user'])
            ->setCellValue('A1', 'Prodi')
            ->setCellValue('B1', 'Kelas')
            ->setCellValue('C1', 'Angkatan')
            ->setCellValue('D1', 'Semester')
            ->setCellValue('E1', 'Tahun Ajaran')
            ->setCellValue('F1', 'Hari')
            ->setCellValue('G1', 'Jam')
            ->setCellValue('H1', 'Gedung')
            ->setCellValue('I1', 'Lantai')
            ->setCellValue('J1', 'Nomor Ruangan')
            ->setCellValue('K1', 'Kode MK')
            ->setCellValue('L1', 'Mata Kuliah')
            ->setCellValue('M1', 'SKS')
            ->setCellValue('N1', 'Dosen')
            ->setCellValue('O1', 'Asst Dosen');


$prodi = $_POST['prodi'];
         $kelas = $_POST['kelas'];
            $semester = $_POST['semester'];
            $thajaran = $_POST['thajaran']; 
            $angkatan = $_POST['angkatan'];

            $query = "SELECT  `ID_JADWAL`, `PRODI`, `KELAS`, `ANGKATAN`, `SEMESTER`, `TAHUN_AJARAN`, `HARI`, 
`JAM`, `GEDUNG`, `LANTAI`, `NO_RUANG`, `KODE_MK`, `MATA_KULIAH`, `SKS`, `NAMA_DOSEN`, `NAMA_ASST` FROM `jadwal`
WHERE PRODI = '$prodi'
AND KELAS = '$kelas'
AND ANGKATAN = '$angkatan' 
AND SEMESTER =  '$semester '
AND TAHUN_AJARAN = '$thajaran'";


$result = mysqli_query($sqli,$query) or die(mysqli_error());

$counter = 2;
while ($row = mysqli_fetch_array($result)) 
{
    $ex = $object->setActiveSheetIndex(0);
          $ex->setCellValue("A".$counter,$row['PRODI']);
          $ex->setCellValue("B".$counter,$row['KELAS']);
          $ex->setCellValue("C".$counter,$row['ANGKATAN']);
          $ex->setCellValue("D".$counter,$row['SEMESTER']);
          $ex->setCellValue("E".$counter,$row['TAHUN_AJARAN']);
          $ex->setCellValue("F".$counter,$row['HARI']);
          $ex->setCellValue("G".$counter,$row['JAM'].'-'.jamkul($row['JAM'],$row['SKS']));
         // $data['JAM'].'-'.jamkul($data['JAM'],$data['SKS']);
          $ex->setCellValue("H".$counter,$row['GEDUNG']);
          $ex->setCellValue("I".$counter,$row['LANTAI']);
          $ex->setCellValue("J".$counter,$row['NO_RUANG']);
          $ex->setCellValue("K".$counter,$row['KODE_MK']);
          $ex->setCellValue("L".$counter,$row['MATA_KULIAH']);
          $ex->setCellValue("M".$counter,$row['SKS'] );
          $ex->setCellValue("N".$counter,$row['NAMA_DOSEN']);
          $ex->setCellValue("O".$counter,$row['NAMA_ASST']);


    $counter++;
}

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$object->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Jadwal_Matkul.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5');
$objWriter->save('php://output');
exit;