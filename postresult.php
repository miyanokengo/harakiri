

<?php
session_start();
$userid = $_SESSION['user_id'];
 require_once 'db_connect.php';

 $content=$_POST["content"];
//  if(isset($_POST["Release"])){
//     $releaseid=0;
//  }else{
//     $releaseid=1;
//  }
$filename = $_FILES['image'];

$sql = "INSERT INTO tweets (userid,content,nicepoint,releaseid,image) values (:userid,:content,nicepoint,:releaseid,:image)";
$stm = $pdo->prepare($sql);
$stm->bindValue(':userid',$userid , PDO::PARAM_INT);
$stm->bindValue(':content',$content , PDO::PARAM_STR);
$stm->bindValue(':nicepoint',$nicepoint , PDO::PARAM_STR);
$stm->bindValue(':releaseid',$releaseid , PDO::PARAM_INT);
$stm->bindValue(':image',$filename , PDO::PARAM_INT);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    $postid = $pdo -> lastInsertId();
//一旦出してみろ
echo $postid;

var_dump($_FILES);
if(!empty($_FILES)){
$uploaded_path = 'img/'.$postid.$filename;
echo $uploaded_path;
$result = move_uploaded_file($_FILES['image'],$uploaded_path);
}
/*  １記事をインサートする
    ２今インサートした記事のIDを取得
    ３取得したIDをファイル名につけてアップロード*/
     
    header("Location:home.php");
    exit(); 
?>