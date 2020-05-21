<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ファイルアップローダ</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
    {if $upload_disp}
    <div class="container">
      <header>
        <button type="button" class="btn btn-primary headerbt">ログオフ</button>
        <!-- <button type="button" class="btn btn-warning headerbt">マイページ</button> -->
      </header>


      <h5 class = " my-5">アップロードするファイルを選んでください</h5>
        <form  action="setup.php" method="post" enctype="multipart/form-data">
          <div class="input-group col-9">
            <div class="custom-file">
              <input type="file" name = "myf" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" required>
              <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
            </div>
            <div class="input-group-append">
              <button class="btn btn-outline-primary ml-5" type="submit" id="inputGroupFileAddon04">アップロード</button>
            </div>
          </div>
        </form>
        <!-- <div class="findfile"> -->
          <!-- <div class="input-group mb-3 col-7"> -->
            <!-- <input type="text" class="form-control" placeholder="検索するワードを入力して下さい" aria-label="Recipient's username" aria-describedby="button-addon2"> -->
            <!-- <div class="input-group-append"> -->
              <!-- <button class="btn btn-outline-secondary" type="button" id="button-addon2">検索</button> -->
            <!-- </div> -->
          <!-- </div> -->


          <div class="m-3">
            <h5>アップロードしたファイル</h5>
          </div>
          <!-- ダウンロード　削除　ボタン -->
          <div class="btn_wrapper">
             <!-- <form　class="form-signin col-3" action="download.php" method="POST"> -->
            <!-- </from> -->
            <!-- <form　class="form-signin col-3" action="delete.php" method="POST"> -->
            <form class="form-signin col-3" action="download.php" method="post">
              <div class="row">
                <button type="submit" class="dl-bt btn btn-warning m-1 "name="dl">ダウンロード</button>
                <button type="submit" class="del-btn btn btn-danger m-1 " name="del">削除</button>
              </div>

            <!--  -->
          </div>

        <div class="filedate-list">
          <ul class="list-group list-group-horizontal">

            <li class="list-group-item active col-4">ファイル名</li>
            <li class="list-group-item active col-2">容量</li>
            <li class="list-group-item active col-3">更新日時</li>
          </ul>



<!-- 繰り返し処理 -->
 {foreach name=loop from=$personaldata item=var}
   <ul class="list-group list-group-horizontal">
     <li class="list-group-item col-4">
       <div class="form-check">
          <input class="form-check-input" name="check[]" type="checkbox" value="{$var[3]}" id="c{$var[3]}">
          <label class="form-check-label" for="check1a">{$var[0]}</label>
      </div></li>
     <li class="list-group-item col-2">{$var[2]}</li>
     <li class="list-group-item col-3">{$var[1]}</li>
    
   </ul>
 {/foreach}
<p>{$navi}</p>

</form>

    </div>
    {else}
      <a href = 'logon.html'>ログインして下さい</a>
    {/if}
    <script type="text/javascript">
    function getId(ele){
        var id_value = ele.id; // eleのプロパティとしてidを取得
        console.log(id_value); //「id01」
    }
    </script>
    <script type="text/javascript" src="./JQuery/JQuery.js"></script>

</div>
</body>
</html>
