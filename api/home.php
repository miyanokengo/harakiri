<?php
    require_once '../db_connect.php';
    $sql = "SELECT * FROM tweets";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
?>