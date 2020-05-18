<?php
session_start();

require_once("smarty/libs/Smarty.class.php");
$smarty = new Smarty();

$smarty->template_dir = './smarty/templates/';
$smarty->compile_dir = './smarty/templates_c/';

$e=1;

if(isset($_SESSION['us']) && $_SESSION['us'] != null){
 $smarty->assign("upload_disp",$e);
}else{
 $smarty->assign("upload_disp",'');
 session_destroy();
}

$smarty->display("home.tpl");
 ?>
