<?php
    include "check_login.php";
    $val=check();
    if($val):
        $conn=new DBase("brokfree");
        $pdo=$conn->pdo;
        $s1=new Stmt($pdo);
        $sql="SELECT username from users where email=:email";
        $email=$_SESSION['email'];
        $arr=['email'=>$email];
        $s1=$s1->run($sql,$arr);
        foreach($s1 as $row):
            $username=$row['username'];
        endforeach;
    endif;
    ob_start();
    include "../brokfree/templates/homepage.html.php";
    $out=ob_get_clean();
    echo $out;
