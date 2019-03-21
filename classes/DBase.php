<?php
    class DBase
    {
        public $pdo;

        public function __construct(string $db)
        {
            $str= "mysql:host=localhost;dbname=".$db;
            $this->pdo= new PDO($str,'akash','akash11',[]);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        }
    }
