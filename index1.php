<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>非同期データ取得</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="data-container"></div>
    <div id="home.php"></div>
    <div id="db_connect"></div>

    <script>
        $(document).ready(function() {
            // ツイート一覧の取得とユーザー情報の取得
            $.ajax({
                url: 'home.php',
                method: 'GET',
                success: function(data) {
                    $('#data-container').html(data);
                },
                error: function() {
                    $('#data-container').html('<span class="error">エラーがありました</span>');
                }
            });

            // 投稿フォームの表示
            $.ajax({
                url: 'tweet_form.php',
                method: 'GET',
                success: function(data) {
                    $('#tweet-form').html(data);
                },
                error: function() {
                    $('#tweet-form').html('<span class="error">エラーがありました</span>');
                }
            });
        });
    </script>
</body>
</html>
