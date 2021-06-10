<?php


namespace catalog\config\config;
use PDO;


class config
{
    private $host = 'localhost';
    private $port = '8889';
    private $dbName = 'agr_machines';
    private $username = 'root';
    private $password = 'root';
    private $mainLink = 'http://localhost:8888/agrMachines/';

    public function getPdo()
    {
        try {
            return $this-> pdo = new PDO("mysql:host=$this->host:$this->port;dbname=$this->dbName","$this->username","$this->password");
        }
        catch (PDOException $e){
            echo "Невозможно установить соединение с базой данных.";
        }
    }
    public function getMainLink(){
        return $this->mainLink;
    }
}
