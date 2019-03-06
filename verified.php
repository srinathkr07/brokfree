<?php
    if(!isset($_GET['hash'])):
        echo "<h1>Error 404 page not found</h1>";
        exit();
    else:
        $hash=$_GET['hash'];
        include "../classes/DBase.php";
        $conn = new DBase("brokfree");
        $pdo=$conn->pdo;
        $sql=" SELECT email from email_verify where hash=:hash";
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(":hash",$hash);
        $stmt->execute();
        if($stmt->rowCount()==0):
            echo "<h1>Error 404 page not found</h1>";
            exit();
        else:
            foreach ($stmt as $row) {
                $email=$row['email'];
            }
            $sql="DELETE FROM email_verify where hash=:hash";
            $stmt=$pdo->prepare($sql);
            $stmt->bindValue(":hash",$hash);
            $stmt->execute();
            $sql="INSERT INTO users
            SELECT * FROM user_temp where email=:email;";
            $stmt= $pdo->prepare($sql);
            $stmt->bindValue(":email",$email);
            $stmt->execute();
            $sql="DELETE FROM user_temp WHERE email=:email;";
            $stmt= $pdo->prepare($sql);
            $stmt->bindValue(":email",$email);
            $stmt->execute();
            $url="/brokfree/templates/thank-you.html.php";
            http_response_code(301);
            header("Location:".$url );
        endif;
    endif;