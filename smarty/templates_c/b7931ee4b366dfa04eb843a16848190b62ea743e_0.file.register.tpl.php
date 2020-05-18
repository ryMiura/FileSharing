<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-18 23:11:15
  from '/Applications/MAMP/htdocs/fileShare/smarty/templates/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ec31613856916_01393656',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7931ee4b366dfa04eb843a16848190b62ea743e' => 
    array (
      0 => '/Applications/MAMP/htdocs/fileShare/smarty/templates/register.tpl',
      1 => 1589760825,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec31613856916_01393656 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ユーザー登録完了画面</title>
  </head>
  <body>
    <?php if ($_smarty_tpl->tpl_vars['e']->value) {?>
       <p><?php echo $_smarty_tpl->tpl_vars['e']->value;?>
</p>
       <a href = "signup.php">戻る</a>
    <?php } else { ?>
      <p>会員登録が完了しました</p>
      <a href="logon.html">ログイン画面へ</a>
    <?php }?>


  </body>
</html>
<?php }
}
