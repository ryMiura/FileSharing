<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ファイルアップローダ</title>
    <link rel="stylesheet" href="./css/stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<style media="screen">
  .custom-file-label{
    overflow:hidden;
  }
</style>
<body>
  <!-- きちんとログインされていたら表示 -->
    {if $upload_disp}
    <div class="container">
      <header>
        <p class="bg-light">{$usname}さんのページです</p>
        <button type="button" class="btn btn-primary headerbt" onclick="location.href='logof.php'">ログオフ</button>
        <form class="" action="pass.php" method="post">
          <button type="submit" class="btn btn-warning headerbt" >パスワードを変更する</button>
        </form>
      </header>
      <div class="uoloadwrapper m-3">
        <h5 class = " my-5">アップロードするファイルを選んでください</h5>
        <form  action="setup.php" method="post" enctype="multipart/form-data">
          <div class="input-group col-9">
            <div class="custom-file">
              <input type="file" name = "myf" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" required>
              <label class="custom-file-label" for="inputGroupFile04" value="coose file">ファイルを選択して下さい</label>
            </div>
            <div class="input-group-append">
              <button class="btn btn-outline-primary ml-5" type="submit" id="inputGroupFileAddon04">アップロード</button>
            </div>
          </div>
        </form>
      </div>
      <hr>

          <!-- 検索と削除　ボタン -->
          <!-- もしアップロードしているリストが1件でもあれば   -->

          <div class="btn_wrapper">
            <form class="form-signin col-3" action="home.php" method="post" id="delform"></form>
            <form class="form-signin col-3" action="home.php" method="post" id="searchform"></form>
            <form class="form-signin col-3" action="home.php" method="post" id="clearform"></form>
              <div class="row">

                <input type="text" class="ml-3 col-5" form="searchform" name="searchText" value="">
                <input type="submit" class="mr-2 btn btn-secondary" form="searchform" name="search" value="検索">
                <input type="submit" class="mr-2 btn btn-secondary" form="clearform" name="clear" value="クリア">
                <button type="submit" form="delform" class="del-btn btn btn-danger ml-5 col-1" name="del">削除</button>
              </div>
            </div>
{if $filelist}
<p class="mx-3">現在のページ：{$page}</p>
        <div class="filedate-list">
          <ul class="list-group list-group-horizontal">

            <li class="list-group-item active col-4">ファイル名</li>
            <li class="list-group-item active col-2">

              <form class="" action="home.php" method="post">
                  <label for="">容量</label>
                <select name="order">
                  <option value='non'>---</option>
                  <option value='asc'>昇順</option>
                  <option value='desc'>降順</option>
                </select>
                <input type="submit" name="" value="変更">
              </form>

            </li>
            <li class="list-group-item active col-3">

              <form class="" action="home.php" method="post">
                  <label for="">更新日時</label>
                <select name="dateorder">
                  <option value='non'>---</option>
                  <option value='asc'>古い順</option>
                  <option value='desc'>新しい順</option>
                </select>
                <input type="submit" name="" value="変更">
              </form>
            </li>
            <li class="list-group-item active col-2">ダウンロード</li>
          </ul>
          <!-- 繰り返し処理 -->
         {for $foo={$index} to {$index+7}}
          {if $foo<{$cnt}+1}
           <ul class="list-group list-group-horizontal">
             <li class="list-group-item col-4">
               <div class="form-check" id="boxes">
                  <input class="form-check-input" form="delform" name="check[]" type="checkbox" value="{$data[$foo-1][3]}" id="{$data[$foo-1][3]}" onclick="getId(this);">
                  <label class="form-check-label" for="check1a">{$data[$foo-1][0]}</label>
              </div></li>
             <li class="list-group-item col-2">{$data[$foo-1][2]}</li>
             <li class="list-group-item col-3">
               {$data[$foo-1][1]}
             </li>
             <li class="list-group-item col-2">
               <form id="dlform" action="download.php" method="post">
                 <button form="dlform" type="submit" form =""class="del-btn btn btn-info m-1 " name="dlno" value="{$data[$foo-1][3]}">ダウンロード</button>
               </form>
             </li>
           </ul>
         {/if}
        {/for}

        <label for="all"><input form="delform" type="checkbox" value="all" name="allChecked" id="all" onclick="getId(this);">全選択</label>
        <p>{$navi}</p>


        {/if}

         </div>
    {else}
      <a href = 'logon.html'>ログインして下さい</a>
    {/if}
    <script type="text/javascript" src="./JQuery/jQuery.js"></script>

</div>
</body>
</html>
