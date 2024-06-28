<?php
// データベース接続情報
$db_host = 'localhost'; // データベースホスト
$db_user = 'mail';  // データベースmail
$db_password = 'password'; // データベースパスワード
$db_name = 'harakiri'; // 使用するデータベース名

// フォームから送られてきたデータの取得
$username = $_POST['mail'];
$password = $_POST['password'];

// パスワードのハッシュ化
$hashed_password = password_hash($password, PASSWORD_DEFAULT); // ハッシュ化

// データベース接続
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// 接続エラーの確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ユーザーの新規登録
$stmt = $conn->prepare("INSERT INTO users (mail, password) VALUES (?, ?)");
$stmt->bind_param("ss", $mail, $hashed_password);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
