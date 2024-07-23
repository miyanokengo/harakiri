<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #DDDDDD;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #F2F2F2;
        }
    </style>
</head>
<body>
<?php
session_start();
require_once 'db_connect.php';
function es($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
try {
    $logged_in_user_id = $_SESSION['usersid'];
    // SQL文の作成
    $sql = "SELECT * FROM users";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>";
    echo "<thead><tr>";
    echo "<th>id</th>";
    echo "<th>メール</th>";
    echo "<th>パスワード</th>";
    echo "<th>名前</th>";
    echo "<th>フォロー</th>";
    echo "</tr></thead>";
    echo "<tbody>";
    foreach ($result as $row) {
        $profile_user_id = $row['id'];
        // フォロー状態を確認するクエリ
        $follow_sql = "SELECT COUNT(*) FROM follows WHERE follower_id = :follower_id AND followed_id = :followed_id";
        $follow_stm = $pdo->prepare($follow_sql);
        $follow_stm->bindParam(':follower_id', $logged_in_user_id, PDO::PARAM_INT);
        $follow_stm->bindParam(':followed_id', $profile_user_id, PDO::PARAM_INT);
        $follow_stm->execute();
        $is_following = $follow_stm->fetchColumn() > 0;
        echo "<tr>";
        echo "<td>", es($row['id']), "</td>";
        echo "<td>", es($row['mail']), "</td>";
        echo "<td>", es($row['password']), "</td>";
        echo "<td>", es($row['name']), "</td>";
        if ($is_following) {
            echo "<td>
            <form action='follow_management.php' method='POST'>
                <input type='hidden' name='followed_user_id' value='", es($row['id']), "'>
                <input type='hidden' name='action' value='unfollow'>
                <button type='submit'>フォロー解除</button>
            </form>
            </td>";
        } else {
            echo "<td>
            <form action='follow_management.php' method='POST'>
                <input type='hidden' name='followed_user_id' value='", es($row['id']), "'>
                <input type='hidden' name='action' value='follow'>
                <button type='submit'>フォロー</button>
            </form>
            </td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} catch (Exception $e) {
    echo '<span class="error">エラー発生: </span><br>';
    echo $e->getMessage();
    exit();
}
?>
</body>
</html>