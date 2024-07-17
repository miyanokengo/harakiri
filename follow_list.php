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
echo "<th>","mail","</th>";
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
    echo "<td><form action='follow_management.php' method='GET'>
    <input type='hidden' name='id' value='", es($row['id']), "'>
    <button type='submit'>フォロー</button>
    </form></td>"; // ボタンの形式で登録処理ページに送信する
    echo "</tr>";
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