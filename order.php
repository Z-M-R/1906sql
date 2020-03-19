<?php

$data = [
    'errno' => 0,
    'msg'   => 'ok',
    'data'  => [
        'status'    => 1            // 0 未支付  1已支付
    ]
];

//return $data;
echo json_encode($data);