<?php
    include "classes/DBase.php";
    include "classes/stmt.php";
    session_start();
    function check(){
        $val = (isset($_COOKIE['ksi'])) ? true : false ;
        if($val):
            //retreive email from logged_in
            $conn = new DBase("brokfree");
            $pdo=$conn->pdo;
            $s1=new Stmt($pdo);
            $hash=$_COOKIE['ksi'];
            $arr=['hash'=>$hash];
            $sql='SELECT email from logged where hash=:hash;';
            $s1=$s1->run($sql,$arr);
            foreach ($s1 as $row) {
                $email=$row['email'];
            }
            $_SESSION['email']=$email;
        else:
            if (isset($_SESSION['email'])):
                $email=$_SESSION['email'];
                if(filter_var($email,FILTER_VALIDATE_EMAIL)):
                    $val=true;
                endif;
            endif;
        endif;
        return $val;
    }