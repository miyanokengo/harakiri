<?php
// 例：フォローする処理
session_start();
$follower_id = $_SESSION['id']; // ログインユーザーのID
$followed_id = $_POST['followed_user_id']; // フォローする対象のユーザーID

// followsテーブルに挿入するSQLクエリ
$sql = "INSERT INTO follows (follower_id, followed_id) VALUES (:follower_id, :followed_id)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':follower_id', $follower_id, PDO::PARAM_INT);
    $stmt->bindParam(':followed_id', $followed_id, PDO::PARAM_INT);
    $stmt->execute();
    // 成功時の処理
    echo "フォローしました。";
} catch (PDOException $e) {
    die("フォローに失敗しました: " . $e->getMessage());
}


// 例：フォロー解除の処理
session_start();
$follower_id = $_SESSION['id']; // ログインユーザーのID
$followed_id = $_POST['followed_user_id']; // フォロー解除する対象のユーザーID

// followsテーブルから削除するSQLクエリ
$sql = "DELETE FROM follows WHERE follower_id = :follower_id AND followed_id = :followed_id";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':follower_id', $follower_id, PDO::PARAM_INT);
    $stmt->bindParam(':followed_id', $followed_id, PDO::PARAM_INT);
    $stmt->execute();
    // 成功時の処理
    echo "フォローを解除しました。";
} catch (PDOException $e) {
    die("フォロー解除に失敗しました: " . $e->getMessage());
}
?>


