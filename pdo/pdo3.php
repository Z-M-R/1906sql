<?php

    //PDO 预处理 insert

    $user = 'root';
    $pass = 'root';
    $dbh = new PDO('mysql:host=192.168.93.1;dbname=shop',$user,$pass);
    // var_dump($dbh);

    //准备sql语句
    $sql = "insert into users (name,email) values (:name,:email)";

    $name = "test010";
    $email = "test010@qq.com";

    //预处理
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':email',$email);

    //执行SQL语句
    $stmt->execute();

    $id = $dbh->lastInsertId();         //获取自增id
    var_dump($id);