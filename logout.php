<?php
// セッションの開始
session_start();

// セッション変数を全て削除
$_SESSION = array();

// 最終的に、セッションを破壊
session_destroy();

// ログアウト後にリダイレクトする場合、以下のようにリダイレクト先のURLを指定します
header("Location: login.php"); // ログインページのURLを指定する
exit;
?>
