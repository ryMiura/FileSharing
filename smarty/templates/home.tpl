<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ファイルアップローダ</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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



        <div class="filedate-list">
          <ul class="list-group list-group-horizontal">

            <li class="list-group-item active col-5">ファイル名</li>
            <li class="list-group-item active col-2">容量</li>
            <li class="list-group-item active col-3">更新日時</li>
          </ul>

<!-- 繰り返し処理 -->
 {foreach from=$personaldata item=var}

   <ul class="list-group list-group-horizontal">
     <li class="list-group-item col-5">
       <div class="form-check">
          <input class="form-check-input" type="checkbox" id="check1a">
          <label class="form-check-label" for="check1a">{$var[0]}</label>
      </div></li>
     <li class="list-group-item col-2">{$var[2]}</li>
     <li class="list-group-item col-3">{$var[1]}</li>
   </ul>



 {/foreach}






    </div>
    {else}
      <a href = 'logon.html'>ログインして下さい</a>
    {/if}

</div>
</body>
</html>
