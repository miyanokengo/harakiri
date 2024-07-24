<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="login.css" type="text/css">
<title>Document</title>
</head>
<body>
<header>
        <h1>MCLサークルアプリ</h1>
    </header>
    <div class="container">
        <h2>ログイン</h2>
        <?php if(isset($_SESSION['errormessage']) && !empty($_SESSION['errormessage'])): ?>
            <p class="error"><?php echo "もう一度入力してください"; ?></p>
        <?php endif; ?>
        <form action="login_process.php" method="POST">
            <div>
                <label for="mail">メールアドレス:</label>
                <input type="email" id="mail" name="mail" required>
            </div>
            <div>
                <label for="password">パスワード:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="ログイン">
        </form>
        <div>
            <p>アカウントをお持ちでない方は<a href="register.php">こちら</a></p>
        </div>
    </div>
</body>
</html>