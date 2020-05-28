<?php
//セッション変数を全て削除
$_SESSION=array();
//セッションの有効期限を60分で設定
session_cache_expire(60);
//セッションの情報は$_COOKIE["PHPSESSID"]に保存されているため削除
if(isset($_COOKIE["PHPSESSID"])){
  setcookie("PHPSESSID",'',time()-3600,'/');
}
//セッションを破壊
session_destroy();
//ログオン画面へ遷移
header('Location:logon.html');

 ?>
