<?php
    $pdo= new PDO("mysql:host=localhost;dbname=brokfree",'akash','akash11');
    $output='connection established';
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql='select id_user,password from users;';
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    if($stmt->rowCount()==0):
        echo "some error";
    else:
        foreach ($stmt as $row) {
            //echo '<p>'.$row['password'].'</p>';
            $password=$row['password'];
            $hash=password_hash($password,PASSWORD_DEFAULT);
            //echo '<p>'.$hash.'</p>';
            //echo '<p>'.$row['id_user'].'</p>';
            $sql=" update users
            set password_hash = :hash
            where id_user = :id" ;
            $stmt2=$pdo->prepare($sql);
            $id=$row['id_user'];
            $stmt2->bindValue(':hash',$hash);
            $stmt2->bindValue(':id',$id);
            $stmt2->execute();
        }
        $hash=password_hash("akash",PASSWORD_DEFAULT);
        echo '<p>'.$hash.'</p>';
    endif;
?>