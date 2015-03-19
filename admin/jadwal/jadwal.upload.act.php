<?PHP
// Tangkap data dari post form
if (isset($_POST["import"])) 
{
    // Koneksi database
include '../../koneksi/conn.php';
 
    // Include ke path PHPExcel
    require '../../phpexcel/PHPExcel.php';
    require_once '../../phpexcel/PHPExcel/IOFactory.php';
 
    // Path file upload
    move_uploaded_file($_FILES['file']['tmp_name'], './' . $_FILES['file']['name']);
    $path = $_FILES['file']['name'];
 
    // Load PHPExcel
    $objPHPExcel = PHPExcel_IOFactory::load($path);
    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
        $worksheetTitle = $worksheet->getTitle();
        $highestRow = $worksheet->getHighestDataRow();
        $highestColumn = $worksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $nrColumns = ord($highestColumn) - 64;


		
		  for ($row = 2; $row <= $highestRow; ++$row) {
        $val = array();
        for ($col = 0; $col < $highestColumnIndex; ++$col) {
            $cell = $worksheet->getCellByColumnAndRow($col, $row);
            $val[] = $cell->getValue();
			
        }
 

            $sql = " INSERT INTO `jadwal`(
            `ID_JADWAL`, 
            `PRODI`,
            `KELAS`,
			`ANGKATAN`,
            `SEMESTER`,
            `TAHUN_AJARAN`,
            `HARI`,
            `JAM`,
			`GEDUNG`,
            `LANTAI`,
            `NO_RUANG`,
            `KODE_MK`, 
			`MATA_KULIAH`,
            `SKS`, 
            `NAMA_DOSEN`,
            `NAMA_ASST`
                ) 
			VALUES 
            (
            '',
            '$val[0]',
            '$val[1]',
            '$val[2]',
            '$val[3]',
            '$val[4]',
			'$val[5]',
            '$val[6]',
            '$val[7]',
            '$val[8]',
            '$val[9]',
            '$val[10]',
			'$val[11]',
            '$val[12]',
            '$val[13]',
            '$val[14]'
            )	
			";
 

 
            // Querykan 
            mysqli_query($sqli,$sql);
       
    }
		
		
    }

  
 
    // Hapus file excel ketika data sudah masuk ke tabel
  @unlink($_FILES['file']['name']);
  header("Location:jadwal.php");
}

?>