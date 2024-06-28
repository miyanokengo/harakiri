<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>新規登録</h1>
    <form action="register_process.php" method="post">
        <label for="mail">メールアドレス:</label><br>
        <input type="mail" id="username" name="username" required><br><br>
        <label for="password">パスワード:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="新規登録">
    </form>
    <p>アカウントを持っている方は <a href="login.php">こちら</a></p>
</body>
</html>
