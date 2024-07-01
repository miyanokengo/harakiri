<?php
session_start();
require_once ('db_connect.php');
//エラーフラグが1だった場合はエラーを出す
$error_flg = 0;
if(isset($_POST) && !empty($_POST)) {
    if (!empty($_POST['mail'])) {
        $mail = $_POST['mail'];
    } else {
        $error_flg = 1;
    }
    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
    }else{
        $error_flg = 1;
    }
//セッションにエラーメッセージを入れる
    if($error_flg === 1){
        $_SESSION['errormessage']=$error_flg;
        //ログイン画面にリダイレクトする処理が必要
        header("Location:login.php");
    }else{
        $_SESSION['errormessage']="";

    }

    if (isset($mail) && isset($password)) {
        
        $sql = "SELECT * FROM users WHERE mail = :mail";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':mail',$mail,PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        if($result !== false){
            if($password === $result["password"]){
                //セッションにユーザー名を入れる         
                $_SESSION['name'] = $name;
                // キー'count'が登録されていなければ、1を設定
                $_SESSION['mail'] = $mail;
                //セッションにユーザーidを入れる
                $_SESSION['usersid'] = $result['id'];

                //home.phpにリダイレクトする1
                header("Location:home.php");
                exit();
                
            }else{
                $error_flg = 1;
            }
        }else{
            $error_flg = 1;
        }
    }
}
?>