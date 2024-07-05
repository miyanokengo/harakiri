<?php
    session_start();
    require_once 'db_connect.php';


    $sql = "SELECT * FROM tweets WHERE deleteid=0 and releaseid=:selectid";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(':selectid', 0, PDO::PARAM_INT);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
?>