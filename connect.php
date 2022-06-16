<?php 

//$host='localhost';
$host='127.0.0.1:3306';
$user='root';
$password='root';
$db_name='seainfo';

$link = mysqli_connect($host,$user,$password,$db_name);



if($link->connect_errno){
	exit ('Ошибка подключения к БД' .$link->connect_error);

}

$link->set_charset('utf8');

$sql = $link->query("SELECT * FROM `students` ORDER BY `surname` ASC ");
$obj_sql= $link->query("SELECT * FROM `object`");
$grp_sql = $link->query("SELECT * FROM `group`");
?>