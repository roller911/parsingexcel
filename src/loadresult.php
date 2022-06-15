<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

require_once 'PHPExcel.php';
require_once '../connect.php';




if(isset($_POST['submit_excel'])){
	$sql1 = "SELECT * FROM students ORDER BY surname DESC";
	$sql2="SELECT * FROM object ORDER BY name DESC";
	$resultsql = mysqli_query($link,$sql1);
	$result_obj = mysqli_query($link,$sql2);
	
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("")
 ->setLastModifiedBy("");
$objPHPExcel->getActiveSheet()->setTitle('Успевамость');

	if(mysqli_num_rows($resultsql)>0) {
		
					  $i=2;
		while($row = mysqli_fetch_array($resultsql)){
			$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $row["surname"]);
			$i++;
		}
	if(mysqli_num_fields($result_obj)>0){
				  $j=2;
		while($column = mysqli_fetch_array($result_obj)){
			$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('B'.$j, $column["name"]);
			$j++;
		}
	}
	$objPHPExcel->setActiveSheetIndex(0);
header('Content-Type: application/vnd.oasis.opendocument.spreadsheet');
header('Content-Disposition: attachment;filename="result.ods"');
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'OpenDocument');
$objWriter->save('php://output');

	}
}

exit;
?>
