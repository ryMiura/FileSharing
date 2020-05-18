<?php
require_once("smarty/libs/Smarty.class.php");
$smarty = new Smarty();

//$smarty->template_dir = ‘templates/’;
//$smarty->compile_dir  = ‘templates_c/’;


$smarty->template_dir = './smarty/templates/';
$smarty->compile_dir = './smarty/templates_c/';
$smarty->config_dir

require_once("db_init.php");
//エラーメッセージはここに入れていく
$err=[];


//バリデーション
if(!$username=filter_input(INPUT_POST,'u')){
  $err[]='名前を記入してください';
}else if(!preg_match("/^[A-Za-z0-9]{4,16}$/",$username)){
  $err[]='名前は英数字で4文字以上、16文字以下ににしてください';
}
$password=filter_input(INPUT_POST,'p');
//正規表現
if(!preg_match("/^[A-Za-z0-9]{4,16}$/",$password)){
  $err[]='パスワードは英数字で4文字以上、16文字以下ににしてください';

}
//エラーがない時
if(count($err) === 0){

  //ユーザーを登録する処理
  //$sql="INSERT INTO logintable(user,pass) VALUES(?,?)"
  //ユーザーデータを配列にいれる

  try{

    $db->query("INSERT INTO logintable (id, user, pass) VALUES (NULL, '$username', md5('$password'))");

  }catch(Exception $e){


  }


}
if(count($err)>0){
  foreach($err as $e){

    $smarty->assign("e",$e);
  }

}else{
  $smarty->assign("e",'');
}

$smarty->display("register.tpl");

?>
