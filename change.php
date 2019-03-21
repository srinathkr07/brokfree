<?php
    session_start();
    include "classes/DBase.php";
    include "classes/stmt.php";
    if(isset($_SESSION['email'])):
        $error=false;
        if(isset($_POST['password'])):
            $email=$_SESSION['email'];
            $conn = new DBase("brokfree");
            $pdo=$conn->pdo;
            $s1=new Stmt($pdo);
            $sql='SELECT password_hash from users where email=:email';
            $arr=['email'=>$email];
            $s1=$s1->run($sql,$arr);
            foreach($s1 as $row):
                $p_hash=$row['password_hash'];
            endforeach;
            $password=$_POST['password'];
            if(password_verify($password,$p_hash)):
                $pnew=$_POST['newpassword'];
                $pnew=password_hash($pnew,PASSWORD_DEFAULT);
                $sql="UPDATE users SET password_hash=:pass WHERE email=:email";
                $arr=[
                    'email'=> $email,
                    'pass' => $pnew,
                ];
                $s1= new Stmt($pdo);
                $s1->run($sql,$arr);
                ob_start();
                include "templates/change-confirm.html";
                $out=ob_get_clean();
                echo $out;
                exit();
            else:
                $error=true;
                $msg="enter correct password";
            endif;
        endif;
        ob_start();
        include "templates/change.html.php";
        $out=ob_get_clean();
        echo $out;
    else:
        ob_start();
        include "templates/error.html";
        $out=ob_get_clean();
        echo $out;
    endif;

