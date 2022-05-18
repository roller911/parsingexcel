<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');


require_once 'PHPExcel.php';


$files = move_uploaded_file($_FILES['filename']['tmp_name'],'test/'.$_FILES['filename']['name'] );
$excel = PHPExcel_IOFactory::load('test/'.$_FILES['filename']['name']);
/*echo 'test/'.$_FILES['filename']['name'];*/
$excel->setActiveSheetIndex(2);
$str1 = $excel->getActiveSheet()->getCell('B25');
$str2 = $excel->getActiveSheet()->getCell('K25');
$str3 = $excel->getActiveSheet()->getCell('B31');
$str4 = $excel->getActiveSheet()->getCell('K31');

/*$foundInCells = array();
$searchValue = 'ДЗ';
foreach ($excel->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(true);
        foreach ($cellIterator as $cell) {
            if ($cell->getValue() == $searchValue) {
                $foundInCells[] = $ws . '!' . $cell->getCoordinate();
            }
        }
    }
var_dump($foundInCells);*/

$objPHPExcel = new PHPExcel();


// Set document properties
$objPHPExcel->getProperties()->setCreator("")
							 ->setLastModifiedBy("");
							 


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', $str1)
            ->setCellValue('B1', $str2)
            ->setCellValue('A2', $str3)
            ->setCellValue('B2', $str4);


            

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('План');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
/*header('application/vnd.oasis.opendocument.text');
header('Content-Disposition: attachment;filename="tests.odt"');*/
header('Content-Type: application/vnd.oasis.opendocument.spreadsheet');
header('Content-Disposition: attachment;filename="test.ods"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'OpenDocument');
$objWriter->save('php://output');
exit;
?>