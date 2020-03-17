<?php

    //PDO 预处理

    $user = 'root';
    $pass = 'root';
    $dbh = new PDO('mysql:host=192.168.93.1;dbname=shop',$user,$pass);
    // var_dump($dbh);

    //准备sql语句
    // $sql = "select * from user";
    $id = $_GET['id'];
    echo "未处理了的参数：".$_GET['id'];echo '<br>';
    // $sql = "select * from users where id=1";

    //pdo预处理
    $stmt = $dbh->prepare("select * from users where id= ?");
    //绑定参数
    $stmt->bindParam(1,$id);
    //执行sql语句
    $stmt->execute();

    //遍历结果
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo '<pre>';print_r($row);echo '</pre>';
        echo '<hr>';
    }