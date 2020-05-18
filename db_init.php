<?php

require_once("data/db_info.php");
ini_set('display_errors',true);
try{

  $dsn = "mysql:host=$SERV;dbname=$DBNM";
  $db = new PDO($dsn,$USER,$PASS,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);

}catch (Exception $e){
  echo '接続失敗です！'.$e->getMessage();
}


 ?>
