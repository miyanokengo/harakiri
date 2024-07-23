<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 特定ページのコンテンツをここに追加 -->
        <h2>新規登録</h2>
        <form action="register_process.php" method="post">
                <h3>ユーザー名</h3>
                <div>
                    <input type="text" name="name">
                </div>
                
                <h3>メールアドレス</h3>
                <div>
                    <input type="text" name="mail">
                </div>

                <h3>パスワード</h3>
                <div>
                    <input type="password" name="password">
                </div>

                <button>登録</button><br>
                <label>アカウントをお持ちの方は<a href="login.php">コチラ</a></label>
            </div>
        </form>
    </div>
</body>
</html>