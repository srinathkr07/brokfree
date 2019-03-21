<?php
    include "error.php";
    if(!isset($_GET['hash'])):
        echo "<h1>Error 404 page not found</h1>";
        exit();
    else:
        $hash=$_GET['hash'];
        include "classes/stmt.php";
        include "classes/DBase.php";

        $conn = new DBase("brokfree");
        $pdo=$conn->pdo;
        $arr=['hash'=>$hash,];
        $sql=" SELECT email from email_verify where hash=:hash";
        
        $stmt=new Stmt($pdo);
        $stmt=$stmt->run($sql,$arr);
        
        if($stmt->rowCount()==0):
            echo "<h1>Error 404 page not found</h1>";
            exit();
        
        else:
            foreach ($stmt as $row) {
                $email=$row['email'];
            }
            
            $sql="DELETE FROM email_verify where hash=:hash";
            $stmt=new Stmt($pdo);
            $stmt->run($sql,$arr);
            
            $sql="SELECT * FROM user_temp where email=:email;";
            unset($arr);
            $arr=['email'=>$email];
            $stmt= new Stmt($pdo);
            $stmt=$stmt->run($sql,$arr);

            foreach ($stmt as $row):
                $password=$row['password_hash'];
                $username=$row['username'];
                echo $username;
                $name=$row['name'];
                $mobile=$row['mobile'];
            endforeach;

            $sql="DELETE FROM user_temp WHERE email=:email;";
            $stmt= new Stmt($pdo);
            $stmt->run($sql,$arr);
            
            unset($arr);
            $arr=[
                'email'=>$email,
                'name'=>$name,
                'password'=>$password,
                'mobile'=>$mobile,
                'username'=>$username,
            ];

            $sql="INSERT INTO users SET
            email= :email,
            name =:name,
            password_hash=:password,
            mobile=:mobile,
            username=:username;";

            $stmt=new Stmt($pdo);
            $stmt->run($sql,$arr);

            $url="/brokfree/templates/thank-you.html.php";
            http_response_code(301);
            header("Location:".$url );
        endif;
    endif;