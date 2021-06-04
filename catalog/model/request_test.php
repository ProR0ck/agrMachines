<?php
require_once ('connect_db.php');
try {
    $query = "SELECT * FROM `vehicles` WHERE 1";
    $ver = $pdo->query($query);
    $version = $ver->fetchAll();
    echo $version[0]['VIN'];
} catch (PDOException $e) {
    echo "Ошибка выполнения запроса: ".$e->getMessage();
}