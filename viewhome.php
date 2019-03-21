<?php
    if(isset($_GET['id'])):
        include "classes/DBase.php";
        include "classes/stmt.php";
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
            $row=$s1->fetch();
            $username=$row['username'];
        endif;
        $s1=new Stmt($pdo);
        $sql='SELECT * FROM housedata WHERE id_house=:id';
        $s1=$s1->run($sql,$_GET);
        $row=$s1->fetch();
        ob_start();
        include "templates/view-home.html.php";
        $out=ob_get_clean();
        echo $out;
    else:
        ob_start();
        include "templates/error.html";
        $out=ob_get_clean();
        echo $out;
    endif;