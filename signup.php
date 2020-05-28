<?php
session_start();

$err=$_SESSION;
require_once("smarty_init.php");
require_once("db_init.php");


if(isset($err)){
  $smarty->assign("err",$err);
}else{
  $smarty->assign("err",'');
}


$smarty->display("signup.tpl");

 ?>
