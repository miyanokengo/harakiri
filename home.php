<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <?php if(isset($_SESSION['usersid'])){ ?>
            <li><a href="mypage.php">マイページ</a></li>
                <li><a href="logout.php">ログアウト</a></li>
        <?php }else{ ?>
            <ul>
                <li><a href="login.php">ログイン</a></li>
            </ul>
        <?php } ?>
    </header>
    <?php if(empty($_SESSION)){ ?>

        <?php }else{ ?>
    <a href="post.php">
            <div>投稿する</div>
    </a>
    <?php } ?>
  
</body>
</html>