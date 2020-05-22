<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>アップロード完了</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">

      <div class="upload m-5">
        <h3>アップロードしました</h3>



    <?php

      if(isset($_SESSION['us']) && $_SESSION['us'] != null){

        //$_FILESに格納されている「myf」の情報を変数$fileに代入
        $file = $_FILES['myf'];
        //アップロードされたデータを「filedata/ファイル名」に移動している
        move_uploaded_file($file['tmp_name'],'./filedata/'.$file['name']);
        print <<<eot
        <p>ファイル名：{$file['name']}</p>
        <p>サイズ：{$file['size']}バイト</p>
        <p>MINEタイプ：{$file['type']}</p>
        eot;




        if(($file['type']=="image/jpeg")||($file['type']=="image/png")||($file['type']=="image/gif")){
          print <<<eot
          <img src = "filedata/{$file['name']}" width="300">
          eot;
        }
        print <<<eot1
        <p><button type="button" class="btn btn-warning mt-5 "onclick="location.href='home.php'">戻る</button></p>
        eot1;
        //データベースに追加
        require_once("db_init.php");

        try{

          $a=$file['name'];
          $b=date("Y/m/d");
          $c=$file['size'];
          $pdo->query("INSERT INTO `table1` VALUES (NULL, '$a', '1', '$b', 'user1','$c')");

        }catch(Exception $e)
        {
          echo "登録できませんでした".$e->getmessage();

        }


    ?>
    <?php
    }else{
      session_destroy();
      print "<p>ログインして下さい</P>";
    }

     ?>
      </div>



</div>

  </body>
</html>
