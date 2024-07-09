<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ編集</title>
</head>
<body>
    <h1>マイページ編集</h1>
    <!-- actionの名前は仮 -->
    <form action="insert_profile.php" method="post" enctype="multipart/form-data">
        <label for="user_id">ユーザーID:</label>
        <input type="text" id="user_id" name="user_id" required><br><br>

        <label for="username">名前:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="bio">本文:</label><br>
        <textarea id="text" name="bio" rows="4" required></textarea><br><br>

        <label for="profile_image_url">画像:</label>
        <input type="file" id="profile_image_url" name="profile_image_url" accept="image/*"><br><br>

        <input type="submit" value="登録">
    </form>
</body>
</html>