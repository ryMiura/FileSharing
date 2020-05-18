<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ユーザー登録完了画面</title>
  </head>
  <body>
    {if $e}
       <p>{$e}</p>
       <a href = "signup.php">戻る</a>
    {else}
      <p>会員登録が完了しました</p>
      <a href="logon.html">ログイン画面へ</a>
    {/if}


  </body>
</html>
