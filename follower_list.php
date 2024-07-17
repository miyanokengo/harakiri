<?php
// データベース接続情報を含むファイルを読み込む
require_once 'db_connect.php'; // 例: データベース接続設定ファイル

session_start();

// もしログインしていない場合はログインページにリダイレクトするなどの処理を行う

// ログインしているユーザーのIDを取得
$user_id = $_SESSION['usersid']; // 仮のセッション変数名

// フォロワーの一覧を取得するSQLクエリ
$sql = "SELECT u.name 
        FROM users u
        JOIN follows f ON u.id = f.follower_id
        WHERE f.followed_id = :usersid
        ORDER BY u.name ASC"; // ユーザー名の昇順で取得する例

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usersid', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $followers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>フォロワー一覧</title>
</head>
<body>
    <h1>フォロワー一覧</h1>
    <ul>
        <?php foreach ($followers as $follower): ?>
            <li><?php echo htmlspecialchars($follower['name']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
