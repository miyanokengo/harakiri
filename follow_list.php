<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%; /* テーブルの幅を100%に設定 */
            border-collapse: collapse; /* セル間の余白を取り除く */
        }
        th, td {
            border: 1px solid #dddddd; /* セルの境界線を1pxの灰色で設定 */
            padding: 8px; /* セルの内側の余白を設定 */
            text-align: left; /* 文字を左寄せにする */
        }
        th {
            background-color: #f2f2f2; /* ヘッダー行の背景色を設定 */
        }
    </style>
</head>
<body>
<?php
session_start();
require_once 'db_connect.php';
try{
//SQL文の作成
$sql = "SELECT * FROM users";

$stm = $pdo->prepare($sql);

$stm->execute();

$result = $stm->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
echo "<thead><tr>";
echo "<th>","id","</th>";
echo "<th>","mail","</th>";7
echo "<th>","pass","</th>";
echo "<th>","名前","</th>";
echo "<th>","フォロー","</th>";
echo "</thead></tr>";

//値を取り出して行に表示する
echo "<tbody>";
//1行ずつテーブルに入れる
foreach ($result as $row){
    echo "<tr>";
    echo "<td>",es($row['id']),"</td>";
    echo "<td>",es($row['mail']),"</td>";
    echo "<td>",es($row['password']),"</td>";
    echo "<td>",es($row['name']),"</td>";
    echo "<td><button>フォロー</button></td>"; // 登録ボタンを追加
    echo "</tr>";

// もしログインしていない場合はログインページにリダイレクトするなどの処理を行う。

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
    $follows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
echo "</tbody>";
echo "</body>";

}catch(Exception $e){
    echo '<span class="error">エラー発見</span><br>';
    echo $e->getMessage();
    exit();
}
    function es($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
</body>
</html>