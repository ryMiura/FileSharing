<?php
//セッション変数を全て削除
$_SESSION=[];
//セッションの有効期限を60分で設定
session_cache_expire(60);
//セッションを破壊
session_destroy();
//ログオン画面へ遷移
header('Location:logon.html');

 ?>
