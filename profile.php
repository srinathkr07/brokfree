<?php
    include "classes/DBase.php";
    include "classes/stmt.php";
    include "error.php";
    session_start();
    if(isset($_SESSION['email'])):
        $conn = new DBase("brokfree");
        $pdo=$conn->pdo;
        $s1=new Stmt($pdo);
        $sql='SELECT username,mobile,name from users where email=:email';
        $email=$_SESSION['email'];
        $arr=['email'=>$email];
        $s1=$s1->run($sql,$arr);
        foreach($s1 as $row):
            $username=$row['username'];
            $mobile=$row['mobile'];
            $name=$row['name'];
        endforeach;
        ob_start();
        include "../brokfree/templates/view-profile.html.php";
        $out=ob_get_clean();
        echo $out;
    else:
        ob_start();
        include "templates/error.html";
        $out=ob_get_clean();
        echo $out;
    endif;