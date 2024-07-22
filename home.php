<?php
session_start();
require_once 'db_connect.php';

function es($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

try {
    $sql = "SELECT * FROM tweets";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo '<span class="error">エラーがありました</span><br>';
    echo $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    //まず投稿の送信ボタンがおされたときの動作を作るイベントハンドラーでサブミットするフェッチ
    //イベントが取得出来たら送信されてきたフォームの内容を取得する。
    //次にフェッチを使って投稿用のプログラムにポスト
    

    <!-- <script>
    $(document).ready(function() {
        // 初期ロード時のツイート一覧の取得
        fetchTweets();

        // 投稿フォームの表示
        fetchPostForm();

        // ユーザーセッションの取得
        fetchUserSession();

        // ツイート一覧を非同期で更新する関数
        function fetchTweets() {
            $.ajax({
                url: 'home.php', // 適切なURLに変更する
                method: 'GET',
                success: function(data) {
                    $('#data-container').html(data);
                },
                error: function() {
                    $('#data-container').html('<span class="error">エラーがありました</span>');
                }
            });
        }

        // ユーザーセッションを非同期で更新する関数
        function fetchUserSession() {
            $.ajax({
                url: 'home.php', // 適切なURLに変更する
                method: 'GET',
                success: function(data) {
                    $('#user-session').html(data);
                },
                error: function() {
                    $('#user-session').html('<span class="error">エラーがありました</span>');
                }
            });
        }

        // 投稿フォームを非同期で更新する関数
        function fetchPostForm() {
            $.ajax({
                url: 'db_connect.php', // 適切なURLに変更する
                method: 'GET',
                success: function(data) {
                    $('#db-connect').html(data);
                },
                error: function() {
                    $('#db-connect').html('<span class="error">エラーがありました</span>');
                }
            });
        }

        // 投稿フォームの表示切り替え
        $(document).on('click', '#show-post-form', function(e) {
            e.preventDefault();
            fetchPostForm();
        });

        // ログイン・ログアウトのリンクは静的なリンクとして表示し、必要ならページ全体をリロードするなどの処理を行う
    });
    </script> -->
</head>
<body>

<!-- ツイート一覧の表示 -->
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>user_id</th>
            <th>content</th>
            <th>created_at</th>
            <th>nicepoint</th>
            <th>image</th>
        </tr>
    </thead>
    <tbody id="data-container">
        <?php foreach ($result as $row): ?>
            <tr>
                <td><?php echo es($row['id']); ?></td>
                <td><?php echo es($row['user_id']); ?></td>
                <td><?php echo es($row['content']); ?></td>
                <td><?php echo es($row['created_at']); ?></td>
                <td><?php echo es($row['nicepoint']); ?></td>
                <td><?php echo es($row['image']); ?></td>
            </tr>
        <?php endforeach; ?>
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
            <form action="postresult.php" method="POST" enctype="multipart/form-data">

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
  <input type="submit" value="投稿する">
    <button>投稿する</button>
<?php endif; ?>



//きじのいちらんをjsonで取得するプログラムこれをajaxで呼び出す。
//投稿された内容を登録するこれをajaxように改造する。

</body>
</html>
