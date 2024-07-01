<?php
require_once 'db_connect.php';

session_start();

var_dump($_POST);

//これはフォームの内容がからじゃなかったらインサートする

if(empty($_POST["name"])){
    $error_flg = 1; 
    
}else if(empty($_POST["pw"])){
    $error_flg = 1;

}else if(empty($_POST["mail"])){
    $error_flg = 1;
    
}else{
    echo "dadada";
    
    //データベースの中に今から登録をする名前が存在するかどうか
    $sql = 'SELECT name FROM users WHERE name = :name';

    //データベースの中から入力されたあたいをけんんさくする
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':name',$_POST["name"],PDO::PARAM_STR);
    $stm->execute();
    //その結果存在していたらエラーをひょうじする
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    if($result !== false){
        $error_flg = 1;
    }else{
        //その結果が存在していなかったらインサートする
        $sql = "insert into users (name,mail,pw) values (:name, :mail, :pw,)";
        
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':name',$_POST["name"],PDO::PARAM_STR);
        $stm->bindValue(':mail',$_POST["mail"],PDO::PARAM_STR);
        $stm->bindValue(':pw',$_POST["pw"],PDO::PARAM_STR);
        $stm->execute();
    }}
        if($error_flg != 1){
            header("Location:login.php");
        }
?>