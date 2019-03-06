<?php
    include "../classes/DBase.php";
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
    $stmt= $pdo->prepare($sql);
   
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':hash',$hash);
    $stmt->bindValue(':status',$status);
    $stmt->execute();
    //var_dump($stmt);
    $url="localhost/brokfree/verified.php?hash=".$hash;
    include "sendmail.php";

    //insert into temp database
    $password=$_POST['password'];
    $password=password_hash($password,PASSWORD_DEFAULT);
    $sql="INSERT INTO user_temp SET
    email= :email,
    name =:name,
    password_hash=:password,
    mobile=:mobile,
    username=:username;";
    $stmt= $pdo->prepare($sql);
    $stmt->bindValue(":email",$email);
    $stmt->bindValue(":name",$name);
    $stmt->bindValue(":password",$password);
    $stmt->bindValue(":mobile",$_POST['mobile']);
    $stmt->bindValue(":username",$_POST['username']);
    $stmt->execute();
    echo "<h1>Please check your mail to verify your account</h1>";
