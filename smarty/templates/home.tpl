<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ファイルアップローダ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    {if $upload_disp}
    <div class="container">
      <h5 class = " my-5">アップロードするファイルを選んでください</h5>
        <form  action="setup.php" method="post" enctype="multipart/form-data">
          <div class="input-group col-9">
            <div class="custom-file">
              <input type="file" name = "myf" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
              <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
            </div>
            <div class="input-group-append">
              <button class="btn btn-outline-primary ml-5" type="submit" id="inputGroupFileAddon04">アップロード</button>
            </div>
          </div>
        </form>

    </div>
    {else}
      <a href = 'logon.html'>ログインして下さい</a>
    {/if}


</body>
</html>
