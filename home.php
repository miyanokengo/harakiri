<?php
session_start();
require_once 'db_connect.php';
function es($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
try {
    $sql = "SELECT * FROM tweets";
    $stm = $pdo->prepare($sql); // $pdo を使用する
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    // ここから一覧
    echo "<table>";
    echo "<thead><tr>";
    echo "<th>id</th>";
    echo "<th>user_id</th>";
    echo "<th>content</th>";
    echo "<th>created_at</th>";
    echo "<th>nicepoint</th>";
    echo "<th>image</th>";
    echo "</thead></tr>";
    echo "<tbody>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>", es($row['id']), "</td>";
        echo "<td>", es($row['user_id']), "</td>";
        echo "<td>", es($row['content']), "</td>";
        echo "<td>", es($row['created_at']), "</td>";
        echo "<td>", es($row['nicepoint']), "</td>";
        echo "<td>", es($row['image']), "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} catch (Exception $e) {
    echo '<span class="error">エラーがありました</span><br>';
    echo $e->getMessage();
    exit();
}
?>
        <?php }else{ ?>
    <a href="post.php">
            <div>投稿する</div>
    </a>
    <?php } ?>
</body>
</html>
