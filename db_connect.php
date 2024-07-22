<?php
//データベースに接続する準備
//ユーザ名
$user="root";
//パスワード
$pass="";
//データベース名
$database="harakiri";
//サーバー名
$server="localhost:3308";
//DSN文字列の生成
$dsn="mysql:host={$server};dbname={$database};charset=utf8";

//mysqlデータベースへの接続
// try {
//     //PDOクラスのインスタンスを作成してDBに接続する
//     $pdo=new PDO($dsn,$user,$pass);
//     //プリペアードステートメントのエミュレーションを無効化
//     $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
//     //例外がスローさてるようにする
//     $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     echo "データベースに接続しました";
// } catch (Exception $e) {
//     echo "DB接続エラー";
//     echo $e->getMessage();
//     exit();
// }

try {
    // PDOオブジェクトの作成
    $pdo = new PDO($dsn, $user, $pass);
    //プリペアードステートメントのエミュレーションを無効化
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    // エラーモードを例外モードに設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // エラーが発生した場合の処理
    echo "データベースに接続できませんでした。エラー: " . $e->getMessage();
    exit();
}