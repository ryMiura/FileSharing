<?php


//coockieにsessionid情報を入力
session_start();

if(isset($_POST['signup'])){
    header('Location:signup.php');
}

$user = isset($_POST['u'])?htmlspecialchars($_POST['u'],ENT_QUOTES):null;
$pass = isset($_POST['p'])?htmlspecialchars($_POST['p'],ENT_QUOTES):null;

require_once("db_init.php");

 ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>トップ画面</title>
  </head>
  <body>
<?php

  
  $ps= $db->query("SELECT pass FROM `logintable` WHERE `user` = '$user'");
  if($ps->rowCount()>0){
    $r=$ps->fetch();

    if($r['pass'] === md5($pass)){
      $_SESSION['us'] = $user;

      //header('Location:home.php');
?>
<script>
  window.location.href = 'home.php';
</script>

<?php

      }else{
    session_destroy();

  ?>
  <p>パスワードが違います<br>
  <a href="logon.html">ログイン</a></p>
  <?php
  }

}else{
  session_destroy();
  ?>

  <p>ユーザーが登録されていません<br>
  <a href="logon.html">ログイン</a></p>
  <?php
}


 ?>


  </body>
</html>
