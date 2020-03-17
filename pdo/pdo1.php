<?php

    $user = 'root';
    $pass = 'root';
    $dbh = new PDO('mysql:host=192.168.93.1;dbname=shop',$user,$pass);
    // var_dump($dbh);

    //准备sql语句
    // $sql = "select * from user";
    $id = $_GET['id'];
    echo "未处理的参数:".$id;echo '<br>';

    $id = intval($_GET['id']);
    echo "处理过的参数:".$id;echo '<br>';
    $sql = "select * from users where id=1";

    //发送数据
    $res = $dbh->query($sql);
    // var_dump($res);

    while($row = $res->fetch(PDO::FETCH_ASSOC))
    {
        echo '<pre>';print_r($row);echo '</pre>';
        echo '<hr>';
    }