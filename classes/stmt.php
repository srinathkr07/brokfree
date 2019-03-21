<?php
    class Stmt
    {
        public $pdo;
        public function __construct(PDO $pdo){
            $this->pdo=$pdo;
        }
        public function run(string $sql,$param=[]){
            $stmt=$this->pdo->prepare($sql);
            foreach ($param as $key => $value) {
                $key=':'.$key;
                $stmt->bindValue($key,$value);
            }
            $stmt->execute();
            //var_dump($stmt);
            return $stmt;
        }
    }