<?php
function download($pPath, $pMimeType = null)
{

  session_start();

   //-- ファイルが読めない時はエラー(もっときちんと書いた方が良いが今回は割愛)
   if (!is_readable($pPath)) { die($pPath); }

   //-- Content-Typeとして送信するMIMEタイプ(第2引数を渡さない場合は自動判定) ※詳細は後述
   $mimeType = (isset($pMimeType)) ? $pMimeType
                                   : (new finfo(FILEINFO_MIME_TYPE))->file($pPath);

   //-- 適切なMIMEタイプが得られない時は、未知のファイルを示すapplication/octet-streamとする
   if (!preg_match('/\A\S+?\/\S+/', $mimeType)) {
       $mimeType = 'application/octet-stream';
   }

   //-- Content-Type
   header('Content-Type:  . $mimeType;charset=UTF-8');

   //-- ウェブブラウザが独自にMIMEタイプを判断する処理を抑止する
   header('X-Content-Type-Options: nosniff');

   //-- ダウンロードファイルのサイズ
   header('Content-Length: ' . filesize($pPath));

   //--ファイル名はUTFー8に変換する
   $pname = mb_convert_encoding(basename($pPath), "UTF-8", "JIS");
   //-- ダウンロード時のファイル名
   header('Content-Disposition: attachment; filename="' . $pname . '"');

   //-- keep-aliveを無効にする
   header('Connection: close');

   //-- readfile()の前に出力バッファリングを無効化する
   while (ob_get_level()) { ob_end_clean(); }

   //-- 出力
   readfile($pPath);

   //-- 最後に終了させるのを忘れない
   exit;
}
?>
