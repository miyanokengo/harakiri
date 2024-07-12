<?php
require_once 'db_connect.php';
session_start(); // セッションを開始する（必要に応じて）

// // ログインユーザーのID（セッションなどから取得する）
$loggedInUserId = $_SESSION['usersid'];; // 例として1を使用
var_dump  ($loggedInUserId);
// ユーザーの表示など
// 例としてユーザー1から3までのユーザーを表示する
for ($i = 1; $i <= 3; $i++) {
    if ($i == $loggedInUserId) continue; // 自分自身は表示しない
    // ユーザー情報の取得（仮の処理）
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $i]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
   
    // var_dump  ($);
    


// if (isset($user)) {
//     echo "\$セットされています。";
// } else {
//     echo "\$セットされていません。";
// }

    if ($user) {
        echo "<div>{$user['name']} ";
        // フォローボタンを表示
        // ログインしているユーザーが既にフォローしているかを確認する
        $stmt = $pdo->prepare("SELECT * FROM follows WHERE follower_id = :follower_id AND followed_id = :followed_id");
        $stmt->execute(['follower_id' => $loggedInUserId, 'followed_id' => $i]);
        $isFollowing = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($isFollowing) {
            echo "(フォロー中)";
        } else {
            // フォローボタンを表示
            echo "<form action='follow_management.php' method='post'>";
            echo "<input type='hidden' name='followed_user_id' value='{$i}'>";
            echo "<input type='submit' name='follow' value='フォローする'>";
            echo "</form>";
        }

        echo "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>




</body>
</html>