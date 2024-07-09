<?php
// データベース接続情報
//ここには自分のデータベース情報を入れる
$servername = "localhost";
$username = "ユーザー名";
$password = "パスワード";
$dbname = "データベース名";

// POSTデータから値を取得
$user_id = $_POST['user_id'];
$username = $_POST['username'];
$bio = $_POST['bio'];

// 画像の処理
$profile_image_url = null;
if ($_FILES['profile_image_url']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['profile_image_url']['tmp_name'];
    $profile_image_url = 'uploads/' . $_FILES['profile_image_url']['name'];
    move_uploaded_file($tmp_name, $profile_image_url);
}

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("データベース接続エラー: " . $conn->connect_error);
}

// SQLクエリを準備
$sql = "INSERT INTO profiles (user_id, username, bio, profile_image_url) VALUES (?, ?, ?, ?)";

// SQLステートメントを準備
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $user_id, $username, $bio, $profile_image_url);

// クエリを実行し、挿入を試みる
if ($stmt->execute()) {
    echo "新しいレコードがデータベースに挿入されました。";
} else {
    echo "エラー: " . $sql . "<br>" . $conn->error;
}

// ステートメントを閉じる
$stmt->close();

// データベース接続を閉じる
$conn->close();
?>