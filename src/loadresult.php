<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

require_once 'PHPExcel.php';
require_once '../connect.php';


$sql1 = "SELECT * FROM students ORDER BY surname ASC";
	$sql2="SELECT * FROM `object` where semestr = 1 ORDER BY `name` ASC";
	$resultsql = mysqli_query($link,$sql1);
	$result_obj = mysqli_query($link,$sql2);

if(isset($_POST['submit_excel']) && isset($_POST['srzngr'])
&& isset($_POST['kachgr']) && isset($_POST['realgr'])
/*&& isset($_POST['r{$c}c{$i}']) */){
		
	//var_dump($_POST['r{$c}c{$i}']);


		$srzngr = htmlentities($_POST["srzngr"]);
		$srzngr = isset($srzngr) ? $srzngr : '';

		$kachgr =  htmlentities($_POST["kachgr"]);
		$kachgr = isset($kachgr) ? $kachgr : '';

		$realgr =  htmlentities($_POST["realgr"]);
		$realgr  = isset($realgr) ? $realgr : '';

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("")
 ->setLastModifiedBy("");
$objPHPExcel->getActiveSheet()->setTitle('Успевамость');
$sheet = $objPHPExcel->setActiveSheetIndex(0);
	if(mysqli_num_rows($resultsql)>0) {
		
					  $i=3; $number=1;
		while($row = mysqli_fetch_array($resultsql)){
			$sheet ->setCellValueByColumnAndRow(0,$i, $number)
			->setCellValueByColumnAndRow(1,$i, $row["surname"]);
			$i++;
			$number++;
		}
	if(mysqli_num_fields($result_obj)>0){
				  $j=2;
		while($column = mysqli_fetch_array($result_obj)){
			$sheet->setCellValueByColumnAndRow($j,2, $column["name"]);
			
			$j++;
		}
				$sheet->setCellValue('C'.$i,$realgr)
				->setCellValue('B'.$i,'Реал. станд.по группе');
				$i++;
				$sheet->setCellValue('C'.$i,$kachgr)
				->setCellValue('B'.$i,'Качество знаний по гр');
				$i++;
				$sheet->setCellValue('C'.$i,$srzngr)
				->setCellValue('B'.$i,'Средний балл по группе');
				
	}
	$sheet;
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
