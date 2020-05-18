<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-18 23:10:49
  from '/Applications/MAMP/htdocs/fileShare/smarty/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ec315f92751b3_77272083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81c0af1842c5e3fd412d413e4fcf18345e8215d4' => 
    array (
      0 => '/Applications/MAMP/htdocs/fileShare/smarty/templates/home.tpl',
      1 => 1589761706,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec315f92751b3_77272083 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ファイルアップローダ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php if ($_smarty_tpl->tpl_vars['upload_disp']->value) {?>
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
    <?php } else { ?>
      <a href = 'logon.html'>ログインして下さい</a>
    <?php }?>


</body>
</html>
<?php }
}
