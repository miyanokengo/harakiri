

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>
        <a href="home.php">
            <span>ホーム</span>
        </a>
    </div>

    <div>
        <p>記事投稿</p>

        <form action="postresult.php" method="POST">

            <div class="content">
                <p>内容</p>
                <textarea class="content" name="content"></textarea>
            </div>
                <div>
                    <img :src="url" alt="画像が出るはず">
                </div>

                <div>
                    <input type="file" name="image">  
                </div>
            </div>
    </div>

  <input type="submit" value="投稿する">
</form>
<form action="home.php" method="POST">
  <input type="submit" value="戻る">
</form>
</body>
</html>