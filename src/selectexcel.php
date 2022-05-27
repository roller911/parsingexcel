<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

require_once '../connect.php';
require_once 'PHPExcel.php';



$files = move_uploaded_file($_FILES['filename']['tmp_name'],'test/'.$_FILES['filename']['name'] );
$excel = PHPExcel_IOFactory::load('test/'.$_FILES['filename']['name']);
/*echo 'test/'.$_FILES['filename']['name'];*/
$list = $excel->setActiveSheetIndex(2);
$cell2 = $list->getCellByColumnAndRow(11,31);
$sql_obj ="SELECT * FROM object";
$bd_obj = mysqli_query($link,$sql_obj);
$row_obj = mysqli_fetch_array($bd_obj);

$rows_count = $list->getHighestRow();
$columns_count = $list->getHighestColumn();
$str=$list->getStyle('U50')->getFill()->getEndColor()->getARGB();
$str2=$list->getStyle('U40')->getFill()->getEndColor()->getARGB();

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("")
                             ->setLastModifiedBy("");
//echo($str);
//echo($str2);    

$j=1;
for($row = 25; $row <= $rows_count; $row++){
        $color_hours = $list->getStyleByColumnAndRow(32,$row)->getFill()->getEndColor()->getARGB();
        $hours = $list->getCellByColumnAndRow(32,$row)->getValue();
        $cell = $list->getCellByColumnAndRow(10,$row);
        $object = $list->getCellByColumnAndRow(1,$row);
if($color_hours = 'FF000000' && $hours > 0){
        if($cell=="ДЗ" || $cell=="З"||$cell=="Э"){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$j, $object)->setCellValue('B'.$j, $cell);
        $j++; 
        }
 
if($object != $row_obj['name']){
            $insert_obj = "INSERT INTO `object` (`id`,`name`) VALUES ('$k','$object')";
            $query = $link->query($insert_obj);
            $k++;
        }
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