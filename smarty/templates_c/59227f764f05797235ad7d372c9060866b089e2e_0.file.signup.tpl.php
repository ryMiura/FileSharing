<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-18 23:11:07
  from '/Applications/MAMP/htdocs/fileShare/smarty/templates/signup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ec3160b9369c3_51221124',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59227f764f05797235ad7d372c9060866b089e2e' => 
    array (
      0 => '/Applications/MAMP/htdocs/fileShare/smarty/templates/signup.tpl',
      1 => 1589524641,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec3160b9369c3_51221124 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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


	</style>

  <body>
    <h5><span class="bg-light">新規登録</span></h5>
    <div class="container">

      <h2 class="text-center my-5">新規会員登録</h2>
      <div class="card-header bg-warning">
         IDとパスワードを入力の上「新規登録」ボタンをクリックしてください
     </div>
        <div class="card card-container">

         <p id="profile-name" class="profile-name-card"></p>

            <form class="form-signin mb10" action="register.php" method="POST">
                <p><span class="badge badge-primary">必須</span>ユーザー名
                  <input type="text" name = "u" class="form-control mb10 m-2" placeholder="ユーザーID" autofocus></p>
                <small>
                    最大16文字、半角英数字のみ使用可能です。
                </small>
                <p><span class="badge badge-primary">必須</span>パスワード
                  <input type="password" name = "p" class="form-control m-2" placeholder="パスワード" ></p>
                <small>
                    4文字以上最大16文字まで、半角英数字のみ使用可能です。
                </small>
                <div class = "buttons">

                  <button class="btn btn-primary m-3" name = "signup" type="submit">新規登録</button>
                </div>

            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->


    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"><?php echo '</script'; ?>
>

  </body>
</html>
<?php }
}
