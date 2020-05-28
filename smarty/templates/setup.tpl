<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>アップロード</title>

    <div class="container">
      {if $disp}
      <div class="row">
        <h3 class="text-center mt-5">アップロードしました</h3>
      </div>

      <p>ファイル名：{$file['name']}</p>
      <p>サイズ：{$file['size']}バイト</p>
      <p>MINEタイプ：{$file['type']}</p>
    {if $img}
    <img src = "filedata/{$file['name']}" width="300">
    {/if}
    <p><button type="button" class="btn btn-warning mt-5 "onclick="location.href='home.php'">戻る</button></p>
    {else}
      <script type="text/javascript">
        window.location="home.php";
      </script>
    {/if}



    </div><!--container -->
  </head>
  <body>

  </body>
</html>
