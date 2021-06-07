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
    private $mainLink = 'http://localhost/agrMachines/';

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
