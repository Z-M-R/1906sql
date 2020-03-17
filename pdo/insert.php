<?php

    $user = 'root';
    $pass = 'root';
    $dbh = new PDO('mysql:host=192.168.93.1;dbname=shop',$user,$pass);

    //准备sql语句
    $sql = "insert into users('uname','email') values('lisi','lisi@qq.com')";

    //执行SQL语句
    //$res = $dbh->query($sql);
    $res = $dbh->exec($sql);
    $id = $dbh->lastInsertId();
    // var_dump($res);
    echo '自增id：'.$id;