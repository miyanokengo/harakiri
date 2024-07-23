<?php
// セッションからユーザーIDを取得
session_start();
require_once 'db_connect.php'; // データベース接続設定ファイル
$user_id = $_SESSION['usersid'];
// POSTされた新しい名前とコメントを取得
$new_name = $_POST['username'];
$new_bio = $_POST['bio'];
// データベースを更新
update_user_profile($pdo,$user_id, $new_name, $new_bio);
// セッションに保存されているユーザー情報を更新
$_SESSION['user_name'] = $new_name;
$_SESSION['user_bio'] = $new_bio;
// 完了メッセージを表示
echo "プロフィールが更新されました。";
echo '<meta http-equiv="refresh" content="0;URL=\'mypage.php\'">';
?>