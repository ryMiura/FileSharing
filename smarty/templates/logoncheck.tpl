<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ログオン画面</title>
  </head>
  <body>
    {if $e}
    <script type="text/javascript">
      alert("{$e}");
      window.location="logon.html";
    </script>
    {else}

    {/if}
  </body>
</html>
