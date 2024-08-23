<?php
// データベースへの接続
require_once 'db_connect.php'; // db_connect.php は実際のデータベース接続情報を含む必要があります

// POSTされたデータの取得
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $bio = $_POST['bio'];

    // SQL文の準備
    $sql = "INSERT INTO users (name, bio) VALUES (:name, :bio)";

    try {
        // ステートメントの準備
        $stmt = $pdo->prepare($sql);

        // パラメータのバインド
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);

        // SQL実行
        $stmt->execute();

        // 成功時のメッセージ
        echo "マイページが登録されました。";

    } catch (PDOException $e) {
        // エラーメッセージの表示
        echo "エラー: " . $e->getMessage();
    }
}
?>