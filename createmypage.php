<?php
require_once 'db_connect.php'; // 例: データベース接続設定ファイル
session_start();
// ログイン処理後、セッションにユーザー情報を保存
// $_SESSION['user_id'] = $user_id;

// プロフィールページでセッションからユーザーIDを取得し、該当するユーザー情報を取得
$user_id = $_SESSION['usersid'];
$user_info = fetch_user_info_from_database($user_id);

// プロフィール情報を表示
echo "名前: " . htmlspecialchars($user_info['name']);
echo "コメント: " . htmlspecialchars($user_info['comment']);

// 編集フォームを表示
echo "<form action='update_profile.php' method='post'>";
echo "<input type='text' name='name' value='" . htmlspecialchars($user_info['name']) . "'><br>";
echo "<textarea name='comment'>" . htmlspecialchars($user_info['comment']) . "</textarea><br>";
echo "<input type='submit' value='保存'>";
echo "</form>";
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ編集</title>
</head>
<body>
     特定ページのコンテンツをここに追加 
     <h2>マイページ編集</h2>
        <form action="insert_mypage.php" method="post">
                <h3>ユーザー名</h3>
                <div>
                    <input type="text" name="username">
                </div>
                
                <h3>説明文</h3>
                <div>
                    <input type="text" name="bio">
                </div>

                <button>更新</button><br>
                <label>マイページ編集は<a href="editmypage.php">コチラ</a></label>
</body>
</html> -->