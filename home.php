<?php
//セッションスタート
session_start();
//データベース接続ファイル読み込み
require_once("smarty_init.php");
require_once("db_init.php");

//ログインされている状態だったら
if(isset($_SESSION['us']) && $_SESSION['us'] != null){
 $smarty->assign("upload_disp",'OK');

 try{

   $ps= $pdo->query("SELECT * FROM `table1`");
   $personaldata=[];

   if($ps->rowCount()>0){
     while($r=$ps->fetch()){
       $personaldata[]=array(
         $r['filename'],$r['date'],$r['size']
       );
     }
     $smarty->assign('personaldata', $personaldata);
   }
 }catch(Exception $e){
   echo "エラーが発生しました。";
 }
//ログインされていない状態だったら
}else{
 $smarty->assign("upload_disp",'');
 session_destroy();
}

$smarty->display("home.tpl");
 ?>
