<?php 


class Database {
    private mixed $pdo;

    public function __construct(string $host, string $dbname, string $dbport, string $user,string $pass) {
        try {
            $this->pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$dbport, $user, $pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);    
        } catch (PDOException $e) {
           throw new Exception("Connection to Server failed");
        }
       
    }

    public function prepare(string $sql){
        return $this->pdo->prepare($sql);
    }

    public function beginTransaction(){
        return $this->pdo->beginTransaction();
    }

    public function commit(){
        return $this->pdo->commit();
    }

    public function rollBack(){
        return $this->pdo->rollBack();
    }

}