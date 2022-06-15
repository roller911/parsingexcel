<?php 
session_start();
  require ("templates/header.php");
?>

<?php

require('connect.php');

if (!isset($_SESSION['sql'])){
  $_SESSION['sql'] = "SELECT * FROM students";
}
$sql_text = $_SESSION['sql'];
$sql = $link->query($sql_text);


if (!isset($_SESSION['obj_sql'])){
  $_SESSION['obj_sql'] = "SELECT * FROM object";
}
$sql_obj = $_SESSION['obj_sql'];
$obj = $link->query($sql_obj);


$page=$_GET['page'];
  if(!isset($page)){
    require('templates/main.php');
  } else if($page =='profile'){
    require('templates/groups.php');
  } else if($page == 'students'){
    require('templates/students.php');
  }else if($page == 'login'){
    require('authorization/index.php');
  }else if($page == 'index'){
    require('templates/main.php');
  }else if($page == 'plans'){
    require('templates/plans.php');
  } else if($page == 'openstudents'){

    $idg = $_GET['id'];

    $good = [];

    foreach ($sql as $product) {
       if($product['id'] == $idg){
         $good = $product;
         break;
       }
     } 

    require('templates/validstud.php');

  }
  else if($page == 'newstudents'){
      require('templates/newstud.php');
    }
    else if($page == 'results'){

$idr = $_GET['id_r'];
if($idg == 0){
      $_SESSION['obj_sql'] = "SELECT * FROM object WHERE semestr = 1 AND id_group=1";
    }
    else{
      $_SESSION['obj_sql'] = "SELECT * FROM product WHERE semestr = $idg";
    }
   $sql_obj = $_SESSION['obj_sql'];
$obj = $link->query($sql_obj);

      require('templates/results.php');
    }






elseif($page=='index_profile'){
      if(isset($_SESSION['user'])){
        
      }else{
        require('authorization/index.php');
      }
  }    
  elseif($page=='register'){
    require('authorization/register.php');
  }elseif($page=='logout'){
    require('authorization/index.php');
  }elseif($page=='profile'){
    require('authorization/profile.php');
  }elseif($page=='admin'){
    require('authorization/admin.php');
  }


?>


<?php 

  require ("templates/footer.php");
?>