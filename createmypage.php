<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ登録</title>
</head>
<body>
     <!-- 特定ページのコンテンツをここに追加 -->
     <h2>マイページ登録</h2>
        <form action="insert_mypage.php" method="post">
                <h3>ユーザー名</h3>
                <div>
                    <input type="text" name="name">
                </div>
                
                <h3>説明文</h3>
                <div>
                    <input type="text" name="bio">
                </div>

                <button>登録</button><br>
                <label>マイページ編集は<a href="♯.php">コチラ</a></label>
</body>
</html>