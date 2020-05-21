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
     $cnt = count($personaldata);

   }

   $options = array(
     //トータルアイテム数
     "totalItems" => $cnt,
     //ページリンク数
     //"delta" => 5,
     //1ページに表示させるアイテム数
     "perPage" => 7,

     "itemData"=>$personaldata
   );

   $pager =& Pager::factory($options);
   $navi = $pager -> getLinks();
   $smarty->assign('navi', $navi["all"]);


   $currentPageID = $pager -> getCurrentPageID();
   $index = ($currentPageID - 1) * 7 + 1;

   $smarty->assign("index",$index);
   $smarty->assign("cnt",$cnt);


  for($i = $index; $i < $index + 7 ; $i++){
    if ($i <= $cnt){
      print <<<eot
      <ul>
        <li>{$personaldata[$i-1][0]}</li>
        <li >{$personaldata[$i-1][1]}</li>
        <li >{$personaldata[$i-1][2]}</li>
      </ul>
      eot;
      $smarty->assign("i",$personaldata[$i]);
    }
  }

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
