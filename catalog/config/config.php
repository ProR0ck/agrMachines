<?php


namespace catalog\config\config;
use PDO;


class config
{
    private $host = 'localhost';
    private $port = '3307';
    private $dbName = 'agr_machines';
    private $username = 'root';
    private $password = 'root';

    function getPdo()
    {
        try {
            return $this-> pdo = new PDO("mysql:host=$this->host:$this->port;dbname=$this->dbName","$this->username","$this->password");
        }
        catch (PDOException $e){
            echo "Невозможно установить соединение с базой данных.";
        }
    }
}
