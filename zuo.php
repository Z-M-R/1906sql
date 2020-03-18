<?php


$redis = new Redis();
$redis->connect('192.168.93.1');
$redis->auth('root');

$key = 'ss:seats';
////初始化座位数据
//for($i=1;$i<=100;$i++)
//{
//    $redis->zAdd($key,0,$i);
//}
//die;

$id = intval($_GET['id']);

$redis->zAdd($key,time(),$id);      // 选中座位

$response = [
    'errno' => 0,
    'msg'   => 'ok'
];

echo json_encode($response);