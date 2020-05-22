<?php
require_once("db_init.php");
require_once("file_download.php");
//ダウンロードボタンが押されたとき
if (isset($_POST['dl'])) {
  //チェックされた項目がNULLではないとき配列であるとき
  if (isset($_POST['check']) && is_array($_POST['check'])) {
     $check = $_POST["check"];

     foreach ($check as $c) {
       try{

         $ps= $pdo->query("SELECT * FROM `table1` WHERE `id`='$c'");

         if($ps->rowCount()>0){
           while($r=$ps->fetch()){
             $filename= "./filedata/".$r['filename'];
             //ファイル名を指定してダウンロード
             download($filename,text/xml);
           }
         }
       }catch(Exception $e){
         echo "エラーが発生しました。";
       }
     }

  }else{
    //チェックが選択されていないとき
    print "項目を選んでください";
  }
}
//削除ボタンが押されたとき
if (isset($_POST['del'])) {
  //チェックされた項目がNULLではないとき配列であるとき
  if (isset($_POST['check']) && is_array($_POST['check'])) {
     $check = $_POST["check"];

     foreach ($check as $c) {
       try{
         $ps= $pdo->query("DELETE FROM `table1` WHERE `id`='$c'");
         print $c;
       }catch(Exception $e){
         echo "エラーが発生しました。";
       }
     }

  }else{
    //チェックが選択されていないとき
    print "項目を選んでください";
  }
}

 ?>
