<?php
session_start();

require_once("smarty_init.php");

$e=1;

if(isset($_SESSION['us']) && $_SESSION['us'] != null){
 $smarty->assign("upload_disp",$e);
}else{
 $smarty->assign("upload_disp",'');
 session_destroy();
}

$smarty->display("home.tpl");
 ?>
