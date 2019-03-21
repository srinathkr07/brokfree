<?php
    session_start();
    if(isset($_COOKIE['ksi'])):
        setcookie('ksi',$str,time(),'','',0,1);
        require "../classes/DBase.php";
        require "../classes/stmt.php";
        $email=$_SESSION['email'];
        $conn = new DBase("brokfree");
        $pdo=$conn->pdo;
        $s1=new Stmt($pdo);
        $sql="DELETE FROM logged WHERE email=:email";
        $arr=['email'=>$email];
        $s1->run($sql,$arr);
    endif;
    session_destroy();
    header("location:homepage.php");