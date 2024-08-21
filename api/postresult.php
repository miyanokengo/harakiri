<?php
session_start();
    require_once '../db_connect.php';

    //まずこのページにポストが来ているかどうか
    //かつ$_POSTのcontentがあるかどうか
    //contentがあったらコンテントの処理


//データベースが動く前にエラーが履いてるかどうかを確認するフラグ
$error_flg=0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id=$_SESSION["usersid"];
    // ファイルがアップロードされているかチェック
    if(isset($_POST['content'])){
        $content=$_POST["content"];
        $filename="dada";

        $sql = "INSERT INTO tweets (user_id,content,image) values (:user_id,:content,:image)";

        $stm = $pdo->prepare($sql);
        $stm->bindValue(':user_id',$user_id , PDO::PARAM_INT);
        $stm->bindValue(':content',$content , PDO::PARAM_STR);
        $stm->bindValue(':image',$filename , PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        
            $postid = $pdo -> lastInsertId();

    }
}
/*mosigazougaattara toukouno ID
wordwrapfairumeinisimasu    
sorewoappload 
投稿したものに対して更新
アップロードしたものに名前を入れる*/

$filename=$postid;

if (isset($filename)){
    $uploaded_path = '../uploads/'.$postid.$filename;
    echo $uploaded_path;
}
    
?>