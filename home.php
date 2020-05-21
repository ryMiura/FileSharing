<?php
//セッションスタート
session_start();
//データベース接続ファイル読み込み
require_once("smarty_init.php");
require_once("db_init.php");
require_once("file_download.php");
require_once("Pager/Pager.php");


//ログインされている状態だったら
if(isset($_SESSION['us']) && $_SESSION['us'] != null){
 $smarty->assign("upload_disp",'OK');

 try{

   $ps= $pdo->query("SELECT * FROM `table1`");
   $personaldata=[];

   if($ps->rowCount()>0){
     while($r=$ps->fetch()){
       $personaldata[]=array(
         $r['filename'],$r['date'],$r['size'],$r['id']
       );
     }
     $smarty->assign('personaldata', $personaldata);
   }
   $options = array(
     //トータルアイテム数
     "totalItems" => 11,
     //ページリンク数
     "delta" => 5,
     //1ページに表示させるアイテム数
     "perPage" => 3
   );

   $pager =& Pager::factory($options);
   $navi = $pager -> getLinks();
   $smarty->assign('navi', $navi["all"]);


   $currentPageID = $pager -> getCurrentPageID();
   $index = ($currentPageID - 1) * 3 + 1;

  print("<p>");
  for($i = $index; $i < $index + 3 ; $i++){
    if ($i <= 11){
      print($i);
      print(" ");
    }
  }
  print("</p>");
  print("現在のページ番号は".$currentPageID);


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
