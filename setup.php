<?php
session_start();
require_once("db_init.php");
require_once("smarty_init.php");


if(isset($_SESSION['us']) && $_SESSION['us'] != null){
  if(isset($_FILES['myf'])){
    $smarty->assign("disp","OK");
    //$_FILESに格納されている「myf」の情報を変数$fileに代入
    $file = $_FILES['myf'];

    //アップロードされたデータを「filedata/ファイル名」に移動している
    $pname = mb_convert_encoding($file['name'], "JIS", "auto");
    move_uploaded_file($file['tmp_name'],'./filedata/'.$pname);
    $smarty->assign("file",$file);


    if(($file['type']=="image/jpeg")||($file['type']=="image/png")||($file['type']=="image/gif")){
      $smarty->assign("img","OK");
    }else{
      $smarty->assign("img","");
    }
    try{

      $fname=$file['name'];
      $fdate=date("Y/m/d");
      $fsize=$file['size'];
      $ope=$_SESSION['usid'];
      $pdo->query("INSERT INTO `filetable` VALUES (NULL, '$fname', '$fsize', '$fdate', '$ope')");

    }catch(Exception $e){
      echo "登録できませんでした".$e->getmessage();
    }


  }else{
    $smarty->assign("disp","");
  }
  $smarty->display("setup.tpl");
}else{
  session_destroy();
  header('Location:logon.html');
}
