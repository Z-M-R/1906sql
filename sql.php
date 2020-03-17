<?php
   ## 使用mysqli 连接MySQL数据库
    $mysqli = new mysqli("192.168.93.1", "root", "root", "shop");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    echo "连接成功"; echo '<br>';

    //准备sql语句
    $sql = "select * from users";

    //执行sql查询
    $res = $mysqli->query($sql);

    echo '<hr>';
    //遍历数据
    while($row = $res->fetch_assoc())
    {
        echo "<pre>";print_r($row);echo "</pre>";
    }
