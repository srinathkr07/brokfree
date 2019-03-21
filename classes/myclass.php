<?php
    class MyClass
    {
        private $pdo;
        public $table;
        
        public function __construct($t)
        {
            echo "construct called";
            $this-> table = $t;
            echo '<p>table name is:'.$this -> table.'</p>';
            $this->pdo= new PDO("mysql:host=localhost;dbname=akash",'akash','akash11');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        
        public function search()
        {
            var_dump($this ->pdo);
            var_dump($this ->table);
            $sql='select * from '.$this->table;
            echo '<p>'.$sql.'</p>';
            $result = $this ->pdo->prepare($sql);
            $result->execute();
            return $result;
        }
    }
    class Class2
    {
        public $a;
        public $b;
        
        public function __construct()
        {
            /*$this ->$a=$argv;
            $this->$b=$args;
            echo '<p>The value of a is '.$this ->$a.'</p>';
            echo '<p>The value of b is '.$this ->$b.'</p>';
            */
            echo 'construct called';
        }
        
        public function seta($val)
        {
            $this ->a=$val;
        }

        public function setb($val)
        {
            $this ->b=$val;
        }

        public function disp()
        {
            echo '<p>The value of a is '.$this ->a.'</p>';
            echo '<p>The value of b is '.$this ->b.'</p>';
        }
    }
?>