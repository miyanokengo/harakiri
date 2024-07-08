<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームから送信されたデータの取得
    $tweet_content = $_POST['tweet_content'];

    // 画像のアップロード処理
    $target_dir = "uploads/"; // アップロード先ディレクトリ
    $target_file = $target_dir . basename($_FILES["tweet_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // 画像ファイルとしてアップロードされたかどうかを確認
    if (!empty($_FILES["tweet_image"]["tmp_name"])) {
        $check = getimagesize($_FILES["tweet_image"]["tmp_name"]);
        if ($check !== false) {
            echo "ファイルは画像です - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "ファイルは画像ではありません。";
            $uploadOk = 0;
        }
    }

    // ツイート内容の処理（例：データベースに保存する、他の処理を行うなど）
    // ここでは単純にツイート内容を表示するだけとします
    echo "<h2>ツイート内容</h2>";
    echo "<p>" . htmlspecialchars($tweet_content) . "</p>";

    // アップロード処理の実行
    if ($uploadOk == 0) {
        echo "ファイルのアップロードに失敗しました。";
    } else {
        if (move_uploaded_file($_FILES["tweet_image"]["tmp_name"], $target_file)) {
            echo "ファイル ". basename($_FILES["tweet_image"]["name"]). " がアップロードされました。";
            // ここで画像のパスなどの処理を行うことができます
        } else {
            echo "ファイルのアップロード中にエラーが発生しました。";
        }
    }
}
?>
