<?php
// データベース接続情報を含むファイルを読み込む
require_once 'db_connect.php'; // 例: データベース接続設定ファイル

session_start();

// もしログインしていない場合はログインページにリダイレクトするなどの処理を行う

// ログインしているユーザーのIDを取得
$user_id = $_SESSION['usersid']; // 仮のセッション変数名

// フォローしているユーザーの一覧を取得するSQLクエリ
$sql = "SELECT u.name 
        FROM users u
        JOIN follows f ON u.id = f.followed_id
        WHERE f.follower_id = :usersid
        ORDER BY u.name ASC"; // ユーザー名の昇順で取得する例

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usersid', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $following = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>フォローしているユーザー一覧</title>
    <link rel="stylesheet" href="css/follow_list.css">
</head>
<body>
    <h1>フォローしているユーザー一覧</h1>
    <ul>
        <?php foreach ($following as $user): ?>
            <li><?php echo htmlspecialchars($user['name']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
