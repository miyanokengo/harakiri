<?php
session_start();
require_once 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <table>  
        <tbody id="table-body">
            <!-- ここにJavaScriptでtrが追加されます -->
            <tr>
                <th>userid</th>
                <th>content</th>
                <th>created_at</th>
                <th>nicepoint</th>
                <th>image</th>
            </tr>
        </tbody>
    </table>
    <!-- 非同期で更新するコンテナ -->
<div id="user-session"></div>
<div id="db-connect"></div>

<!-- ユーザーセッションや投稿フォームの表示 -->
<?php if(isset($_SESSION['usersid'])): ?>
    <li><a href="mypage.php">マイページ</a></li>
    <li><a href="logout.php">ログアウト</a></li>
<?php else: ?>
    <ul>
        <li><a href="login.php">ログイン</a></li>
    </ul>
<?php endif; ?>

<?php if(!empty($_SESSION)): ?>
    <div>
        <div>
            <p>記事投稿</p>
            <form action="postresult.php" id="postForm"  method="POST" enctype="multipart/form-data">

                <div>
                    <p>内容</p>
                    <textarea name="content"></textarea>
                </div>

                <div>
                    <img src="url" alt="画像が出るはず">
                </div>

                <div>
                    <input type="file" name="image">
                </div>

                <input type="submit" value="投稿する">
            </form>
        </div>
    </div>
<?php endif; ?>

//きじのいちらんをjsonで取得するプログラムこれをajaxで呼び出す。
//投稿された内容を登録するこれをajaxように改造する。
<script src="js/main.js"></script>
</body>
</html>
