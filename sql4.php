<?php
   ## 使用mysqli 连接MySQL数据库
    $mysqli = new mysqli("192.168.93.1", "root", "root", "shop");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    echo "连接成功"; echo '<br>';

    // $name = "zhang";
    $name1 = $_GET['name'];
    echo "未处理的参数：".$name;echo '<br>';
    // $name2 = addslashes($name1);
    $name2 = htmlentities($name1);
    echo "处理过后的参数：".$name2;echo '<br>';
    //select * from users where name=""
    // $sql = 'select * from users where name="'.$name.'"';
    // $sql = "select * from users where name='{$name1}'";
    $sql = "select * from users where name='{$name2}'";

    echo 'sql：'.$sql;echo '<br>';

    $res = $mysqli->query($sql);

    // echo __LINE__;echo '<br>';

    while($row = $res->fetch_assoc())
    {
        var_dump($row);
        echo '<pre>';print_r($row);echo '</pre>';
    }

    
    