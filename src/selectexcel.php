<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');


require_once 'PHPExcel.php';


$files = move_uploaded_file($_FILES['filename']['tmp_name'],'test/'.$_FILES['filename']['name'] );
$excel = PHPExcel_IOFactory::load('test/'.$_FILES['filename']['name']);
/*echo 'test/'.$_FILES['filename']['name'];*/
$list = $excel->setActiveSheetIndex(2);
$cell2 = $list->getCellByColumnAndRow(11,31);

$rows_count = $list->getHighestRow();
$columns_count = $list->getHighestColumn();

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("")
                             ->setLastModifiedBy("");
           
                            
$j=1;
for($row = 1; $row <= $rows_count; $row++){
        $cell = $list->getCellByColumnAndRow(11,$row);
        if($cell=="ДЗ" || $cell=="З"||$cell=="Э"){
            $object = $list->getCellByColumnAndRow(1,$row);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$j, $object);
         $j++;
        }
    }
    //$str3 = $list->getCell('B27');
  //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2',$str);
        
           /* ->setCellValue('B1', $str2)
            ->setCellValue('A2', $str3)
            ->setCellValue('B2', $str4);*/


            


$objPHPExcel->getActiveSheet()->setTitle('План');


$objPHPExcel->setActiveSheetIndex(0);
header('application/vnd.oasis.opendocument.text');
header('Content-Disposition: attachment;filename="tests.odt"');
//header('Content-Type: application/vnd.oasis.opendocument.spreadsheet');
//header('Content-Disposition: attachment;filename="test.ods"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); 
header ('Cache-Control: cache, must-revalidate'); 
header ('Pragma: public'); 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'OpenDocument');
$objWriter->save('php://output');
exit;
?>