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
  } elseif($page=='index_profile'){
      if(isset($_SESSION['user'])){
          if($_SESSION['user']['role'] == '1'){
            require ('authorization/admin.php');

          }elseif($_SESSION['user']['role'] == '0'){
            require('authorization/profile.php');
          }
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