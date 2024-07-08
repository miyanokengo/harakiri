<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ツイート作成</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .tweet-form {
            background-color: #fff;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .tweet-form textarea {
            width: 100%;
            height: 100px;
            font-size: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
            margin-bottom: 10px;
        }
        .tweet-form .file-input {
            margin-bottom: 10px;
        }
        .tweet-form button {
            background-color: #1da1f2;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        .tweet-form button:hover {
            background-color: #0c84b7;
        }
    </style>
</head>
<body>
    <div class="tweet-form">
        <h2>ツイート作成</h2>
        <form action="tweet_process.php" method="post" enctype="multipart/form-data">
            <textarea name="tweet_content" placeholder="何かつぶやいてみよう"></textarea><br>
            <input type="file" name="tweet_image" class="file-input"><br>
            <button type="submit">ツイートする</button>
        </form>
    </div>
</body>
</html>
