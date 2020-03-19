<?php

$response = [
    'error' => 0,
    'msg'   => 'ok',
    'data'  => [
        'user_name' => "zhangsan",
        'age'       => 111
    ]
];

echo json_encode($response);