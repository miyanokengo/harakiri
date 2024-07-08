<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
            <h2>ログイン</h2>
            <!--エラー！！-->
            <p color:red><?php if(isset($_SESSION['errormessage'])&& !empty($_SESSION['errormessage'])){
                    echo "もう一度入力してください"; 
            } ?></p>
            <form action="login_process.php" method="POST">
                <div>
                    メールアドレス:<input type="mail" name="mail">
                </div>

                <div>
                    パスワード:<input type="password" name="password">
                </div>

                <input type="submit" value="ログイン">
            </form>
        <div>
            <p>アカウントをお持ちでない方は<a href="register.php">こちら</a></p>
        </div>
</body>
</html>