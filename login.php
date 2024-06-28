<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>ログイン</h2>
    <form action="login_process.php" method="post">
        <label for="mail">メールアドレス:</label><br>
        <input type="mail" id="mail" name="mail" required><br><br>
        <label for="password">パスワード:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="ログイン">
    </form>
    <p>アカウントをおもちくんでない方は <a href="register.php">こちら</a></p>
</body>
</html>
