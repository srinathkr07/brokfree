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
    $city=$_GET['city'];
    $conn = new DBase("brokfree");
    $pdo=$conn->pdo;
    $s1=new Stmt($pdo);
    $sql="SELECT id_house,name,builtup,deposit,rent,furnishing,age,pt,availability from housedata where location=:location";
    $arr=['location'=>$city];
    $s1=$s1->run($sql,$arr);
    ob_start();
    include "templates/search-homes.html.php";
    $out=ob_get_clean();
    echo $out;