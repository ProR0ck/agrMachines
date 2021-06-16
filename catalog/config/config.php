<?php


namespace catalog\config;
use PDO;


class config
{
    private $host = 'localhost';
    private $port = '8889';
    private $dbName = 'agr_machines';
    private $username = 'root';
    private $password = 'root';
    const HOST = 'http://localhost:8888/agrMachines';
    const LOCALHOST = 'http://localhost:8888';

    public function getPdo()
    {
        try {
            return $this->pdo = new PDO("mysql:host=$this->host:$this->port;dbname=$this->dbName","$this->username","$this->password");
        }
        catch (PDOException $e){
            echo "Невозможно установить соединение с базой данных.";
        }
    }
    public function getMainLink(){
        return self::HOST;
    }
}
