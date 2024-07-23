<?php
require_once 'db_connect.php';
session_start(); // セッションを開始
// ログインユーザーのIDを取得
if (!isset($_SESSION['usersid'])) {
    die("ログインしていません。");
}
$follower_id = $_SESSION['usersid'];

// フォロー/フォロー解除のリクエストを処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['followed_user_id'])) {
        die("フォローするユーザーIDが指定されていません。");
    }

    $followed_id = $_POST['followed_user_id'];
    
// 自分自身をフォローできないようにするチェック
if ($follower_id == $followed_id) {
    die("自分自身をフォローすることはできません。");
}
    if (isset($_POST['action']) && $_POST['action'] === 'follow') {
        // フォロー処理
        $sql = "INSERT INTO follows (follower_id, followed_id) VALUES (:follower_id, :followed_id)";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':follower_id', $follower_id, PDO::PARAM_INT);
            $stmt->bindParam(':followed_id', $followed_id, PDO::PARAM_INT);
            $stmt->execute();
            echo "フォローしました。";
        } catch (PDOException $e) {
            die("フォローに失敗しました: " . $e->getMessage());
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'unfollow') {
        // フォロー解除処理
        $sql = "DELETE FROM follows WHERE follower_id = :follower_id AND followed_id = :followed_id";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':follower_id', $follower_id, PDO::PARAM_INT);
            $stmt->bindParam(':followed_id', $followed_id, PDO::PARAM_INT);
            $stmt->execute();
            echo "フォローを解除しました。";
        } catch (PDOException $e) {
            die("フォロー解除に失敗しました: " . $e->getMessage());
        }
    } else {
        die("無効なアクションです。");
    }
} else {
    die("無効なリクエストです。");
}
?>