<?php
session_start();
    require_once 'db_connect.php';

    $content=$_POST["content"];
    $user_id=$_SESSION["usersid"];
    

//  if(isset($_POST["Release"])){
//     $releaseid=0;
//  }else{
//     $releaseid=1;
//  }

/*var_dump($_FILES);
if(]
!empty($_FILES)){
$uploaded_path = 'img/'.$postid.$filename;
echo $uploaded_path;
$result = move_uploaded_file($_FILES['image'],$uploaded_path);
}*/


//データベースが動く前にエラーが履いてるかどうかを確認するフラグ
$error_flg=0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ファイルがアップロードされているかチェック
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // アップロードディレクトリを設定
        $uploadDir = 'uploads/';
        // ファイル名を設定
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        // アップロードディレクトリが存在しない場合は作成
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        // ファイルを指定したディレクトリに移動
        if  (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            echo 'ファイルは正常にアップロードされました: ' . $uploadFile;
        } else {
            echo 'ファイルがアップロードされていません。';
            $error_flg=1;
        }
}else{
    $error_flg=1;
    echo "ファイルが選択されていません";
}

var_dump($error_flg);

$filename=$uploadFile;

$sql = "INSERT INTO tweets (user_id,content,image) values (:user_id,:content,:image)";

$stm = $pdo->prepare($sql);
$stm->bindValue(':user_id',$user_id , PDO::PARAM_INT);
$stm->bindValue(':content',$content , PDO::PARAM_STR);
$stm->bindValue(':image',$filename , PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    $postid = $pdo -> lastInsertId();
//一旦出してみろ
echo $postid;
/*  １記事をインサートする
    ２今インサートした記事のIDを取得
    ３取得したIDをファイル名につけてアップロード*/
     
    header("Location:home.php");
    exit(); 
}
?>