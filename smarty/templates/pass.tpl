<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>パスワード変更</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <style>

    .card {
      max-width: 550px;
      padding: 0px 40px 25px 40px;
      background-color: #F7F7F7;
      margin: 0 auto 25px;
      margin-top: 0px;

    }
    .card-header{
      max-width: 550px;
      margin: 0 auto 0px;
    }

    .errordipper{
      background-color: #FFFFFF;
    }

    .errordipper p{
      color: red;
    }

</style>

<body>
{if $login}
  <div class="container">
    <form class="" action="home.php" method="post">
      <input type="submit" name="" value="戻る">
    </form>

      <button type="button" class="btn btn-warning mt-5 "onclick="location.href='home.php'">マイページへ戻る</button>
    <h2 class="text-center my-5">パスワード変更</h2>
    <div class="card-header bg-primary">
       新しいパスワードを入力して下さい
   </div>
      <div class="card card-container">
       <p id="profile-name" class="profile-name-card"></p>
          <form class="form-signin mb10" action="pass.php" method="POST">
           <p>
            <label for="password"><span class="badge badge-primary">必須</span>新しいパスワード</label>
            <input type="password" name = "newps" class="form-control mb10" placeholder="新しいパスワード"  required autofocus>
          </p>

          <p>
            <label for="password"><span class="badge badge-primary">必須</span>確認のためもう1度入力して下さい</label>
            <input type="password" name = "newps2" class="form-control" placeholder="確認のためもう1度入力して下さい" required>
          </p>
            <small>４〜１６文字、半角英数字のみ使用可能です。</small>
            <button class="btn btn-primary m-3" name = "henkou" type="submit">変更</button>
          </form><!-- /form -->
          <!-- エラー文があれば繰り返し表示 -->
          {if  $err}
          <div class="errordipper">
            <p　class="bg-info">変更できませんでした。以下の点を確認して下さい。</p>

            {foreach from=$err item=er }
              <p>{$er}</p>
            {/foreach}
          </div>
          {/if}


      </div><!-- /card-container -->

  </div><!-- /container -->
  {else}
    <p><a href ="logon.html">ログインして下さい</a></p>
  {/if}
  </body>
</html>
