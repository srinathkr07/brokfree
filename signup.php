<?php
    session_start();
    if(isset($_SESSION['email'])):
        header("location:homepage.php");
    endif;
    if(isset($_POST['email'])):
        //include "error.php";
        include "../classes/DBase.php";
        include "../classes/stmt.php";
        $conn = new DBase("brokfree");
        $pdo=$conn->pdo;
        $email= $_POST['email'];
        
        //verify email
        $hash = md5($email);
        $status="no";
        $name = $_POST['name'];
        $sql='INSERT INTO email_verify SET
        email=:email,
        hash = :hash,
        verify = :status;';
        $arr=[
            'email'=>$email,
            'hash' => $hash,
            'status' => $status,
        ];
        $s1=new Stmt($pdo);
        $s1->run($sql,$arr);
        $url="localhost/brokfree/verified.php?hash=".$hash;
        include "sendmail.php";

        //insert into temp database
        $password=$_POST['password1'];
        echo "<p>".$password."</p>";
        $password=password_hash($password,PASSWORD_DEFAULT);
        echo "<p>".$password."</p>";
        unset($sql);
        $sql="INSERT INTO user_temp SET
        email= :email,
        name =:name,
        password_hash=:password,
        mobile=:mobile,
        username=:username;";
        unset($arr);
        $arr=[
            'email'=>$email,
            'name'=>$name,
            'password'=>$password,
            'mobile'=>$_POST['mobile'],
            'username'=>$_POST['username'],
        ];
        $s1->run($sql,$arr);
        echo "<h1>Please check your mail to verify your account</h1>";
    else:
        ob_start();
        include "../brokfree/templates/signup.html";
        $out=ob_get_clean();
        echo $out;
    endif;
?>
