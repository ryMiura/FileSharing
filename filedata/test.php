<?php
require_once("smarty/libs/Smarty.class.php");
$smarty = new Smarty();

$smarty->template_dir = ‘templates/’;
$smarty->compile_dir  = ‘templates_c/’;

$smarty->assign("hello","Hello World");

$smarty->assign("test1", "１行目");
$smarty->assign("test2", "２行目");
$smarty->assign("test3", "３行目");

$smarty->display("test.html");

 ?>
