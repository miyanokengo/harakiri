<?php 
    require_once '../db_connect.php';
    session_start();

    $uesr_id = $_SESSION['usersid'];
    $content = $_POST['content'];
    $filename = $_POST['image'];
    //画像のアップロードについてはあとまわし
    //画像があるかどうかをチェック
    //画像がなかった時の処理
    

    //画像があるときの処理
    //送信されてきた画像の名前を付ける（ユニーク）
    //画像をアップ路＾度させるディレクトリに移動する


    var_dump($_POST);
    $sql = "INSERT INTO tweets(user_id,content,image)values(:user_id,:content,:image)";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':user_id',$uesr_id , PDO::PARAM_INT);
    $stm->bindValue(':created_at',$created_at , PDO::PARAM_STR);
    $stm->bindValue(':content',$content , PDO::PARAM_STR);
    $stm->bindValue(':nicepoint',$nicepoint , PDO::PARAM_INT);
    $stm->bindValue(':image',$filename , PDO::PARAM_INT);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    $postid = $pdo -> lastInsertId();
    

?>