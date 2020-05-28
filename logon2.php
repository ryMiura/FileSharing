<?php
//coockieにsessionid情報を入力
session_start();
//ファイル読み込み
require_once("db_init.php");
require_once("smarty_init.php");
//新規登録ボタンがクリックされているときはsignup.phpへ遷移
if(isset($_POST['signup'])){
    header('Location:signup.php');
}
//入力されたユーザー名、パスワード、アドレスを変数に代入
$user = isset($_POST['u'])?htmlspecialchars($_POST['u'],ENT_QUOTES):null;
$pass = isset($_POST['p'])?htmlspecialchars($_POST['p'],ENT_QUOTES):null;
$email = isset($_POST['email'])?htmlspecialchars($_POST['email'],ENT_QUOTES):null;

//ログインテーブルからIDパスワードをチェック
$ps= $pdo->query("SELECT * FROM `logintable` WHERE `email` = '$email'");
if($ps->rowCount()>0){
  $r=$ps->fetch();

  if(($r['pass'] === md5($pass)) && ($r['user'] == $user)){
    $_SESSION['us'] = $user;
    $_SESSION['usid']=$r['id'];
    $smarty->assign("e",'');

    //header('Location:home.php');
?>

<script>
  window.location.href = 'home.php';
</script>
<?php
    }else{
    session_destroy();
    $smarty->assign("e",'入力情報が間違っています');
    }
  }else{
    session_destroy();
    $smarty->assign("e",'ユーザーが登録されていません');
  }
$smarty->display("logoncheck.tpl");
 ?>
