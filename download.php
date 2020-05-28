<?php
require_once("db_init.php");
require_once("file_download.php");

session_start();

//どのidのファイルをダウンロードするか
if(isset($_SESSION['us']) && ($_SESSION['us'] != null)){
  if(isset($_POST['dlno'])){
    $dlno=$_POST['dlno'];
    try{
      $ps= $pdo->query("SELECT * FROM `filetable` WHERE `id`='$dlno'");
      if($ps->rowCount()>0){
        while($r=$ps->fetch()){
          $pname = mb_convert_encoding($r['name'], "JIS", "auto");
          $filename= "./filedata/".$pname;
          //ファイル名を指定してダウンロード
          download($filename);
        }
      }
    }catch(Exception $e){
      echo "エラーが発生しました。";
    }

  }else{
    header('Location:home.php');
  }

}else{
  session_destroy();
  header('Location:logon.html');
}





 ?>
