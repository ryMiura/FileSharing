<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>アップロード完了</title>
  </head>
  <body>
    <h3>アップロードしました</h3>

<?php

  if(isset($_SESSION['us']) && $_SESSION['us'] != null){

    //$_FILESに格納されている「myf」の情報を変数$fileに代入
    $file = $_FILES['myf'];
    //アップロードされたデータを「filedata/ファイル名」に移動している
    move_uploaded_file($file['tmp_name'],'./filedata/'.$file['name']);
    echo "ファイル名：".$file['name']."<br>";
    echo "サイズ：".$file['size']."バイト<br>";
    echo "MIMEタイプ：".$file['type']."<br>";

    print <<<eot
    <img src = filedata/{$file['name']}>
    eot;

    //データベースに追加
    require_once("db_init.php");

    try{

      $a=$file['name'];
      $b=date("Y/m/d");
      $db->query("INSERT INTO `table1` VALUES (NULL, '$a', '1', '$b', 'user1')");

    }catch(Exception $e){


    }

?>
<?php
}else{
  session_destroy();
  print "<p>ログインして下さい</P>";
}

 ?>
</div>

  </body>
</html>
