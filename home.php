<?php
//セッションスタート
session_start();
//ファイル読み込み
require_once("smarty_init.php");
require_once("db_init.php");
require_once("file_download.php");
require_once("Pager/Pager.php");

//ログインされている状態だったら
if(isset($_SESSION['us']) && $_SESSION['us'] != null){
 $smarty->assign("upload_disp",'OK');




 //削除ボタンが押されたとき
 if (isset($_POST['del'])) {
   //チェックされた項目がNULLではないときと配列であるとき
   if (isset($_POST['check']) && is_array($_POST['check'])) {
      $check = $_POST["check"];

      foreach ($check as $c) {
        try{
          $ps= $pdo->query("DELETE FROM `filetable` WHERE `id`='$c'");


        }catch(Exception $e){
          echo "エラーが発生しました。";
          exit();
        }

      }
      $alert = "<script type='text/javascript'>alert('チェックされた項目を削除しました！');</script>";
      echo $alert;

   }else{
     //チェックが選択されていないとき
     $alert = "<script type='text/javascript'>alert('削除するファイルをチェックして下さい');</script>";
     echo $alert;
   }

 }
 //ユーザー名を表示
 $smarty->assign('usname', $_SESSION['us']);


 $user=$_SESSION['us'];
 $userid=$_SESSION['usid'];
 //アップロードしたファイルリストを表示
 try{


   $usid=$_SESSION['usid'];
   $ps= $pdo->query("SELECT * FROM `filetable` WHERE ope='$usid'");
   //昇順降順のセレクトボックスが選択されたら
   if (isset($_POST['order'])) {
     if($_POST['order']==="asc"){
       $ps= $pdo->query("SELECT * FROM `filetable` WHERE ope='$usid' ORDER BY size ASC");
     }else if($_POST['order']==="desc"){
       $ps= $pdo->query("SELECT * FROM `filetable` WHERE ope='$usid' ORDER BY size DESC");
     }else{

     }
   }
   //日付の昇順、降順が選択されたら
   if (isset($_POST['dateorder'])) {
     if($_POST['dateorder']==="asc"){
       $ps= $pdo->query("SELECT * FROM `filetable` WHERE ope='$usid' ORDER BY ymd ASC");
     }else if($_POST['dateorder']==="desc"){
       $ps= $pdo->query("SELECT * FROM `filetable` WHERE ope='$usid' ORDER BY ymd DESC");
     }else{

     }
   }
   //検索ボタンが押されて、検索ワードが入力されていたら
   if(isset($_POST['search'])){
     $like= $_POST['searchText'];

     $ps= $pdo->query("SELECT * FROM `filetable` WHERE ope='$usid' AND name LIKE '%$like%'");
   }
   //クリアボタン
   if(isset($_POST['clear'])){

     $ps= $pdo->query("SELECT * FROM `filetable` WHERE ope='$usid'");
   }
   $personaldata=[];

   if($ps->rowCount()>0){
     while($r=$ps->fetch()){
       //ファイル名をJISからUTFに変換

       $personaldata[]=array(
         $r['name'],$r['ymd'],$r['size'],$r['id']
       );
     }
     $smarty->assign('personaldata', $personaldata);
     $smarty->assign('filelist', "OK");
     $cnt = count($personaldata);$options = array(
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
     $smarty->assign("index",$index);
     $smarty->assign("data",$personaldata);
     $smarty->assign("page",$currentPageID);

   }else{
     $smarty->assign('filelist', "");
   }
 }catch(Exception $e){
   echo "エラーが発生しました。";
 }

//ログインされていない状態だったら
}else{

 session_destroy();
 header('Location:logon.html');
}
$smarty->display("home.tpl");
 ?>
