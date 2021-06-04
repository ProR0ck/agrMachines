<?php
try {
    $pdo = new PDO('mysql:host=localhost:3307;dbname=agr_machines','root','root');
}
catch (PDOException $e){
    echo "Невозможно установить соединение с базой данных.";
}