<?php
    session_start();
    if(isset($_SESSION['email'])):
        header("location:homepage.php");
    endif;
    $msg='';
    $error=false;
    if (isset($_POST['email'])):
        include "error.php";
        include "classes/DBase.php";
        include "classes/stmt.php";
        $email=$_POST['email'];
        $password=$_POST['password'];
        $conn = new DBase("brokfree");
        $pdo=$conn->pdo;
        $s1=new Stmt($pdo);
        $sql='SELECT password_hash,mobile from users where email=:email';
        $arr=['email'=>$email];
        $s1=$s1->run($sql,$arr);
        if($s1->rowCount()==0):
            $error=true;
            $msg="Enter correct email";
        else:
            foreach ($s1 as $row) {
                $p_hash=$row['password_hash'];
                $mobile=$row['mobile'];
            }
            if(password_verify($password,$p_hash)):
                session_start();
                if(isset($_POST['ksi'])):
                    try{
                        $str=$email.$mobile;
                        $str=hash("sha512",$str);
                        setcookie('ksi',$str,time()+3600*24*365,'','',0,1);
                        $sql='INSERT INTO logged SET
                        email=:email,
                        hash=:hash';
                        $arr=[
                            'email'=>$email,
                            'hash'=>$str,
                        ];
                        $s1= new Stmt($pdo);
                        $s1->run($sql,$arr);
                    }
                    catch(PDOException $e){
                    }
                endif;
                $_SESSION['email']=$email;
            else:
                $error=true;
                $msg="Wrong Password";
            endif;    
        endif;
        if(!$error):
            header("location: homepage.php");
        endif;
    endif;
    ob_start();
    include "../brokfree/templates/login.html.php";
    $out= ob_get_clean();
    echo $out;
?>