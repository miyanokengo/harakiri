<?php
require_once 'db_connect.php'; // データベース接続設定ファイル
function fetch_user_info_from_database($user_id) {
    global $pdo; // db_connect.phpで定義されたPDOオブジェクトを利用するためにglobalで参照
    // SQLクエリを準備
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :user_id');
    // パラメータをバインド
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    // クエリを実行
    $stmt->execute();
    // 結果を取得（連想配列として返す）
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
session_start();
// プロフィールページでセッションからユーザーIDを取得し、該当するユーザー情報を取得
$user_id = $_SESSION['usersid'];
//セッションがあるか確認
if (isset($_SESSION['usersid'])) {
    $user_id = $_SESSION['usersid'];
    echo "セッション変数 'usersid' には値が入っています。";
    // $user_id を使って何か処理を行う場合はここに記述する
} else {
    echo "セッション変数 'usersid' は設定されていません。";
    // セッション変数が設定されていない場合の処理を記述する（例えばログインページにリダイレクトするなど）
}
$user_info = fetch_user_info_from_database($user_id);
// プロフィール情報を表示
// echo "名前: " . htmlspecialchars($user_info['username']);
// echo "コメント: " . htmlspecialchars($user_info['bio']);
// 編集フォームを表示
echo "<form action='updatemypage.php' method='post'>";
echo "<input type='text' name='username' value='" . htmlspecialchars($user_info['username']) . "'><br>";
echo "<textarea name='bio'>" . htmlspecialchars($user_info['bio']) . "</textarea><br>";
echo "<input type='submit' value='保存'>";
echo "</form>";
?>