<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

require_once '../connect.php';
require_once 'PHPExcel.php';
require_once '../vendor/phpoffice/phpword/bootstrap.php';



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

/*$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("")
                             ->setLastModifiedBy("");*/
   
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();


$k=1;
$j=1;


if(isset($_POST['selectsem'])){
$selectsem = $_POST['selectsem'];
      switch ($selectsem) {
       case '1':
            $s = 10;
            break;
        case '2':
           $s = 11;
            break;
      case '3':
            $s = 12;
      break;
       case '4':
            $s = 13;
      break;
      case '5':
            $s=14;
      break;
        case '6':
            $s=15;
      break;
      case '7':
            $s=16;
      break;
      case '8':
            $s=17;
      break;
    }
}





for($row = 25; $row <= $rows_count; $row++){
        $color_hours = $list->getStyleByColumnAndRow(32,$row)->getFill()->getEndColor()->getARGB();
        $hours = $list->getCellByColumnAndRow(32,$row)->getValue();
        $cell = $list->getCellByColumnAndRow($s,$row);
        $object = $list->getCellByColumnAndRow(1,$row);
if($color_hours == 'FF000000' && $hours > 0){
        if($cell=="ДЗ" || $cell=="З"||$cell=="Э"){
        $section->addText("{$object} - {$cell}");
        //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$j, $object)->setCellValue('B'.$j, $cell);
        $j++; 
        }
 
if($object != $row_obj['name']){
            $insert_obj = "INSERT INTO `object` (`id`,`name`,`semestr`,`id_group`) VALUES ('$k','$object','$s','1')";
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


            


/*$objPHPExcel->getActiveSheet()->setTitle('План');


$objPHPExcel->setActiveSheetIndex(0);*/
header('application/vnd.oasis.opendocument.text');
header('Content-Disposition: attachment;filename="tests.odt"');
header('Content-type: application/odt');
//header('Content-Type: application/vnd.oasis.opendocument.spreadsheet');
//header('Content-Disposition: attachment;filename="test.ods"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); 
header ('Cache-Control: cache, must-revalidate'); 
header ('Pragma: public'); 
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
$objWriter->save('php://output');
exit;
?>