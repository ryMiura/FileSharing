<?php
session_start();

require_once("smarty_init.php");
require_once("db_init.php");
//エラーメッセージはここに入れていく
$err=[];


//バリデーション
if(!$username=filter_input(INPUT_POST,'u')){
  $err['name']='名前を記入してください';
}else if(!preg_match("/^[A-Za-z0-9]{4,16}$/",$username)){
  $err['name']='名前は英数字で4文字以上、16文字以下ににしてください';
}
$password=filter_input(INPUT_POST,'p');
//正規表現
if(!preg_match("/^[A-Za-z0-9]{4,16}$/",$password)){
  $err['password']='パスワードは英数字で4文字以上、16文字以下ににしてください';
}
$email=filter_input(INPUT_POST,'email');

if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
    $err['email']='アドレスの形式が不一致です';
}

//エラーがない時
if(count($err) === 0){

    try{

    $pdo->query("INSERT INTO logintable (id, user, pass,email) VALUES (NULL, '$username', md5('$password'),'$email')");
    $alert = "<script type='text/javascript'>alert('登録完了');window.location.href = 'logon.html';</script>";
    echo $alert;

  }catch(Exception $e){

    $err['email']='既に登録ずみのアドレスです';


  }


}
//エラーが存在するときはsignup.phpに戻す
if(count($err)>0){
  $_SESSION=$err;
  header('Location: signup.php');


}else{


}



?>
