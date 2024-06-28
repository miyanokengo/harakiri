<?php
session_start();

// データベース接続情報
$db_host = 'localhost'; // データベースホスト
$db_user = 'username';  // データベースユーザー名
$db_password = 'password'; // データベースパスワード
$db_name = 'database_name'; // 使用するデータベース名

// フォームから送られてきたデータの取得
$username = $_POST['username'];
$password = $_POST['password'];

// パスワードのハッシュ化
$hashed_password = md5($password); // MD5でハッシュ化（セキュリティ上は推奨されない）

// データベース接続
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// 接続エラーの確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ユーザーの存在確認と認証
$stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($user_id, $db_username, $db_password_hash);
$stmt->fetch();

if (password_verify($password, $db_password_hash)) {
    // ログイン成功時の処理
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $db_username;
    header("Location: welcome.php"); // ログイン成功後のリダイレクト先
} else {
    // ログイン失敗時の処理
    echo "Invalid username or password. Please try again.";
}

$stmt->close();
$conn->close();
?>
