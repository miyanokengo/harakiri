<?php
// データベース接続情報を含むファイルを読み込む
require_once 'db_connect.php'; // 例: データベース接続設定ファイル

session_start();

// もしログインしていない場合はログインページにリダイレクトするなどの処理を行う

// ログインしているユーザーのIDを取得
$user_id = $_SESSION['user_id']; // 仮のセッション変数名

// フォローしているユーザーの一覧を取得するSQLクエリ
$sql = "SELECT u.username 
        FROM users u
        JOIN follows f ON u.user_id = f.followed_id
        WHERE f.follower_id = :user_id
        ORDER BY u.username ASC"; // ユーザー名の昇順で取得する例

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $follows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>フォロー一覧</title>
</head>
<body>
    <h1>フォローしているユーザー一覧</h1>
    <ul>
        <?php foreach ($follows as $follow): ?>
            <li><?php echo htmlspecialchars($follow['username']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
