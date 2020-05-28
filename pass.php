<?php
//セッションスタート
session_start();
//ファイル読み込み
require_once("smarty_init.php");
require_once("db_init.php");



//ログインされている状態だったら
if(isset($_SESSION['us']) && $_SESSION['us'] != null){
  $smarty->assign('login', 'OK');
  //パスワード変更ボタンが押されたら
  if(isset($_POST['newps'])){
    //エラーを入れておく配列
   $pserr=[];
   $newps=filter_input(INPUT_POST,'newps');
   $newps2=filter_input(INPUT_POST,'newps2');

    //正規表現
    if((!preg_match("/^[A-Za-z0-9]{4,16}$/",$newps))||(!preg_match("/^[A-Za-z0-9]{4,16}$/",$newps))){
      $pserr['password']='パスワードは英数字で4文字以上、16文字以下ににしてください';
    }
    //入力された２つのパスワードが一致しているか
    if($newps != $newps2){
      $pserr['passmissmatch']='入力されたパスワードが一致しません';
    }
    //エラーがない時
    if(count($pserr) === 0){
      try{
        $usid=$_SESSION['usid'];
        $pdo->query("UPDATE logintable SET pass=md5('$newps') WHERE id = '$usid'");
        $alert = "<script type='text/javascript'>alert('パスワードを変更しました');window.location.href = 'logof.php';</script>";
        echo $alert;
      }catch(Exception $e){
        $pserr['dberr']="データベースに異常があります";
      }
    }
    //エラーがあるときは表示
    $smarty->assign('err', $pserr);
  }else{
    $smarty->assign('err', '');
  }

//ログインされていない状態だったら
}else{
  session_destroy();
  header('Location:logon.html');
}
$smarty->display("pass.tpl");



 ?>
