<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>新規登録画面</title>
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

    <div class="container">


      <h2 class="text-center mt-5">新規会員登録</h2>
      <div class="card-header bg-warning">
         IDとパスワードを入力の上「新規登録」ボタンをクリックしてください
     </div>
        <div class="card card-container">

         <p id="profile-name" class="profile-name-card"></p>

            <form class="form-signin mb10" action="register.php" method="POST">



                  <p>
                    <label for="username"><span class="badge badge-primary">必須</span>ユーザー名</label>
                    <input type="text" name = "u" class="form-control mb10" placeholder="ユーザーID"  required autofocus>
                  </p>
                  <small>最大16文字、半角英数字のみ使用可能です。</small>
                  <p>
                    <label for="password"><span class="badge badge-primary">必須</span>パスワード</label>
                    <input type="password" name = "p" class="form-control" placeholder="パスワード" required>
                  </p>
                  <small>最大8文字、半角英数字のみ使用可能です。</small>
                  <p>
                    <label for="email"><span class="badge badge-primary">必須</span>メールアドレス</label>
                    <input type="text" name = "email" class="form-control mb10" placeholder="メールアドレス" required autofocus>
                  </p>
                <div class = "buttons">

                  <button class="btn btn-primary m-3" name = "signup" type="submit">新規登録</button>
                  <button type="button" class="btn btn-info ml-3 "onclick="location.href='logon.html'">ログイン画面に戻る</button>
                </div>

            </form><!-- /form -->

            {if  $err}
            <div class="errordipper">


              <p　class="bg-info">登録できませんでした。以下の点を確認して下さい。</p>
              {foreach from=$err item=er }
                <p>{$er}</p>
              {/foreach}
            </div>
            {/if}


        </div><!-- /card-container -->

    </div><!-- /container -->


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
