<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
require_once 'db_connect.php';

//mysqlに接続
// try {
//     $pdo = new PDO($dsn, $user, $pass);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // エラーモードを例外モードに設定

//     echo "データベース {$database} に接続しました。";

//     //SQL文の作成
//     $sql = "SELECT * FROM profiles";
//     //プリペアードステートメントの作成
//     $stmt = $pdo->prepare($sql);
//     //SQL文の実行
//     $stmt->execute();
//     //結果の取得
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     //テーブルのタイトル行
//     echo "<table>";
//     echo "<thead><tr>";
//     echo "<th>id</th>";
//     echo "<th>user_id</th>";
//     echo "<th>名前</th>";
//     echo "<th>本文</th>";
//     echo "<th>画像</th>";
//     echo "</tr></thead>";
//     echo "<tbody>";

//     foreach ($result as $row) {
//         echo "<tr>";
//         echo "<td>{$row['id']}</td>";
//         echo "<td>{$row['user_id']}</td>";
//         echo "<td>{$row['name']}</td>";
//         echo "<td>{$row['bio']}</td>";
//         echo "<td>{$row['profile_image_url']}</td>";
//         echo "</tr>";
//     }
//     echo "</tbody>";
//     echo "</table>";
// } catch (PDOException $e) {
//     echo "エラーが発生しました。";
//     echo $e->getMessage();
// }
?>
    <a href="createmypage.php">マイページ登録・編集</a>
    <a href="follow_sitai_list.php">フォローしたい人一覧</a>
    <a href="follow_list.php">フォロー一覧</a>
    <a href="follower_list.php">フォロワー</a>

</body>
</html>

