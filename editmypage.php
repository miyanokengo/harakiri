<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ編集</title>
</head>
<body>
    <h2>マイページ編集</h2>
    
    <?php
    // データベースから編集するマイページの情報を取得する
    require_once 'db_connect.php'; // データベース接続情報を含むファイルを読み込む

    // 編集するマイページのIDを取得
    $profiles_id = $_GET['id']; // URLパラメータから取得する例

    // マイページの情報を取得するSQLクエリ
    $sql = "SELECT * FROM profiles WHERE id = :id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $profiles_id, PDO::PARAM_INT);
        $stmt->execute();
        $profiles = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($profiles) {
            // フォームを表示する
            ?>
            <form action="update_mypage.php" method="post">
                <input type="hidden" name="id" value="<?php echo $profiles['id']; ?>">
                
                <h3>ユーザー名</h3>
                <div>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($profiles['name'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                
                <h3>説明文</h3>
                <div>
                    <input type="text" name="bio" value="<?php echo htmlspecialchars($profiles['bio'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <button type="submit">更新</button><br>
            </form>
            <?php
        } else {
            echo "マイページが見つかりません。";
        }
    } catch (PDOException $e) {
        echo "エラー: " . $e->getMessage();
    }
    ?>

    <br>
    <a href="マイページ一覧.php">マイページ一覧に戻る</a>
</body>
</html>